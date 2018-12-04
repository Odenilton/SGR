package br.com.oljsoft.sgr.resources;

import java.net.URI;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
//import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import br.com.oljsoft.sgr.model.Perfil;
import br.com.oljsoft.sgr.model.Usuario;
import br.com.oljsoft.sgr.service.UsuarioService;
import br.com.oljsoft.sgr.utils.Response;

@RestController
//@PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA')")
@RequestMapping(value = "/usuario")
@CrossOrigin(origins = "*")
public class UsuarioResources {

	@Autowired
	private UsuarioService service;
	

	@GetMapping

	public ResponseEntity<Response<List<Usuario>>> listar() {
		Response<List<Usuario>> response = new Response<List<Usuario>>();
		response.setData(this.service.listar().get());
		return ResponseEntity.ok(response);
	}

	@PostMapping
	public ResponseEntity<Response<Usuario>> salvar(@RequestBody Usuario usuario) {
		usuario = service.salvar(usuario).get();

		Response<Usuario> response = new Response<Usuario>();
		response.setData(service.salvar(usuario).get());

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(usuario.getId())
				.toUri();

		return ResponseEntity.created(uri).body(response);
	}
	
	@GetMapping(value = "perfis")
	public ResponseEntity<Response<List<Perfil>>> obterPerfis() {
		Response<List<Perfil>> response = new Response<List<Perfil>>();
		response.setData(this.service.listarPerfis().get());
		return ResponseEntity.ok(response);
	}

}
