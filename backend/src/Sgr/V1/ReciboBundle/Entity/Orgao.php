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
 * @ORM\Table(name="orgao")
 * @ORM\Entity(repositoryClass="App\Sgr\V1\ReciboBundle\Repository\OrgaoRepository")
 */
class Orgao {

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
     * @ORM\Column(name="cnpj", type="string", nullable=true)
     * @var string
     */
    private $cnpj;

    /**
     * @ORM\Column(name="responsavel", type="string", nullable=true)
     * @var string
     */
    private $responsavel;    
   
    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

     public function getResponsavel() {
        return $this->responsavel;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($name) {
        $this->nome = $name;
        return $this;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
        return $this;
    }
    
}