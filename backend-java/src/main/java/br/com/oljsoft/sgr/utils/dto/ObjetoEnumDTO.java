package br.com.oljsoft.sgr.utils.dto;

public class ObjetoEnumDTO {

	private String status;
	private String descricao;

	public ObjetoEnumDTO() {
	}

	public ObjetoEnumDTO(String status, String descricao) {
		this.status = status;
		this.descricao = descricao;
	}

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

}
