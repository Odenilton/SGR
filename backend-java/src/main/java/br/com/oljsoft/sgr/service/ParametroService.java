package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Parametro;
import br.com.oljsoft.sgr.repository.PesquisaRepository;
import br.com.oljsoft.sgr.repository.ParametroRepository;

@Service
public class ParametroService {

	@Autowired
	private ParametroRepository repository;
	
	@Autowired
	private PesquisaRepository repositoryPesquisa;

	public Optional<List<Parametro>> listar() {
		return Optional.ofNullable(this.repository.findAll());
	}

	public Optional<Parametro> salvar(Parametro turma) {
		return Optional.ofNullable(this.repository.save(turma));
	}

	public void remover(Long id) {
		this.repository.delete(id);
	}

	public Optional<List<Parametro>> pesquisar(Parametro parametro) throws Exception {
		return Optional.ofNullable(this.repositoryPesquisa.pesquisarParametros(parametro));
	}

}
