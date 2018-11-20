<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Entity;

/**
 * Description of Turma
 *
 * @author Odenilton
 */
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

use App\Sgr\BaseBundle\Utils\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Sgr\V1\ReciboBundle\Repository\UserRepository")
 */
class User implements UserInterface {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="email", type="string")
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="password", type="string")
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(name="salt", type="string")
     * @var string
     */
    private $salt;

    /**
     * @ORM\Column(name="secret", type="string")
     * @var string
     */
    private $secret;

    /**
     * @ORM\ManyToMany(targetEntity="App\Sgr\V1\ReciboBundle\Entity\Grupo")
     * @ORM\JoinTable(name="users_grupo",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")}
     *      )
     * @var ArrayCollection
     */
    private $grupos;

    public function __construct($options = null) {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->secret = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        Configurator::configure($this, $options);
        $this->grupos = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt){
        $this->salt = $salt;
        return $this;
    }

    public function getSecret() {
        return $this->secret;
    }

    public function setSecret($secret){
        $this->secret = $secret;
        return $this;
    }
    public function eraseCredentials() {
        
    }

    public function getRoles() {
        $roles = [];
        foreach ($this->grupos as $grupo) {
            array_push($roles, $grupo->getName());
        }
        return $roles;
    }

    public function getGrupos() {
        return $this->grupos;
    }

    public function setGrupos($grupos) {
        $this->grupos = $grupos;
        return $this;
    }

    public function getUsername() {
        return $this->email;
    }

}
