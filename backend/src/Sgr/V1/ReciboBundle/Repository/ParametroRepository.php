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
use App\Sgr\BaseBundle\Utils\Configurator;

class ParametroRepository extends BaseRepository {

    public function pesquisar(array $data) {
        $orgao = $this->_em->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
        Configurator::configure($orgao, $data['orgao']);
        
        $query = $this->_em->createQuery("SELECT p "
                . "FROM {$this->_entityName} p "
                . "WHERE p.mes = :mes "
                . "AND p.ano = :ano "
                . "AND p.orgao = :orgao");
        $query->setParameter('mes', $data['mes']);
        $query->setParameter('ano', $data['ano']);
        $query->setParameter('orgao', $orgao);
        return $query->getResult();
    }

}
