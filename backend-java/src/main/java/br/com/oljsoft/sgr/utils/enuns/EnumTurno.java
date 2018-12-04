package br.com.oljsoft.sgr.utils.enuns;

public enum EnumTurno implements IEnum {

	MATUTINO("1", "Matutino"), 
	VESPERTINO("2", "Vespertino"),
	NOTURNO("3", "Noturno");

	private final String status;
	private final String descricao;

	EnumTurno(String status, String descricao) {
		this.status = status;
		this.descricao = descricao;
	}

	public String getDescricao() {
		return descricao;
	}

	public String getStatus() {
		return status;
	}
}