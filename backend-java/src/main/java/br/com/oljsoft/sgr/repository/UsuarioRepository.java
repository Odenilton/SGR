package br.com.oljsoft.sgr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.oljsoft.sgr.model.Usuario;

public interface UsuarioRepository extends JpaRepository<Usuario, Long> {

	public Usuario findByEmail(String email);

}
