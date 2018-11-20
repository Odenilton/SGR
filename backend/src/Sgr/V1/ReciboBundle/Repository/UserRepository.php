<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Sgr\V1\ReciboBundle\Repository;
/**
 * Description of TurmaRepository
 *
 * @author Odenilton
 */

use App\Sgr\BaseBundle\Repository\BaseRepository;

class UserRepository extends BaseRepository {

    public function findEmail($email){
        $query = $this->_em->createQuery("SELECT u.email FROM {$this->_entityName} u WHERE u.email = :email");
        $query->setParameter('email', $email);
        return $query->getResult();
    }
    
    public function findAllGrupos() {
    	$query = $this->_em->createQuery("SELECT g FROM App\Sgr\V1\ReciboBundle\Entity\Grupo g");
        return $query->getResult();
    }
}
