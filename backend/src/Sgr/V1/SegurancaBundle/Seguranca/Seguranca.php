<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\SegurancaBundle\Seguranca;

/**
 * Description of Segunraca
 *
 * @author odenilton
 */

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class Seguranca {
    
    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getUsuario(){
        return $this->authorizationChecker->getUser();
    }
    
    public function getPermissaoAdministrador(){
        return $this->authorizationChecker->isGranted('ROLE_ADMINISTRADOR');
    }
    
    public function getPermissaoUsuario(){
        return $this->authorizationChecker->isGranted('ROLE_ADMINISTRADOR')
                || $this->authorizationChecker->isGranted('ROLE_USUARIO');
    } 
    
}