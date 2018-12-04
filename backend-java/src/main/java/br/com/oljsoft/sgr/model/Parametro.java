package br.com.oljsoft.sgr.model;

import java.io.Serializable;
import java.math.BigDecimal;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import com.fasterxml.jackson.annotation.JsonBackReference;

@Entity
@Table(name = "tab_parametro")
public class Parametro implements Serializable {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	@Column(name = "param_descricao")
	private String descricao;

	@Column(name = "param_mes")
	private String mes;

	@Column(name = "param_ano")
	private String ano;
	
	@Column(name = "param_imposto_ISS")
	private Number impostoISS;

	@Column(name = "param_inss_faixa1")
	private BigDecimal inssFaixa1;

	@Column(name = "param_inss_faixa2")
	private BigDecimal inssFaixa2;

	@Column(name = "param_inss_faixa3")
	private BigDecimal inssFaixa3;

	@Column(name = "param_inss_faixa4")
	private BigDecimal inssFaixa4;

	@Column(name = "param_inss_indice1")
	private Number inssIndice1;

	@Column(name = "param_inss_indice2")
	private Number inssIndice2;

	@Column(name = "param_inss_indice3")
	private Number inssIndice3;

	@Column(name = "param_inss_indice4")
	private Number inssIndice4;

	@Column(name = "param_ir_deducao")
	private BigDecimal irDeducao;

	@Column(name = "param_ir_deducao65")
	private BigDecimal irDeducao65;

	@Column(name = "param_ir_deducao_prev_prop")
	private BigDecimal irDeducaoPrevPro;

	@Column(name = "param_ir_base1")
	private Number irBase1;

	@Column(name = "param_ir_base2")
	private Number irBase2;

	@Column(name = "param_ir_base3")
	private Number irBase3;

	@Column(name = "param_ir_base4")
	private Number irBase4;

	@Column(name = "param_ir_percentual1")
	private Number irPercentual1;

	@Column(name = "param_ir_percentual2")
	private Number irPercentual2;

	@Column(name = "param_ir_percentual3")
	private Number irPercentual3;

	@Column(name = "param_ir_percentual4")
	private Number irPercentual4;

	@Column(name = "param_ir_parcela1")
	private Number irParcela1;

	@Column(name = "param_ir_parcela2")
	private Number irParcela2;

	@Column(name = "param_ir_parcela3")
	private Number irParcela3;

	@Column(name = "param_ir_parcela4")
	private Number irParcela4;
	
	@ManyToOne
	@JoinColumn(name = "param_id_orgao")
	@JsonBackReference(value = "parametros")
	private Orgao orgao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Number getImpostoISS() {
		return impostoISS;
	}

	public void setImpostoISS(Number impostoISS) {
		this.impostoISS = impostoISS;
	}

	public String getDescricao() {
		return descricao;
	}

	public Orgao getOrgao() {
		return orgao;
	}

	public void setOrgao(Orgao orgao) {
		this.orgao = orgao;
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

	public BigDecimal getInssFaixa1() {
		return inssFaixa1;
	}

	public void setInssFaixa1(BigDecimal inssFaixa1) {
		this.inssFaixa1 = inssFaixa1;
	}

	public BigDecimal getInssFaixa2() {
		return inssFaixa2;
	}

	public void setInssFaixa2(BigDecimal inssFaixa2) {
		this.inssFaixa2 = inssFaixa2;
	}

	public BigDecimal getInssFaixa3() {
		return inssFaixa3;
	}

	public void setInssFaixa3(BigDecimal inssFaixa3) {
		this.inssFaixa3 = inssFaixa3;
	}

	public BigDecimal getInssFaixa4() {
		return inssFaixa4;
	}

	public void setInssFaixa4(BigDecimal inssFaixa4) {
		this.inssFaixa4 = inssFaixa4;
	}

	public Number getInssIndice1() {
		return inssIndice1;
	}

	public void setInssIndice1(Number inssIndice1) {
		this.inssIndice1 = inssIndice1;
	}

	public Number getInssIndice2() {
		return inssIndice2;
	}

	public void setInssIndice2(Number inssIndice2) {
		this.inssIndice2 = inssIndice2;
	}

	public Number getInssIndice3() {
		return inssIndice3;
	}

	public void setInssIndice3(Number inssIndice3) {
		this.inssIndice3 = inssIndice3;
	}

	public Number getInssIndice4() {
		return inssIndice4;
	}

	public void setInssIndice4(Number inssIndice4) {
		this.inssIndice4 = inssIndice4;
	}

	public BigDecimal getIrDeducao() {
		return irDeducao;
	}

	public void setIrDeducao(BigDecimal irDeducao) {
		this.irDeducao = irDeducao;
	}

	public BigDecimal getIrDeducao65() {
		return irDeducao65;
	}

	public void setIrDeducao65(BigDecimal irDeducao65) {
		this.irDeducao65 = irDeducao65;
	}

	public BigDecimal getIrDeducaoPrevPro() {
		return irDeducaoPrevPro;
	}

	public void setIrDeducaoPrevPro(BigDecimal irDeducaoPrevPro) {
		this.irDeducaoPrevPro = irDeducaoPrevPro;
	}

	public Number getIrBase1() {
		return irBase1;
	}

	public void setIrBase1(Number irBase1) {
		this.irBase1 = irBase1;
	}

	public Number getIrBase2() {
		return irBase2;
	}

	public void setIrBase2(Number irBase2) {
		this.irBase2 = irBase2;
	}

	public Number getIrBase3() {
		return irBase3;
	}

	public void setIrBase3(Number irBase3) {
		this.irBase3 = irBase3;
	}

	public Number getIrBase4() {
		return irBase4;
	}

	public void setIrBase4(Number irBase4) {
		this.irBase4 = irBase4;
	}

	public Number getIrPercentual1() {
		return irPercentual1;
	}

	public void setIrPercentual1(Number irPercentual1) {
		this.irPercentual1 = irPercentual1;
	}

	public Number getIrPercentual2() {
		return irPercentual2;
	}

	public void setIrPercentual2(Number irPercentual2) {
		this.irPercentual2 = irPercentual2;
	}

	public Number getIrPercentual3() {
		return irPercentual3;
	}

	public void setIrPercentual3(Number irPercentual3) {
		this.irPercentual3 = irPercentual3;
	}

	public Number getIrPercentual4() {
		return irPercentual4;
	}

	public void setIrPercentual4(Number irPercentual4) {
		this.irPercentual4 = irPercentual4;
	}

	public Number getIrParcela1() {
		return irParcela1;
	}

	public void setIrParcela1(Number irParcela1) {
		this.irParcela1 = irParcela1;
	}

	public Number getIrParcela2() {
		return irParcela2;
	}

	public void setIrParcela2(Number irParcela2) {
		this.irParcela2 = irParcela2;
	}

	public Number getIrParcela3() {
		return irParcela3;
	}

	public void setIrParcela3(Number irParcela3) {
		this.irParcela3 = irParcela3;
	}

	public Number getIrParcela4() {
		return irParcela4;
	}

	public void setIrParcela4(Number irParcela4) {
		this.irParcela4 = irParcela4;
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
		Parametro other = (Parametro) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}
