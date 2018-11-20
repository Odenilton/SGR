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
 * @ORM\Table(name="parametro")
 * @ORM\Entity(repositoryClass="App\Sgr\V1\ReciboBundle\Repository\ParametroRepository")
 */
class Parametro {

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
     * @ORM\Column(name="mes", type="string")
     * @var string
     */
    private $mes;

    /**
     * @ORM\Column(name="ano", type="string")
     * @var string
     */
    private $ano;

    /**
     * @ORM\Column(name="impostoISS", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $impostoISS;

    /**
     * @ORM\Column(name="inssFaixa1", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssFaixa1;

    /**
     * @ORM\Column(name="inssFaixa2", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssFaixa2;

    /**
     * @ORM\Column(name="inssFaixa3", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssFaixa3;

    /**
     * @ORM\Column(name="inssFaixa4", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssFaixa4;

    /**
     * @ORM\Column(name="inssIndice1", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssIndice1;

    /**
     * @ORM\Column(name="inssIndice2", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssIndice2;

    /**
     * @ORM\Column(name="inssIndice3", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssIndice3;

    /**
     * @ORM\Column(name="inssIndice4", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $inssIndice4;

    /**
     * @ORM\Column(name="irDeducao", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irDeducao;

    /**
     * @ORM\Column(name="irDeducao65", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irDeducao65;

    /**
     * @ORM\Column(name="irDeducaoPrevPro", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irDeducaoPrevPro;

    /**
     * @ORM\Column(name="irBase1", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irBase1;

    /**
     * @ORM\Column(name="irBase2", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irBase2;

    /**
     * @ORM\Column(name="irBase3", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irBase3;

    /**
     * @ORM\Column(name="irBase4", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irBase4;

    /**
     * @ORM\Column(name="irPercentual1", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irPercentual1;

    /**
     * @ORM\Column(name="irPercentual2", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irPercentual2;

    /**
     * @ORM\Column(name="irPercentual3", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irPercentual3;

    /**
     * @ORM\Column(name="irPercentual4", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irPercentual4;

    /**
     * @ORM\Column(name="irParcela1", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irParcela1;

    /**
     * @ORM\Column(name="irParcela2", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irParcela2;

    /**
     * @ORM\Column(name="irParcela3", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irParcela3;

    /**
     * @ORM\Column(name="irParcela4", type="decimal", nullable=true, precision=10, scale=2)
     * @var decimal
     */
    private $irParcela4;

    /**
     * @ORM\ManyToOne(targetEntity="App\Sgr\V1\ReciboBundle\Entity\Orgao")
     * @ORM\JoinColumn(name="orgao_id", referencedColumnName="id")
     */
    protected $orgao;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getImpostoISS() {
        return $this->impostoISS;
    }

    function getInssFaixa1() {
        return $this->inssFaixa1;
    }

    function getInssFaixa2() {
        return $this->inssFaixa2;
    }

    function getInssFaixa3() {
        return $this->inssFaixa3;
    }

    function getInssFaixa4() {
        return $this->inssFaixa4;
    }

    function getInssIndice1() {
        return $this->inssIndice1;
    }

    function getInssIndice2() {
        return $this->inssIndice2;
    }

    function getInssIndice3() {
        return $this->inssIndice3;
    }

    function getInssIndice4() {
        return $this->inssIndice4;
    }

    function getIrDeducao() {
        return $this->irDeducao;
    }

    function getIrDeducao65() {
        return $this->irDeducao65;
    }

    function getIrDeducaoPrevPro() {
        return $this->irDeducaoPrevPro;
    }

    function getIrBase1() {
        return $this->irBase1;
    }

    function getIrBase2() {
        return $this->irBase2;
    }

    function getIrBase3() {
        return $this->irBase3;
    }

    function getIrBase4() {
        return $this->irBase4;
    }

    function getIrPercentual1() {
        return $this->irPercentual1;
    }

    function getIrPercentual2() {
        return $this->irPercentual2;
    }

    function getIrPercentual3() {
        return $this->irPercentual3;
    }

    function getIrPercentual4() {
        return $this->irPercentual4;
    }

    function getIrParcela1() {
        return $this->irParcela1;
    }

    function getIrParcela2() {
        return $this->irParcela2;
    }

    function getIrParcela3() {
        return $this->irParcela3;
    }

    function getIrParcela4() {
        return $this->irParcela4;
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

    function setMes($mes) {
        $this->mes = $mes;
        return $this;
    }

    function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

    function setImpostoISS($impostoISS) {
        $this->impostoISS = $impostoISS;
        return $this;
    }

    function setInssFaixa1($inssFaixa1) {
        $this->inssFaixa1 = $inssFaixa1;
        return $this;
    }

    function setInssFaixa2($inssFaixa2) {
        $this->inssFaixa2 = $inssFaixa2;
        return $this;
    }

    function setInssFaixa3($inssFaixa3) {
        $this->inssFaixa3 = $inssFaixa3;
        return $this;
    }

    function setInssFaixa4($inssFaixa4) {
        $this->inssFaixa4 = $inssFaixa4;
        return $this;
    }

    function setInssIndice1($inssIndice1) {
        $this->inssIndice1 = $inssIndice1;
        return $this;
    }

    function setInssIndice2($inssIndice2) {
        $this->inssIndice2 = $inssIndice2;
        return $this;
    }

    function setInssIndice3($inssIndice3) {
        $this->inssIndice3 = $inssIndice3;
        return $this;
    }

    function setInssIndice4($inssIndice4) {
        $this->inssIndice4 = $inssIndice4;
        return $this;
    }

    function setIrDeducao($irDeducao) {
        $this->irDeducao = $irDeducao;
        return $this;
    }

    function setIrDeducao65($irDeducao65) {
        $this->irDeducao65 = $irDeducao65;
        return $this;
    }

    function setIrDeducaoPrevPro($irDeducaoPrevPro) {
        $this->irDeducaoPrevPro = $irDeducaoPrevPro;
        return $this;
    }

    function setIrBase1($irBase1) {
        $this->irBase1 = $irBase1;
        return $this;
    }

    function setIrBase2($irBase2) {
        $this->irBase2 = $irBase2;
        return $this;
    }

    function setIrBase3($irBase3) {
        $this->irBase3 = $irBase3;
        return $this;
    }

    function setIrBase4($irBase4) {
        $this->irBase4 = $irBase4;
        return $this;
    }

    function setIrPercentual1($irPercentual1) {
        $this->irPercentual1 = $irPercentual1;
        return $this;
    }

    function setIrPercentual2($irPercentual2) {
        $this->irPercentual2 = $irPercentual2;
        return $this;
    }

    function setIrPercentual3($irPercentual3) {
        $this->irPercentual3 = $irPercentual3;
        return $this;
    }

    function setIrPercentual4($irPercentual4) {
        $this->irPercentual4 = $irPercentual4;
        return $this;
    }

    function setIrParcela1($irParcela1) {
        $this->irParcela1 = $irParcela1;
        return $this;
    }

    function setIrParcela2($irParcela2) {
        $this->irParcela2 = $irParcela2;
        return $this;
    }

    function setIrParcela3($irParcela3) {
        $this->irParcela3 = $irParcela3;
        return $this;
    }

    function setIrParcela4($irParcela4) {
        $this->irParcela4 = $irParcela4;
        return $this;
    }

    function setOrgao($orgao) {
        $this->orgao = $orgao;
        return $this;
    }

}
