package br.com.oljsoft.sgr.utils.enuns;
public enum EnumEspecialidadeFuncionario implements IEnum{

	DIRETORIA("1", "Diretor (a)"), 
	COORDENACAO("2", "Coordenador (a)"),
	DOCENCIA("3", "Docente"),
	SECRETARIA("4", "Secretário (a)"),
	SEMACESSOAOSISTEMA("5", "Sem acesso ao sistema"),
	ADMINISTRACAO("6", "Administrador");
	
	private final String descricao;
	private final String status;

	EnumEspecialidadeFuncionario(String status, String descricao) {
		this.descricao  = descricao;
		this.status      = status;
	}

	public String getDescricao() {
		return descricao;
	}

	public String getStatus() {
		return status;
	}
	
}