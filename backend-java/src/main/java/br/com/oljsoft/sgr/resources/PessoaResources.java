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

import br.com.oljsoft.sgr.model.Pessoa;
import br.com.oljsoft.sgr.service.PessoaService;
import br.com.oljsoft.sgr.utils.Response;

@RestController
// @PreAuthorize("hasAnyRole('ADMINISTRACAO', 'DIRETORIA', 'SECRETARIA')")
@RequestMapping(value = "/pessoa")
@CrossOrigin(origins = "*")
public class PessoaResources {

	@Autowired
	private PessoaService service;

	@GetMapping
	public ResponseEntity<Response<List<Pessoa>>> listar() {
		Response<List<Pessoa>> response = new Response<List<Pessoa>>();
		response.setData(this.service.listar().get());
		return ResponseEntity.ok(response);
	}

	@PostMapping(value = "/pesquisar")
	public ResponseEntity<Response<List<Pessoa>>> pesquisar(@RequestBody Pessoa aluno) throws Exception {
		Response<List<Pessoa>> response = new Response<List<Pessoa>>();
		response.setData(service.pesquisar(aluno).get());
		return ResponseEntity.ok(response);
	}

	@PostMapping
	public ResponseEntity<Response<Pessoa>> salvar(@RequestBody Pessoa aluno) {
		aluno = service.salvar(aluno).get();

		Response<Pessoa> response = new Response<Pessoa>();
		response.setData(aluno);

		URI uri = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(aluno.getId()).toUri();

		return ResponseEntity.created(uri).body(response);
	}

	@DeleteMapping(value = "/{id}")
	public ResponseEntity<?> remover(@PathVariable Long id) {
		service.remover(id);
		return ResponseEntity.noContent().build();
	}

}
