package br.com.oljsoft.sgr.resources;

import java.net.URI;
import java.util.List;

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

import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.service.OrgaoService;
import br.com.oljsoft.sgr.utils.Response;

@RestController
// @PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA', 'SECRETARIA')")
@RequestMapping(value = "/orgao")
@CrossOrigin(origins = "*")
public class OrgaoResources {

	@Autowired
	private OrgaoService service;

	@GetMapping
	public ResponseEntity<Response<List<Orgao>>> listar() {
		Response<List<Orgao>> response = new Response<List<Orgao>>();
		response.setData(this.service.listar().get());
		return ResponseEntity.ok(response);
	}

	@PostMapping(value = "/pesquisar")
	public ResponseEntity<Response<List<Orgao>>> pesquisar(@RequestBody Orgao orgao) throws Exception {
		Response<List<Orgao>> response = new Response<List<Orgao>>();
		response.setData(service.pesquisar(orgao).get());
		return ResponseEntity.ok(response);
	}

	@PostMapping
	public ResponseEntity<Response<Orgao>> salvar(@RequestBody Orgao orgao) {
		orgao = service.salvar(orgao).get();

		Response<Orgao> response = new Response<Orgao>();
		response.setData(orgao);

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(orgao.getId()).toUri();

		return ResponseEntity.created(uri).body(response);
	}

	@DeleteMapping(value = "/{id}")
	public ResponseEntity<?> remover(@PathVariable Long id) {
		service.remover(id);
		return ResponseEntity.noContent().build();
	}

}
