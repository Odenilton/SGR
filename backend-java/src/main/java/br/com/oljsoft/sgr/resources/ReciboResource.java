package br.com.oljsoft.sgr.resources;

import java.io.OutputStream;
import java.net.URI;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
//import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import br.com.oljsoft.sgr.model.Recibo;
import br.com.oljsoft.sgr.service.ReciboService;
import br.com.oljsoft.sgr.utils.GeradorDeRelatorios;
import br.com.oljsoft.sgr.utils.Response;
import br.com.oljsoft.sgr.utils.dto.RelReciboDTO;

@RestController
// @PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA', 'SECRETARIA')")
@RequestMapping(value = "/recibo")
@CrossOrigin(origins = "*")
public class ReciboResource {

	@Autowired
	private ReciboService service;

	@Autowired
	private GeradorDeRelatorios geradorDeRelatorios;

	// @GetMapping
	// @JsonView(View.Summary.class)
	// public ResponseEntity<Response<List<Recibo>>> listar() {
	// Response<List<Recibo>> response = new Response<List<Recibo>>();
	// response.setData(this.service.listar().get());
	// return ResponseEntity.ok(response);
	// }

	@PostMapping(value = "/pesquisar")
	public ResponseEntity<Response<List<Recibo>>> pesquisar(@RequestBody Recibo recibo) throws Exception {
		Response<List<Recibo>> response = new Response<List<Recibo>>();
		response.setData(service.pesquisar(recibo).get());
		return ResponseEntity.ok(response);
	}

	@PostMapping
	public ResponseEntity<Response<Recibo>> salvar(@RequestBody Recibo recibo) {
		recibo = service.salvar(recibo).get();

		Response<Recibo> response = new Response<Recibo>();
		response.setData(recibo);

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(recibo.getId()).toUri();

		return ResponseEntity.created(uri).body(response);
	}

	@DeleteMapping(value = "/{id}")
	public ResponseEntity<?> remover(@PathVariable Long id) {
		service.remover(id);
		return ResponseEntity.noContent().build();
	}

	// @GetMapping(value = "/relatorios/{id}")
	// public void imprimirFichaAluno(HttpServletRequest request,
	// HttpServletResponse response, @PathVariable Long id) throws Exception {
	// OutputStream saida = response.getOutputStream();
	//
	// RelReciboDTO relReciboDto = service.obterDadosRelatorioRecibo(id);
	//
	// Map<String, Object> parametros = new HashMap<String, Object>();
	// parametros.put("DTO", relReciboDto);
	// parametros.put("ID_RECIBO", id);
	// parametros.put("LOGO", "WEB-INF/classes/relatorios/logo.png");
	//
	// List<RelReciboDTO> dataSource = new ArrayList<RelReciboDTO>();
	// dataSource.add(relReciboDto);
	//
	// geradorDeRelatorios.geraPdf("WEB-INF/classes/relatorios/recibo.jrxml",
	// parametros, saida);
	// }

	@GetMapping(value = "/relatorios/{id}")
	public void imprimirFichaAluno(HttpServletRequest request, HttpServletResponse response, @PathVariable Long id)
			throws Exception {
		OutputStream saida = response.getOutputStream();

		RelReciboDTO relReciboDto = service.obterDadosRelatorioRecibo(id);

		Map<String, Object> parametros = new HashMap<String, Object>();
		parametros.put("DTO", relReciboDto);
		parametros.put("ID_RECIBO", id);
		parametros.put("LOGO", this.getClass().getResource("/relatorios/logo.png").toString());

		List<RelReciboDTO> dataSource = new ArrayList<RelReciboDTO>();
		dataSource.add(relReciboDto);

		geradorDeRelatorios.geraCompiladoPdf(this.getClass().getResourceAsStream("/relatorios/recibo.jrxml"), parametros, saida, response);
	}

}
