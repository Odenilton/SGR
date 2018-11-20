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
 * @ORM\Table(name="recibo")
 * @ORM\Entity(repositoryClass="App\Sgr\V1\ReciboBundle\Repository\ReciboRepository")
 */
class Recibo {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="descricao", type="string")
     * @var string
     */
    private $descricao;

    /**
     * @ORM\Column(name="dia", type="string", nullable=true)
     * @var string
     */
    private $dia;

    /**
     * @ORM\Column(name="mes", type="string", nullable=true)
     * @var string
     */
    private $mes;

    /**
     * @ORM\Column(name="ano", type="string", nullable=true)
     * @var string
     */
    private $ano;

    /**
     * @ORM\Column(name="rendimentoTributavel", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $rendimentoTributavel;

    /**
     * @ORM\Column(name="previdenciaOficial", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $previdenciaOficial;

    /**
     * @ORM\Column(name="pensaoAlimenticia", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $pensaoAlimenticia;

    /**
     * @ORM\Column(name="qtdDependentes", type="integer", nullable=true)
     * @var int
     */
    private $qtdDependentes;

    /**
     * @ORM\Column(name="valorTotalDependentes", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $valorTotalDependentes;

    /**
     * @ORM\Column(name="outrasDeducoes", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $outrasDeducoes;

    /**
     * @ORM\Column(name="valorTotalDeducoes", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $valorTotalDeducoes;

    /**
     * @ORM\Column(name="baseDeCalculo", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $baseDeCalculo;

    /**
     * @ORM\Column(name="impostoIRRF", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $impostoIRRF;

    /**
     * @ORM\Column(name="impostoISS", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $impostoISS;

    /**
     * @ORM\Column(name="valorLiquido", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $valorLiquido;

    /**
     * @ORM\Column(name="ligacaoOrgao", type="string", nullable=true)
     * @var string
     */
    private $ligacaoOrgao;

    /**
     * @ORM\Column(name="descricaoServico", type="text", nullable=true)
     * @var string
     */
    private $descricaoServico;

    /**
     * @ORM\ManyToOne(targetEntity="App\Sgr\V1\ReciboBundle\Entity\Pessoa")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    private $pessoa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Sgr\V1\ReciboBundle\Entity\Orgao")
     * @ORM\JoinColumn(name="orgao_id", referencedColumnName="id")
     */
    private $orgao;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDia() {
        return $this->dia;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getRendimentoTributavel() {
        return $this->rendimentoTributavel;
    }

    function getPrevidenciaOficial() {
        return $this->previdenciaOficial;
    }

    function getPensaoAlimenticia() {
        return $this->pensaoAlimenticia;
    }

    function getQtdDependentes() {
        return $this->qtdDependentes;
    }

    function getValorTotalDependentes() {
        return $this->valorTotalDependentes;
    }

    function getOutrasDeducoes() {
        return $this->outrasDeducoes;
    }

    function getValorTotalDeducoes() {
        return $this->valorTotalDeducoes;
    }

    function getBaseDeCalculo() {
        return $this->baseDeCalculo;
    }

    function getImpostoIRRF() {
        return $this->impostoIRRF;
    }

    function getImpostoISS() {
        return $this->impostoISS;
    }

    function getValorLiquido() {
        return $this->valorLiquido;
    }

    function getLigacaoOrgao() {
        return $this->ligacaoOrgao;
    }

    function getDescricaoServico() {
        return $this->descricaoServico;
    }

    function getPessoa() {
        return $this->pessoa;
    }

    function getOrgao() {
        return $this->orgao;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    function setDia($dia) {
        $this->dia = $dia;
        return $this;
    }

    function setMes($mes) {
        $this->mes = $mes;
        return $this;
    }

    function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

    function setRendimentoTributavel($rendimentoTributavel) {
        $this->rendimentoTributavel = $rendimentoTributavel;
        return $this;
    }

    function setPrevidenciaOficial($previdenciaOficial) {
        $this->previdenciaOficial = $previdenciaOficial;
        return $this;
    }

    function setPensaoAlimenticia($pensaoAlimenticia) {
        $this->pensaoAlimenticia = $pensaoAlimenticia;
        return $this;
    }

    function setQtdDependentes($qtdDependentes) {
        $this->qtdDependentes = $qtdDependentes;
        return $this;
    }

    function setValorTotalDependentes($valorTotalDependentes) {
        $this->valorTotalDependentes = $valorTotalDependentes;
        return $this;
    }

    function setOutrasDeducoes($outrasDeducoes) {
        $this->outrasDeducoes = $outrasDeducoes;
        return $this;
    }

    function setValorTotalDeducoes($valorTotalDeducoes) {
        $this->valorTotalDeducoes = $valorTotalDeducoes;
        return $this;
    }

    function setBaseDeCalculo($baseDeCalculo) {
        $this->baseDeCalculo = $baseDeCalculo;
        return $this;
    }

    function setImpostoIRRF($impostoIRRF) {
        $this->impostoIRRF = $impostoIRRF;
        return $this;
    }

    function setImpostoISS($impostoISS) {
        $this->impostoISS = $impostoISS;
        return $this;
    }

    function setValorLiquido($valorLiquido) {
        $this->valorLiquido = $valorLiquido;
        return $this;
    }

    function setLigacaoOrgao($ligacaoOrgao) {
        $this->ligacaoOrgao = $ligacaoOrgao;
        return $this;
    }

    function setDescricaoServico($descricaoServico) {
        $this->descricaoServico = $descricaoServico;
        return $this;
    }

    function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
        return $this;
    }

    function setOrgao($orgao) {
        $this->orgao = $orgao;
        return $this;
    }

}
