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

class RecordReciboDto {

    private $nome;
    private $nit;
    private $mes;
    private $ano;
    private $qtd = 01;
    private $valorBruto = 0.00;
    private $valorINSS = 0.00;
    private $valorIRRF = 0.00;
    private $valorISS = 0.00;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    function getNome() {
        return $this->nome;
    }

    function getNit() {
        return $this->nit;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getQtd() {
        return $this->qtd;
    }

    function getValorBruto() {
        return $this->valorBruto;
    }

    function getValorINSS() {
        return $this->valorINSS;
    }

    function getValorIRRF() {
        return $this->valorIRRF;
    }

    function getValorISS() {
        return $this->valorISS;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setNit($nit) {
        $this->nit = $nit;
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

    function setQtd($qtd){
        $this->qtd += $qtd;
        return $this;
    }

    function setValorBruto($valorBruto) {
        $this->valorBruto += $valorBruto;
        return $this;
    }

    function setValorINSS($valorINSS) {
        $this->valorINSS += $valorINSS;
        return $this;
    }

    function setValorIRRF($valorIRRF) {
        $this->valorIRRF += $valorIRRF;
        return $this;
    }

    function setValorISS($valorISS) {
        $this->valorISS += $valorISS;
        return $this;
    }

}
