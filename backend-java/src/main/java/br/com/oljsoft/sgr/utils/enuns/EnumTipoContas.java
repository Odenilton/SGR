package br.com.oljsoft.sgr.utils.enuns;

public enum EnumTipoContas implements IEnum {

	CONTA_CORRENTE("1", "Conta Corrente"),
	CONTA_POUPANCA("2", "Conta Poupança"), 
	CONTA_PAGAMENTO("3", "Conta Pagamento");

	private final String status;
	private final String descricao;

	EnumTipoContas(String status, String descricao) {
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
