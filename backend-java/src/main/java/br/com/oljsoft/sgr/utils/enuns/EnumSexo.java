package br.com.oljsoft.sgr.utils.enuns;

public enum EnumSexo implements IEnum {

	MASCULINO("1", "Masculino"), FEMININO("2", "Feminino");

	private final String status;
	private final String descricao;

	EnumSexo(String status, String descricao) {
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
