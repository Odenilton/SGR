package br.com.oljsoft.sgr.model;

import java.io.Serializable;
import java.text.ParseException;
import java.util.Date;
import java.util.List;
import java.util.Set;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import com.fasterxml.jackson.annotation.JsonFormat;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonManagedReference;

import br.com.oljsoft.sgr.utils.DateUtils;
import br.com.oljsoft.sgr.utils.enuns.EnumBancos;
import br.com.oljsoft.sgr.utils.enuns.EnumFormaPagamentos;
import br.com.oljsoft.sgr.utils.enuns.EnumSexo;
import br.com.oljsoft.sgr.utils.enuns.EnumTipoContas;
import br.com.oljsoft.sgr.utils.enuns.EnumUf;

@Entity
@Table(name = "tab_pessoa")
@JsonIgnoreProperties({ "recibos", "telefones" })
public class Pessoa implements Serializable {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	@Column(name = "pess_id")
	private Long id;

	@Column(name = "pess_nome")
	private String nome;

	@Column(name = "pess_nit")
	private String nit;

	@Column(name = "pess_cpf")
	private String cpf;

	@Column(name = "pess_nomepai")
	private String nomePai;

	@Column(name = "pess_nomemae")
	private String nomeMae;

	@Temporal(TemporalType.DATE)
	@Column(name = "pess_datanascimento")
	@JsonFormat(shape = JsonFormat.Shape.STRING, pattern = "dd/MM/yyyy", locale = "pt-BR", timezone = "Brazil/East")
	private Date dataNascimento;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "pess_sexo")
	private EnumSexo sexo;

	@Column(name = "pess_naturalidade")
	private String naturalidade;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "pess_ufnaturalidade")
	private EnumUf ufNaturalidade;

	@Column(name = "pess_numerocartaosus")
	private String numeroCartaoSus;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "pess_formapagamento")
	private EnumFormaPagamentos formaPagamento;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "pess_banco")
	private EnumBancos banco;

	@Column(name = "pess_agencia")
	private String agencia;

	@Column(name = "pess_digitoagencia")
	private String digitoAgencia;

	@Column(name = "pess_conta")
	private String conta;

	@Column(name = "pess_digitoconta")
	private String digitoConta;

	@Enumerated(EnumType.ORDINAL)
	@Column(name = "pess_tipoconta")
	private EnumTipoContas tipoConta;

	@OneToOne(mappedBy = "pessoa", fetch = FetchType.EAGER, cascade = CascadeType.ALL, orphanRemoval = true)
	@JsonManagedReference
	private PessoaDocumento documento;

	@OneToMany(mappedBy = "pessoa", fetch = FetchType.EAGER, cascade = CascadeType.ALL)
	private Set<PessoaTelefone> telefones;

	@OneToOne(mappedBy = "pessoa", fetch = FetchType.EAGER, cascade = CascadeType.ALL, orphanRemoval = true)
	@JsonManagedReference
	private PessoaEndereco endereco;

	@OneToMany(mappedBy = "pessoa")
	private List<Recibo> recibos;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public List<Recibo> getRecibos() {
		return recibos;
	}

	public void setRecibos(List<Recibo> recibos) {
		this.recibos = recibos;
	}

	public EnumTipoContas getTipoConta() {
		return tipoConta;
	}

	public void setTipoConta(EnumTipoContas tipoConta) {
		this.tipoConta = tipoConta;
	}

	public EnumBancos getBanco() {
		return banco;
	}

	public void setBanco(EnumBancos banco) {
		this.banco = banco;
	}

	public String getAgencia() {
		return agencia;
	}

	public void setAgencia(String agencia) {
		this.agencia = agencia;
	}

	public String getDigitoAgencia() {
		return digitoAgencia;
	}

	public void setDigitoAgencia(String digitoAgencia) {
		this.digitoAgencia = digitoAgencia;
	}

	public String getConta() {
		return conta;
	}

	public void setConta(String conta) {
		this.conta = conta;
	}

	public String getDigitoConta() {
		return digitoConta;
	}

	public void setDigitoConta(String digitoConta) {
		this.digitoConta = digitoConta;
	}

	public EnumFormaPagamentos getFormaPagamento() {
		return formaPagamento;
	}

	public void setFormaPagamento(EnumFormaPagamentos formaPagamento) {
		this.formaPagamento = formaPagamento;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getNit() {
		return nit;
	}

	public void setNit(String nit) {
		this.nit = nit;
	}

	public String getCpf() {
		return cpf;
	}

	public void setCpf(String cpf) {
		this.cpf = cpf;
	}

	public String getNomePai() {
		return nomePai;
	}

	public void setNomePai(String nomePai) {
		this.nomePai = nomePai;
	}

	public String getNomeMae() {
		return nomeMae;
	}

	public void setNomeMae(String nomeMae) {
		this.nomeMae = nomeMae;
	}

	public Date getDataNascimento() {
		try {
			return DateUtils.parse(this.dataNascimento.toString());
		} catch (ParseException e) {
			e.printStackTrace();
			return null;
		}
	}

	public void setDataNascimento(Date dataNascimento) {
		this.dataNascimento = dataNascimento;
	}

	public EnumSexo getSexo() {
		return sexo;
	}

	public void setSexo(EnumSexo sexo) {
		this.sexo = sexo;
	}

	public String getNaturalidade() {
		return naturalidade;
	}

	public void setNaturalidade(String naturalidade) {
		this.naturalidade = naturalidade;
	}

	public EnumUf getUfNaturalidade() {
		return ufNaturalidade;
	}

	public void setUfNaturalidade(EnumUf ufNaturalidade) {
		this.ufNaturalidade = ufNaturalidade;
	}

	public String getNumeroCartaoSus() {
		return numeroCartaoSus;
	}

	public void setNumeroCartaoSus(String numeroCartaoSus) {
		this.numeroCartaoSus = numeroCartaoSus;
	}

	public PessoaDocumento getDocumento() {
		return documento;
	}

	public void setDocumento(PessoaDocumento documento) {
		this.documento = documento;
	}

	public Set<PessoaTelefone> getTelefones() {
		return telefones;
	}

	public void setTelefones(Set<PessoaTelefone> telefones) {
		this.telefones = telefones;
	}

	public PessoaEndereco getEndereco() {
		return endereco;
	}

	public void setEndereco(PessoaEndereco endereco) {
		this.endereco = endereco;
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
		Pessoa other = (Pessoa) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}