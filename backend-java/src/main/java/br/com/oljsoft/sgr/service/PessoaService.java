package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Pessoa;
import br.com.oljsoft.sgr.repository.PessoaRepository;
import br.com.oljsoft.sgr.repository.PesquisaRepository;

@Service
public class PessoaService {

	@Autowired
	private PessoaRepository repository;

	@Autowired
	private PesquisaRepository repositoryPesquisa;

	public Optional<List<Pessoa>> listar() {
		return Optional.ofNullable(this.repository.findAll());
	}

	public Optional<Pessoa> salvar(Pessoa aluno) {
		return Optional.ofNullable(this.repository.save(aluno));
	}

	public void remover(Long id) {
		this.repository.delete(id);
	}

	public Optional<Pessoa> obterPorId(Long id) throws Exception {
		return Optional.ofNullable(this.repository.findOne(id));
	}

	public Optional<List<Pessoa>> pesquisar(Pessoa aluno) throws Exception {
		return Optional.ofNullable(this.repositoryPesquisa.pesquisarPessoas(aluno));
	}

}
