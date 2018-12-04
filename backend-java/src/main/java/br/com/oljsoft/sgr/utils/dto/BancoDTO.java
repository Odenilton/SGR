package br.com.oljsoft.sgr.utils.dto;

public class BancoDTO {

	private String codigo;
	private String descricao;
	private String status;
	private String value;

	public BancoDTO() {
	}

	public BancoDTO(String status, String codigo, String descricao, String value) {
		this.codigo = codigo;
		this.status = status;
		this.descricao = descricao;
		this.value = value;
	}

	public String getCodigo() {
		return codigo;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public String getValue() {
		return value;
	}

	public void setValue(String value) {
		this.value = value;
	}

}
