package br.com.oljsoft.sgr.utils.enuns;

public enum EnumZonaEndereco implements IEnum {

	ZONAURBANA("1", "Zona Urbana"), 
	ZONARURAL("2", "Zona Rural");

	private final String descricao;
	private final String status;

	EnumZonaEndereco(String status, String descricao) {
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
