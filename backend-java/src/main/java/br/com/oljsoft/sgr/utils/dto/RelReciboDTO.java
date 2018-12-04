package br.com.oljsoft.sgr.utils.dto;

public class RelReciboDTO {

	private String nomePessoa;
	private String cpfPessoa;
	private String rendimentoTributavel;
	private String previdenciaOficial;
	private String impostoISS;
	private String impostoIRRF;
	private String valorLiquido;

	private String orgao;
	private String ligacaoOrgao;
	private String valorExtenso;
	private String descricaoServico;
	private String data;

	private String dadosPagamento;

	public String getNomePessoa() {
		return nomePessoa;
	}

	public void setNomePessoa(String nomePessoa) {
		this.nomePessoa = nomePessoa;
	}

	public String getLigacaoOrgao() {
		return ligacaoOrgao;
	}

	public void setLigacaoOrgao(String ligacaoOrgao) {
		this.ligacaoOrgao = ligacaoOrgao;
	}

	public String getDadosPagamento() {
		return dadosPagamento;
	}

	public void setDadosPagamento(String dadosPagamento) {
		this.dadosPagamento = dadosPagamento;
	}

	public String getValorExtenso() {
		return valorExtenso;
	}

	public void setValorExtenso(String valorExtenso) {
		this.valorExtenso = valorExtenso;
	}

	public String getDescricaoServico() {
		return descricaoServico;
	}

	public void setDescricaoServico(String descricaoServico) {
		this.descricaoServico = descricaoServico;
	}

	public String getData() {
		return data;
	}

	public void setData(String data) {
		this.data = data;
	}

	public String getCpfPessoa() {
		return cpfPessoa;
	}

	public String getOrgao() {
		return orgao;
	}

	public void setOrgao(String orgao) {
		this.orgao = orgao;
	}

	public void setCpfPessoa(String cpfPessoa) {
		this.cpfPessoa = cpfPessoa;
	}

	public String getRendimentoTributavel() {
		return rendimentoTributavel;
	}

	public void setRendimentoTributavel(String rendimentoTributavel) {
		this.rendimentoTributavel = rendimentoTributavel;
	}

	public String getPrevidenciaOficial() {
		return previdenciaOficial;
	}

	public void setPrevidenciaOficial(String previdenciaOficial) {
		this.previdenciaOficial = previdenciaOficial;
	}

	public String getImpostoISS() {
		return impostoISS;
	}

	public void setImpostoISS(String impostoISS) {
		this.impostoISS = impostoISS;
	}

	public String getImpostoIRRF() {
		return impostoIRRF;
	}

	public void setImpostoIRRF(String impostoIRRF) {
		this.impostoIRRF = impostoIRRF;
	}

	public String getValorLiquido() {
		return valorLiquido;
	}

	public void setValorLiquido(String valorLiquido) {
		this.valorLiquido = valorLiquido;
	}

}
