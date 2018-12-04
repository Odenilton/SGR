package br.com.oljsoft.sgr.utils.enuns;

public enum EnumAlergia implements IEnum {

	ALIMENTOS("1", "Alimentos"),
	TECIDOS("2", "Tecidos"),
	MEDICAMENTOS("3", "Medicamentos"), 
	OUTROS("4",	"Outros"), 
	NAOPOSSUIALERGIA("5", "Não Poussi Alergia");

	private final String descricao;
	private final String status;

	EnumAlergia(String status, String descricao) {
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
