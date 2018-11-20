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

class ReciboRepository extends BaseRepository {

        public function pesquisar(array $data) {
                $orgao = $this->_em->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
                Configurator::configure($orgao, $data['orgao']);
                
                $query = $this->_em->createQuery("SELECT r "
                        . "FROM {$this->_entityName} r "
                        . "WHERE r.mes = :mes "
                        . "AND r.ano = :ano "
                        . "AND r.orgao = :orgao");
                $query->setParameter('mes', $data['mes']);
                $query->setParameter('ano', $data['ano']);
                $query->setParameter('orgao', $orgao);
                
                return $query->getResult();
        }

        public function countRegitro($data = null) {
                $orgao = $this->_em->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
                Configurator::configure($orgao, $data['orgao']);

                $query = $this->_em->createQuery("SELECT count(DISTINCT r.id) "
                                . "FROM {$this->_entityName} r "
                                . "WHERE r.mes = :mes "
                                . "AND r.ano = :ano "
                                . "AND r.orgao = :orgao");
                        $query->setParameter('mes', $data['mes']);
                        $query->setParameter('ano', $data['ano']);
                        $query->setParameter('orgao', $orgao);
                        
                return $query->getResult();

        }

        public function findAllLazy($first, $max, $alias = null, $data = null) {
                $orgao = $this->_em->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
                Configurator::configure($orgao, $data['orgao']);
                        
                        $query = $this->_em->createQuery("SELECT {$alias['attrs']} "
                                . "FROM {$this->_entityName} r "
                                . "WHERE r.mes = :mes "
                                . "AND r.ano = :ano "
                                . "AND r.orgao = :orgao");
                        $query->setParameter('mes', $data['mes'])
                                ->setParameter('ano', $data['ano'])
                                ->setParameter('orgao', $orgao)
                                ->setFirstResult($first)
                                ->setMaxResults($max);
                        
                        return $query->getResult();

        }

}
