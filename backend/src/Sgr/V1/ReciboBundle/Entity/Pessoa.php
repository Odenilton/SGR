<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Entity;

/**
 * Description of UsuarioGrupo
 *
 * @author odenilton
 */
use Doctrine\ORM\Mapping as ORM;
use App\Sgr\BaseBundle\Utils\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 * @ORM\Entity(repositoryClass="App\Sgr\V1\ReciboBundle\Repository\PessoaRepository")
 */
class Pessoa {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", nullable=true)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="nit", type="string", nullable=true)
     * @var string
     */
    private $nit;

    /**
     * @ORM\Column(name="cpf", type="string", nullable=true)
     * @var string
     */
    private $cpf;

    /**
     * @ORM\Column(name="rg", type="string", nullable=true)
     * @var string
     */
    private $rg;

    /**
     * @ORM\Column(name="rgOrgaoExpeditor", type="string", nullable=true)
     * @var string
     */
    private $rgOrgaoExpeditor;

    /**
     * @ORM\Column(name="rgUfOrgaoExpeditor", type="integer", nullable=true)
     * @var string
     */
    private $rgUfOrgaoExpeditor;

    /**
     * @ORM\Column(name="rgDataExpedicao", type="string", nullable=true)
     * @var string
     */
    private $rgDataExpedicao;

    /**
     * @ORM\Column(name="nomeMae", type="string", nullable=true)
     * @var string
     */
    private $nomeMae;

    /**
     * @ORM\Column(name="nomePai", type="string", nullable=true)
     * @var string
     */
    private $nomePai;

    /**
     * @ORM\Column(name="dataNascimento", type="string", nullable=true)
     * @var string
     */
    private $dataNascimento;

    /**
     * @ORM\Column(name="sexo", type="integer", nullable=true)
     * @var string
     */
    private $sexo;

    /**
     * @ORM\Column(name="naturalidade", type="string", nullable=true)
     * @var string
     */
    private $naturalidade;

    /**
     * @ORM\Column(name="ufNaturalidade", type="integer", nullable=true)
     * @var string
     */
    private $ufNaturalidade;

    /**
     * @ORM\Column(name="telefone", type="string", nullable=true)
     * @var string
     */
    private $telefone;

    /**
     * @ORM\Column(name="formaPagamento", type="integer", nullable=true)
     * @var string
     */
    private $formaPagamento;

    /**
     * @ORM\Column(name="banco", type="integer", nullable=true)
     * @var string
     */
    private $banco;

    /**
     * @ORM\Column(name="agencia", type="string", nullable=true)
     * @var string
     */
    private $agencia;

    /**
     * @ORM\Column(name="operacao", type="string", nullable=true)
     * @var string
     */
    private $operacao;

    /**
     * @ORM\Column(name="digitoAgencia", type="string", nullable=true)
     * @var string
     */
    private $digitoAgencia;

    /**
     * @ORM\Column(name="conta", type="string", nullable=true)
     * @var string
     */
    private $conta;

    /**
     * @ORM\Column(name="digitoConta", type="string", nullable=true)
     * @var string
     */
    private $digitoConta;

    /**
     * @ORM\Column(name="tipoConta", type="integer", nullable=true)
     * @var string
     */
    private $tipoConta;

    /**
     * @ORM\OneToOne(targetEntity="App\Sgr\V1\ReciboBundle\Entity\PessoaEndereco", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     */
    protected $endereco;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getNit() {
        return $this->nit;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getRgOrgaoExpeditor() {
        return $this->rgOrgaoExpeditor;
    }

    function getRgUfOrgaoExpeditor() {
        return $this->rgUfOrgaoExpeditor;
    }

    function getRgDataExpedicao() {
        return $this->rgDataExpedicao;
    }

    function getNomeMae() {
        return $this->nomeMae;
    }

    function getNomePai() {
        return $this->nomePai;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getNaturalidade() {
        return $this->naturalidade;
    }

    function getFormaPagamento() {
        return $this->formaPagamento;
    }

    function getBanco() {
        return $this->banco;
    }

    function getAgencia() {
        return $this->agencia;
    }

    function getOperacao() {
        return $this->operacao;
    }

    function getDigitoAgencia() {
        return $this->digitoAgencia;
    }

    function getConta() {
        return $this->conta;
    }

    function getDigitoConta() {
        return $this->digitoConta;
    }

    function getTipoConta() {
        return $this->tipoConta;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setNit($nit) {
        $this->nit = $nit;
        return $this;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    function setRg($rg) {
        $this->rg = $rg;
        return $this;
    }

    function setRgOrgaoExpeditor($rgOrgaoExpeditor) {
        $this->rgOrgaoExpeditor = $rgOrgaoExpeditor;
        return $this;
    }

    function setRgUfOrgaoExpeditor($rgUfOrgaoExpeditor) {
        $this->rgUfOrgaoExpeditor = $rgUfOrgaoExpeditor;
        return $this;
    }

    function setRgDataExpedicao($rgDataExpedicao) {
        $this->rgDataExpedicao = $rgDataExpedicao;
        return $this;
    }

    function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
        return $this;
    }

    function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
        return $this;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
        return $this;
    }

    function setNaturalidade($naturalidade) {
        $this->naturalidade = $naturalidade;
        return $this;
    }

    function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
        return $this;
    }

    function setBanco($banco) {
        $this->banco = $banco;
        return $this;
    }

    function setAgencia($agencia) {
        $this->agencia = $agencia;
        return $this;
    }

    function setOperacao($operacao) {
        $this->operacao = $operacao;
        return $this;
    }

    function setDigitoAgencia($digitoAgencia) {
        $this->digitoAgencia = $digitoAgencia;
        return $this;
    }

    function setConta($conta) {
        $this->conta = $conta;
        return $this;
    }

    function setDigitoConta($digitoConta) {
        $this->digitoConta = $digitoConta;
        return $this;
    }

    function setTipoConta($tipoConta) {
        $this->tipoConta = $tipoConta;
        return $this;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    function getUfNaturalidade() {
        return $this->ufNaturalidade;
    }

    function setUfNaturalidade($ufNaturalidade) {
        $this->ufNaturalidade = $ufNaturalidade;
        return $this;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

}
