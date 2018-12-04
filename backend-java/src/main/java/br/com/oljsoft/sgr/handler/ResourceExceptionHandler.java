package br.com.oljsoft.sgr.handler;

import javax.servlet.http.HttpServletRequest;

import org.hibernate.exception.ConstraintViolationException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.BadCredentialsException;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;

import br.com.oljsoft.sgr.model.DetalhesErro;

@ControllerAdvice
public class ResourceExceptionHandler {

	@ExceptionHandler(BadCredentialsException.class)
	public ResponseEntity<DetalhesErro> handleLivroNaoEncontradoException(BadCredentialsException e,
			HttpServletRequest request) {

		DetalhesErro erro = new DetalhesErro();
		erro.setStatus(401l);
		erro.setMessage("Usuário ou senha inválidos");
		erro.setMensagemDesenvolvedor("http://erros.socialbooks.com/401");
		erro.setTimestamp(System.currentTimeMillis());

		return ResponseEntity.status(HttpStatus.UNAUTHORIZED).body(erro);

	}
	
	@ExceptionHandler(ConstraintViolationException.class)
	public ResponseEntity<DetalhesErro> handleRegistroEmUsoException(ConstraintViolationException e,
			HttpServletRequest request) {

		DetalhesErro erro = new DetalhesErro();
		erro.setStatus(500l);
		erro.setMessage("Esse registro está sendo usado em outras partes do sistema");
		erro.setMensagemDesenvolvedor("http://erros.socialbooks.com/500");
		erro.setTimestamp(System.currentTimeMillis());

		return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR).body(erro);

	}

}
