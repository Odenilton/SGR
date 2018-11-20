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

class PessoaRepository extends BaseRepository {

	public function pesquisar(array $data) {        
        $query = $this->_em->createQuery("SELECT p "
                . "FROM {$this->_entityName} p "
                . "WHERE p.cpf = :cpf");
        $query->setParameter('cpf', $data['cpf']);
        return $query->getResult();
    }

}
