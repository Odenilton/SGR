package br.com.oljsoft.sgr.utils.dto;

public class EstadoDTO {

	private Integer codigo;
	private String descricao;
	private String uf;
	private Integer pais;

	public EstadoDTO() {
	}

	public EstadoDTO(Integer codigo, String descricao, String uf, Integer pais) {
		this.codigo = codigo;
		this.descricao = descricao;
		this.uf = uf;
		this.pais = pais;
	}

	public Integer getCodigo() {
		return codigo;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setCodigo(Integer codigo) {
		this.codigo = codigo;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public void setUf(String uf) {
		this.uf = uf;
	}

	public void setPais(Integer pais) {
		this.pais = pais;
	}

	public String getUf() {
		return uf;
	}

	public Integer getPais() {
		return pais;
	}

}
