package br.com.oljsoft.sgr.utils.enuns;

public enum EnumBancos implements IEnum {

	BANCO_DO_BRASIL("1", "001", "Banco do Brasil"),
	BRADESCO("2", "237", "Bradesco"),
	CAIXA("3", "104", "Caixa") ,
	HSBC("4", "399", "HSBC"),
	ITAU("5", "341", "Itaú"),
	SANTANDER("6", "033", "Santander");

	private final String codigo;
	private final String descricao;
	private final String status;

	EnumBancos(String status, String codigo, String descricao) {
		this.codigo = codigo;
		this.descricao = descricao;
		this.status = status;
	}

	public String getDescricao() {
		return descricao;
	}

	public String getStatus() {
		return status;
	}
	
	public String getCodigo() {
		return codigo;
	}

}
