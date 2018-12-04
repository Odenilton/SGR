package br.com.oljsoft.sgr.resources;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
//import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.service.UtilitariosService;
import br.com.oljsoft.sgr.utils.Response;
import br.com.oljsoft.sgr.utils.dto.BancoDTO;
import br.com.oljsoft.sgr.utils.dto.EstadoDTO;
import br.com.oljsoft.sgr.utils.dto.ObjetoEnumDTO;

@RestController
//@PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA', 'SECRETARIA')")
@RequestMapping(value = "/utilitarios")
@CrossOrigin(origins = "*")
public class UtilitáriosResources {

	@Autowired
	private UtilitariosService service;

	@GetMapping(value = "/estados")
	public ResponseEntity<Response<List<EstadoDTO>>> listarEstados() {
		Response<List<EstadoDTO>> response = new Response<List<EstadoDTO>>();
		response.setData(this.service.obterEstados().get());
		return ResponseEntity.ok(response);
	}
	
	@GetMapping(value = "/meses")
	public ResponseEntity<Response<List<ObjetoEnumDTO>>> listarMeses() {
		Response<List<ObjetoEnumDTO>> response = new Response<List<ObjetoEnumDTO>>();
		response.setData(this.service.obterMeses().get());
		return ResponseEntity.ok(response);
	}
	
	@GetMapping(value = "/anos")
	public ResponseEntity<Response<List<ObjetoEnumDTO>>> listarAnos() {
		Response<List<ObjetoEnumDTO>> response = new Response<List<ObjetoEnumDTO>>();
		response.setData(this.service.obterAnos().get());
		return ResponseEntity.ok(response);
	}
	
	@GetMapping(value = "/orgaos")
	public ResponseEntity<Response<List<Orgao>>> listarOrgaos() {
		Response<List<Orgao>> response = new Response<List<Orgao>>();
		response.setData(this.service.obterOrgaos().get());
		return ResponseEntity.ok(response);
	}
	
	@GetMapping(value = "/bancos")
	public ResponseEntity<Response<List<BancoDTO>>> listarBancos() {
		Response<List<BancoDTO>> response = new Response<List<BancoDTO>>();
		response.setData(this.service.obterBancos().get());
		return ResponseEntity.ok(response);
	}

}
