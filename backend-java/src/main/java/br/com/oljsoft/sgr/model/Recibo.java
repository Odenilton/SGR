package br.com.oljsoft.sgr.model;

import java.io.Serializable;
import java.math.BigDecimal;
import java.text.ParseException;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonFormat;

import br.com.oljsoft.sgr.utils.DateUtils;

@Entity
@Table(name = "tab_recibo")
public class Recibo implements Serializable {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	@Column(name = "reci_id")
	private Long id;

	@Column(name = "reci_descricao")
	private String descricao;

	@Column(name = "reci_mes")
	private String mes;

	@Column(name = "reci_ano")
	private String ano;

	@ManyToOne(fetch = FetchType.EAGER)
	@JoinColumn(name = "reci_id_pessoa")
	@JsonBackReference(value = "pessoas")
	private Pessoa pessoa;

	@ManyToOne
	@JoinColumn(name = "reci_id_orgao")
	@JsonBackReference(value = "recibos")
	private Orgao orgao;

	@Column(name = "reci_rendimento_tributavel")
	private BigDecimal rendimentoTributavel;

	@Column(name = "reci_previdencia_oficial")
	private BigDecimal previdenciaOficial;

	@Column(name = "reci_pensao_alimenticia")
	private BigDecimal pensaoAlimenticia;

	@Column(name = "reci_qtd_dependentes")
	private Integer qtdDependentes;

	@Column(name = "reci_valor_total_dependentes")
	private BigDecimal valorTotalDependentes;

	@Column(name = "reci_outras_deducoes")
	private BigDecimal outrasDeducoes;

	@Column(name = "reci_valor_total_deducoes")
	private BigDecimal valorTotalDeducoes;

	@Column(name = "reci_base_calculo")
	private BigDecimal baseDeCalculo;

	@Column(name = "reci_imposto_IRRF")
	private BigDecimal impostoIRRF;

	@Column(name = "reci_imposto_ISS")
	private BigDecimal impostoISS;

	@Column(name = "reci_valor_liquido")
	private BigDecimal valorLiquido;

	@Column(name = "reci_ligacao_orgao")
	private String ligacaoOrgao;

	@Column(name = "reci_descricao_servico")
	private String descricaoServico;

	@Temporal(TemporalType.DATE)
	@Column(name = "reci_data")
	@JsonFormat(shape = JsonFormat.Shape.STRING, pattern = "dd/MM/yyyy", locale = "pt-BR", timezone = "Brazil/East")
	private Date data;

	public Long getId() {
		return id;
	}

	public BigDecimal getValorLiquido() {
		return valorLiquido;
	}

	public String getLigacaoOrgao() {
		return ligacaoOrgao;
	}

	public void setLigacaoOrgao(String ligacaoOrgao) {
		this.ligacaoOrgao = ligacaoOrgao;
	}

	public String getDescricaoServico() {
		return descricaoServico;
	}

	public void setDescricaoServico(String descricaoServico) {
		this.descricaoServico = descricaoServico;
	}

	public Date getData() {
		try {
			return DateUtils.parse(this.data.toString());
		} catch (ParseException e) {
			e.printStackTrace();
			return null;
		}
	}

	public void setData(Date data) {
		if (this.id == null) {
			this.data = data;
		}else {
			try {
				this.data = DateUtils.parse(this.data.toString());
			} catch (ParseException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
	}

	public Pessoa getPessoa() {
		return pessoa;
	}

	public Pessoa getPerson() {
		return pessoa;
	}

	public BigDecimal getImpostoISS() {
		return impostoISS;
	}

	public void setImpostoISS(BigDecimal impostoISS) {
		this.impostoISS = impostoISS;
	}

	public void setValorLiquido(BigDecimal valorLiquido) {
		this.valorLiquido = valorLiquido;
	}

	public BigDecimal getValorTotalDependentes() {
		return valorTotalDependentes;
	}

	public void setValorTotalDependentes(BigDecimal valorTotalDependentes) {
		this.valorTotalDependentes = valorTotalDependentes;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public String getMes() {
		return mes;
	}

	public void setMes(String mes) {
		this.mes = mes;
	}

	public String getAno() {
		return ano;
	}

	public void setAno(String ano) {
		this.ano = ano;
	}

	public BigDecimal getValorTotalDeducoes() {
		return valorTotalDeducoes;
	}

	public void setValorTotalDeducoes(BigDecimal valorTotalDeducoes) {
		this.valorTotalDeducoes = valorTotalDeducoes;
	}

	public BigDecimal getBaseDeCalculo() {
		return baseDeCalculo;
	}

	public void setBaseDeCalculo(BigDecimal baseDeCalculo) {
		this.baseDeCalculo = baseDeCalculo;
	}

	public BigDecimal getImpostoIRRF() {
		return impostoIRRF;
	}

	public void setImpostoIRRF(BigDecimal impostoIRRF) {
		this.impostoIRRF = impostoIRRF;
	}

	public void setPessoa(Pessoa pessoa) {
		this.pessoa = pessoa;
	}

	public Orgao getOrgao() {
		return orgao;
	}

	public void setOrgao(Orgao orgao) {
		this.orgao = orgao;
	}

	public BigDecimal getRendimentoTributavel() {
		return rendimentoTributavel;
	}

	public void setRendimentoTributavel(BigDecimal rendimentoTributavel) {
		this.rendimentoTributavel = rendimentoTributavel;
	}

	public BigDecimal getPrevidenciaOficial() {
		return previdenciaOficial;
	}

	public void setPrevidenciaOficial(BigDecimal previdenciaOficial) {
		this.previdenciaOficial = previdenciaOficial;
	}

	public BigDecimal getPensaoAlimenticia() {
		return pensaoAlimenticia;
	}

	public void setPensaoAlimenticia(BigDecimal pensaoAlimenticia) {
		this.pensaoAlimenticia = pensaoAlimenticia;
	}

	public Integer getQtdDependentes() {
		return qtdDependentes;
	}

	public void setQtdDependentes(Integer qtdDependentes) {
		this.qtdDependentes = qtdDependentes;
	}

	public BigDecimal getOutrasDeducoes() {
		return outrasDeducoes;
	}

	public void setOutrasDeducoes(BigDecimal outrasDeducoes) {
		this.outrasDeducoes = outrasDeducoes;
	}

	public void setId(Long id) {
		this.id = id;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Recibo other = (Recibo) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}