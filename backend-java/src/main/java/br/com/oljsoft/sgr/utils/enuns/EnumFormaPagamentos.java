package br.com.oljsoft.sgr.utils.enuns;

public enum EnumFormaPagamentos implements IEnum {

	CHEQUE("1", "Cheque"),
	TRANSFERENCIA_BANCARIA("2", "Transferência Bancária");

	private final String descricao;
	private final String status;

	EnumFormaPagamentos(String status, String descricao) {
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
