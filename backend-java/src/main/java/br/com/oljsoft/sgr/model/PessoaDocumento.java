package br.com.oljsoft.sgr.model;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonFormat;

import br.com.oljsoft.sgr.utils.enuns.EnumTipoDocumento;
import br.com.oljsoft.sgr.utils.enuns.EnumUf;

@Entity
@Table(name = "tab_pessoa_documento")
public class PessoaDocumento implements Serializable {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	@Column(name = "doc_id")
	private Long id;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "doc_tipodocumento")
	private EnumTipoDocumento tipoDocumento;

	@Column(name = "doc_rgregistrogeral")
	private String rgRegistroGeral;

	@Column(name = "doc_rgorgaoexpediro")
	private String rgOrgaoExpeditor;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "doc_rguforgaoexpeditor")
	private EnumUf rgUfOrgaoExpeditor;

	@Column(name = "docu_cpf")
	private String cpf;

	@Temporal(TemporalType.DATE)
	@Column(name = "docu_rgdataexpedicao")
	@JsonFormat(shape = JsonFormat.Shape.STRING, pattern = "dd/MM/yyyy", locale = "pt-BR", timezone = "Brazil/East")
	private Date rgDataExpedicao;

	@Column(name = "docu_livrocertidaonascimento")
	private String livroCertidaoNascimento;

	@Column(name = "docu_folhacertidaonascimento")
	private String folhaCertidaoNascimento;

	@Column(name = "docu_termocertidaonascimento")
	private String termoCertidaoNascimento;

	@Column(name = "docu_matriculacertidaonascimento")
	private String matriculaCertidaoNascimento;

	@OneToOne
	@JoinColumn(name = "doc_pessoa_id")
	@JsonBackReference
	private Pessoa pessoa;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public EnumTipoDocumento getTipoDocumento() {
		return tipoDocumento;
	}

	public void setTipoDocumento(EnumTipoDocumento tipoDocumento) {
		this.tipoDocumento = tipoDocumento;
	}

	public String getRgRegistroGeral() {
		return rgRegistroGeral;
	}

	public void setRgRegistroGeral(String rgRegistroGeral) {
		this.rgRegistroGeral = rgRegistroGeral;
	}

	public String getRgOrgaoExpeditor() {
		return rgOrgaoExpeditor;
	}

	public void setRgOrgaoExpeditor(String rgOrgaoExpeditor) {
		this.rgOrgaoExpeditor = rgOrgaoExpeditor;
	}

	public EnumUf getRgUfOrgaoExpeditor() {
		return rgUfOrgaoExpeditor;
	}

	public void setRgUfOrgaoExpeditor(EnumUf rgUfOrgaoExpeditor) {
		this.rgUfOrgaoExpeditor = rgUfOrgaoExpeditor;
	}

	public String getCpf() {
		return cpf;
	}

	public void setCpf(String cpf) {
		this.cpf = cpf;
	}

	public Date getRgDataExpedicao() {
		return rgDataExpedicao;
	}

	public void setRgDataExpedicao(Date rgDataExpedicao) {
		this.rgDataExpedicao = rgDataExpedicao;
	}

	public String getLivroCertidaoNascimento() {
		return livroCertidaoNascimento;
	}

	public void setLivroCertidaoNascimento(String livroCertidaoNascimento) {
		this.livroCertidaoNascimento = livroCertidaoNascimento;
	}

	public String getFolhaCertidaoNascimento() {
		return folhaCertidaoNascimento;
	}

	public void setFolhaCertidaoNascimento(String folhaCertidaoNascimento) {
		this.folhaCertidaoNascimento = folhaCertidaoNascimento;
	}

	public String getTermoCertidaoNascimento() {
		return termoCertidaoNascimento;
	}

	public void setTermoCertidaoNascimento(String termoCertidaoNascimento) {
		this.termoCertidaoNascimento = termoCertidaoNascimento;
	}

	public String getMatriculaCertidaoNascimento() {
		return matriculaCertidaoNascimento;
	}

	public void setMatriculaCertidaoNascimento(String matriculaCertidaoNascimento) {
		this.matriculaCertidaoNascimento = matriculaCertidaoNascimento;
	}

	public Pessoa getPessoa() {
		return pessoa;
	}

	public void setPessoa(Pessoa pessoa) {
		this.pessoa = pessoa;
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
		PessoaDocumento other = (PessoaDocumento) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}