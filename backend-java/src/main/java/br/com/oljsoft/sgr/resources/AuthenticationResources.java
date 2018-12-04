package br.com.oljsoft.sgr.resources;

import java.net.URI;
import java.util.Optional;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import br.com.oljsoft.sgr.model.Usuario;
import br.com.oljsoft.sgr.security.JwtTokenUtil;
import br.com.oljsoft.sgr.utils.dto.JwtAuthenticationDto;
import br.com.oljsoft.sgr.utils.dto.TokenDto;
import br.com.oljsoft.sgr.service.UsuarioService;
import br.com.oljsoft.sgr.utils.Response;

@RestController
@RequestMapping("/auth")
@CrossOrigin(origins = "*")
public class AuthenticationResources {

	private static final Logger log = LoggerFactory.getLogger(AuthenticationResources.class);
	private static final String TOKEN_HEADER = "Authorization";
	private static final String BEARER_PREFIX = "Bearer ";

	@Autowired
	private AuthenticationManager authenticationManager;

	@Autowired
	private JwtTokenUtil jwtToken;

	@Autowired
	private UserDetailsService userDetailsService;
	
	@Autowired
	private UsuarioService service;

	@PostMapping(value = "/usuario")
	public ResponseEntity<Response<Usuario>> salvar(@RequestBody Usuario usuario) {
		usuario = service.salvar(usuario).get();

		Response<Usuario> response = new Response<Usuario>();
		response.setData(service.salvar(usuario).get());

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(usuario.getId())
				.toUri();

		return ResponseEntity.created(uri).body(response);
	}
	
	/**
	 * Gera e retorna um novo token JWT.
	 *
	 * @param authenticationDto
	 * @param result
	 * @return ResponseEntity<Response<TokenDto>>
	 * @throws AuthenticationException
	 */
	@PostMapping(value = "/login")
	public ResponseEntity<Response<TokenDto>> gerarTokenJwt(@Valid @RequestBody JwtAuthenticationDto authenticationDto,
			BindingResult result) throws AuthenticationException {

		Response<TokenDto> response = new Response<TokenDto>();

		if (result.hasErrors()) {
			log.error("Erro validando lançamento: {}", result.getAllErrors());
			result.getAllErrors().forEach(error -> response.getErrors().add(error.getDefaultMessage()));
			return ResponseEntity.badRequest().body(response);
		}

		log.info("Gerando token para o email {}", authenticationDto.getEmail());
		Authentication authentication = authenticationManager.authenticate(
				new UsernamePasswordAuthenticationToken(authenticationDto.getEmail(), authenticationDto.getSenha()));

		SecurityContextHolder.getContext().setAuthentication(authentication);

		UserDetails userDetails = userDetailsService.loadUserByUsername(authenticationDto.getEmail());

		String token = jwtToken.obterToken(userDetails);

		response.setData(new TokenDto(token));

		return ResponseEntity.ok(response);

	}

	/**
	 * Gera um novo token com uma nova data de expiração.
	 *
	 * @param request
	 * @return ResponseEntity<Response<TokenDto>>
	 */
	@PostMapping(value = "/token-refresh")
	public ResponseEntity<Response<TokenDto>> gerarRefreshTokenJwt(HttpServletRequest request) {
		log.info("Gerando refresh token JWT.");

		Response<TokenDto> response = new Response<TokenDto>();

		Optional<String> token = Optional.ofNullable(request.getHeader(TOKEN_HEADER));

		if (token.isPresent() && token.get().startsWith(BEARER_PREFIX)) {
			token = Optional.of(token.get().substring(7));
		}

		if (!token.isPresent()) {
			response.getErrors().add("Token não informado");
		} else if (!jwtToken.tokenValido(token.get())) {
			response.getErrors().add("Token inválido ou expirado");
		}

		if (!response.getErrors().isEmpty()) {
			return ResponseEntity.badRequest().body(response);
		}

		String refreshdToken = jwtToken.refreshToken(token.get());
		response.setData(new TokenDto(refreshdToken));

		return ResponseEntity.ok(response);

	}

}
