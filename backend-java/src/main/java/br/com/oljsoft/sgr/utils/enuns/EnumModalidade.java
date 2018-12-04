package br.com.oljsoft.sgr.utils.enuns;

public enum EnumModalidade implements IEnum {

	CRECHE("1", "Creche"),
	EDUCACAOINFANTIL("2", "Educação Infantil"), 
	ENSINOFUNDAMENTAL("3", "Ensino Fundamental"),
	ENSINOMEDIO("4", "Ensino Médio"),
	SUPERIOR("5", "Superior");

	private final String status;
	private final String descricao;

	EnumModalidade(String status, String descricao) {
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