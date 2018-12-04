package br.com.oljsoft.sgr.utils.enuns;

public enum EnumAnos implements IEnum {

	DOISMILEDEZOITO("01", "2018");

	private final String descricao;
	private final String status;

	EnumAnos(String status, String descricao) {
		this.descricao = descricao;
		this.status = status;
	}

	public String getDescricao() {
		return descricao;
	}

	public String getStatus() {
		return status;
	}

}
