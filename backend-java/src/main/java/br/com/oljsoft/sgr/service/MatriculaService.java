package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.repository.UtilitariosRepository;
import br.com.oljsoft.sgr.utils.dto.EstadoDTO;

@Service
public class MatriculaService {

	@Autowired
	private UtilitariosRepository repository;

	public Optional<List<EstadoDTO>> obterEstados() {
		return Optional.ofNullable(this.repository.obterEstados());
	}
}
