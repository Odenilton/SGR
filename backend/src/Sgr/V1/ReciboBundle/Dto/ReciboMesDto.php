<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Dto;

/**
 * Description of UsuarioGrupo
 *
 * @author odenilton
 */
use Doctrine\Common\Collections\ArrayCollection;
use App\Sgr\BaseBundle\Utils\Configurator;

class ReciboMesDto {

    private $titulo;
    private $orgao;
    private $ano;
    private $mes;
    private $exibirINSS;
    private $exibirIRRF;
    private $exibirISS;
    private $qtdTotal;
    private $recordsRecibo;
    private $valorTotalBruto;
    private $valorTotalINSS;
    private $valorTotalIRRF;
    private $valorTotalISS;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
        $this->recordsRecibo = new ArrayCollection();
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getOrgao(){
        return $this->orgao;
    }

    function getAno() {
        return $this->ano;
    }

    function getMes() {
        return $this->mes;
    }

    function getExibirINSS() {
        return $this->exibirINSS;
    }

    function getExibirIRRF() {
        return $this->exibirIRRF;
    }

    function getExibirISS() {
        return $this->exibirISS;
    }

    function getQtdTotal() {
        return $this->qtdTotal;
    }

    function getValorTotalBruto() {
        return $this->valorTotalBruto;
    }

    function getValorTotalINSS() {
        return $this->valorTotalINSS;
    }

    function getValorTotalIRRF() {
        return $this->valorTotalIRRF;
    }

    function getValorTotalISS() {
        return $this->valorTotalISS;
    }

    function getRecordsRecibo() {
        return $this->recordsRecibo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setOrgao($orgao) {
        $this->orgao = $orgao;
        return $this;
    }

    function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

    function setMes($mes) {
        $this->mes = $mes;
        return $this;
    }

    function setExibirINSS($exibirINSS) {
        $this->exibirINSS = $exibirINSS;
        return $this;
    }

    function setExibirIRRF($exibirIRRF) {
        $this->exibirIRRF = $exibirIRRF;
        return $this;
    }

    function setExibirISS($exibirISS) {
        $this->exibirISS = $exibirISS;
        return $this;
    }

    function setQtdTotal($qtdTotal){
        $this->qtdTotal += $qtdTotal;
        return $this;
    }

    function setValorTotalBruto($valorTotalBruto) {
        $this->valorTotalBruto += $valorTotalBruto;
        return $this;
    }

    function setValorTotalINSS($valorTotalINSS) {
        $this->valorTotalINSS += $valorTotalINSS;
        return $this;
    }

    function setRecordsRecibo($recordsRecibo) {
        $this->recordsRecibo = $recordsRecibo;
        return $this;
    }

    function setValorTotalIRRF($valorTotalIRRF) {
        $this->valorTotalIRRF += $valorTotalIRRF;
        return $this;
    }

    function setValorTotalISS($valorTotalISS) {
        $this->valorTotalISS += $valorTotalISS;
        return $this;
    }

}
