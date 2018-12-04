package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Perfil;
import br.com.oljsoft.sgr.model.Usuario;
import br.com.oljsoft.sgr.repository.PerfilRepository;
import br.com.oljsoft.sgr.repository.UsuarioRepository;

@Service
public class UsuarioService {

	@Autowired
	private UsuarioRepository repository;
	
	@Autowired
	private PerfilRepository repositoryPerfil;
	
	public Optional<List<Usuario>> listar(){
		return Optional.ofNullable(this.repository.findAll());
	}
	
	public Optional<Usuario> salvar(Usuario usuario){
		return Optional.ofNullable(this.repository.save(usuario));
	}
	
	public Optional<Usuario> buscarPorEmail(String email){
		return Optional.ofNullable(this.repository.findByEmail(email));
	}
	
	public Optional<List<Perfil>> listarPerfis(){
		return Optional.ofNullable(this.repositoryPerfil.findAll());
	}
}
