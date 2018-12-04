package br.com.oljsoft.sgr.utils.enuns;

public enum EnumTipoDocumento implements IEnum {

	RG("RG", "Rg"),
	CERTIDAOANTIGA("CA", "Certidão Antiga"), 
	CERTIDAONOVA("CN", "Certidão Nova");

	private final String status;
	private final String descricao;

	EnumTipoDocumento(String status, String descricao) {
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
