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
 * @ORM\Table(name="pessoa_endereco")
 */
class PessoaEndereco {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="logradouro", type="string", nullable=true)
     * @var string
     */
    private $logradouro;

    /**
     * @ORM\Column(name="complemento", type="string", nullable=true)
     * @var string
     */
    private $complemento;

    /**
     * @ORM\Column(name="bairro", type="string", nullable=true)
     * @var string
     */
    private $bairro;

    /**
     * @ORM\Column(name="cep", type="string", nullable=true)
     * @var string
     */
    private $cep;

    /**
     * @ORM\Column(name="numero", type="string", nullable=true)
     * @var string
     */
    private $numero;

    /**
     * @ORM\Column(name="cidade", type="string", nullable=true)
     * @var string
     */
    private $cidade;

    /**
     * @ORM\Column(name="uf", type="integer", nullable=true)
     * @var string
     */
    private $uf;

    /**
     * @ORM\Column(name="zonaEndereco", type="integer", nullable=true)
     * @var string
     */
    private $zonaEndereco;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    function getId() {
        return $this->id;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function getZonaEndereco() {
        return $this->zonaEndereco;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
        return $this;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
        return $this;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }

    function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    function setNumero($numero) {
        $this->numero = $numero;
        return $this;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    function setUf($uf) {
        $this->uf = $uf;
        return $this;
    }

    function setZonaEndereco($zonaEndereco) {
        $this->zonaEndereco = $zonaEndereco;
        return $this;
    }

}
