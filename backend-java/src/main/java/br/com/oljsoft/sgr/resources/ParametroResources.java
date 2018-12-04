package br.com.oljsoft.sgr.resources;

import java.net.URI;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
//import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import br.com.oljsoft.sgr.model.Parametro;
import br.com.oljsoft.sgr.service.ParametroService;
import br.com.oljsoft.sgr.utils.Response;

@RestController
//@PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA', 'SECRETARIA')")
@RequestMapping(value = "/parametro")
@CrossOrigin(origins = "*")
public class ParametroResources {

	@Autowired
	private ParametroService service;

//	@GetMapping
//	public ResponseEntity<Response<List<Parametro>>> listar() {
//		Response<List<Parametro>> response = new Response<List<Parametro>>();
//		response.setData(this.service.listar().get());
//		return ResponseEntity.ok(response);
//	}

	@PostMapping
	public ResponseEntity<Response<Parametro>> salvar(@RequestBody Parametro turma) {
		turma = service.salvar(turma).get();

		Response<Parametro> response = new Response<Parametro>();
		response.setData(turma);

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(turma.getId()).toUri();

		return ResponseEntity.created(uri).body(response);
	}
	
	@PostMapping(value = "/pesquisar")
	public ResponseEntity<Response<List<Parametro>>> pesquisar(@RequestBody Parametro turma) throws Exception {
		Response<List<Parametro>> response = new Response<List<Parametro>>();
		response.setData(service.pesquisar(turma).get());
		return ResponseEntity.ok(response);
	}

}
