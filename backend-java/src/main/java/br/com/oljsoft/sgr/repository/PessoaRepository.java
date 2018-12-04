package br.com.oljsoft.sgr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.oljsoft.sgr.model.Pessoa;

public interface PessoaRepository extends JpaRepository<Pessoa, Long> {

}
