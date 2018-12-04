package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.repository.UtilitariosRepository;
import br.com.oljsoft.sgr.utils.dto.BancoDTO;
import br.com.oljsoft.sgr.utils.dto.EstadoDTO;
import br.com.oljsoft.sgr.utils.dto.ObjetoEnumDTO;

@Service
public class UtilitariosService {

	@Autowired
	private UtilitariosRepository repository;

	public Optional<List<EstadoDTO>> obterEstados() {
		return Optional.ofNullable(this.repository.obterEstados());
	}
	
	public Optional<List<ObjetoEnumDTO>> obterMeses() {
		return Optional.ofNullable(this.repository.obterMeses());
	}

	public Optional<List<ObjetoEnumDTO>> obterAnos() {
		return Optional.ofNullable(this.repository.obterAnos());
	}
	
	public Optional<List<Orgao>> obterOrgaos() {
		return Optional.ofNullable(this.repository.obterOrgaos());
	}

	public Optional<List<BancoDTO>> obterBancos() {
		return Optional.ofNullable(this.repository.obterBancos());
	}
	
}
