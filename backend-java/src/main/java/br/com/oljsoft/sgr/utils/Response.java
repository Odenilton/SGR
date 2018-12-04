package br.com.oljsoft.sgr.utils;

import java.util.ArrayList;
import java.util.List;

public class Response<T> {

	private T data;
	private List<String> errors;

	public Response() {
	}

	public T getData() {
		return this.data;
	}

	public List<String> getErrors() {
		return errors;
	}

	public void setErrors(List<String> errors) {
		this.errors = errors;
	}

	public void setData(T data) {
		if (this.errors == null)
			this.errors = new ArrayList<String>();
		this.data = data;
	}

}
