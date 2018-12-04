package br.com.oljsoft.sgr.security;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Usuario;
import br.com.oljsoft.sgr.service.UsuarioService;

@Service
public class JwtUserDetailService implements UserDetailsService {

	@Autowired
	private UsuarioService service;

	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
		Optional<Usuario> funcionario = service.buscarPorEmail(username);

		if (funcionario.isPresent())
			return JwtUserFactory.create(funcionario.get());

		throw new UsernameNotFoundException("Email não encontrado");
	}

}
