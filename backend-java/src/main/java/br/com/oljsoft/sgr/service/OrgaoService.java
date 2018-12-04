package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.repository.OrgaoRepository;
import br.com.oljsoft.sgr.repository.PesquisaRepository;

@Service
public class OrgaoService {

	@Autowired
	private OrgaoRepository repository;

	@Autowired
	private PesquisaRepository repositoryPesquisa;

	public Optional<List<Orgao>> listar() {
		return Optional.ofNullable(this.repository.findAll());
	}

	public Optional<Orgao> salvar(Orgao orgao) {
		return Optional.ofNullable(this.repository.save(orgao));
	}

	public void remover(Long id) {
		this.repository.delete(id);
	}

	public Optional<Orgao> obterPorId(Long id) throws Exception {
		return Optional.ofNullable(this.repository.findOne(id));
	}

	public Optional<List<Orgao>> pesquisar(Orgao orgao) throws Exception {
		return Optional.ofNullable(this.repositoryPesquisa.pesquisarOrgaos(orgao));
	}

}
