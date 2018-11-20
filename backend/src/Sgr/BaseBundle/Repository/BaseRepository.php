<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Sgr\BaseBundle\Repository;
/**
 * Description of BaseRepository
 *
 * @author odenilton
 */

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository {
   
    public function insert($entity) {
        $this->_em->persist($entity);
        $this->_em->flush();
        return $entity;
    }

    public function delete($entity) {
        if ($entity) {
            $this->_em->remove($entity);
            $this->_em->flush();
            return $entity;
        }
    }

    public function countRegitro($data = null) {
        $query = $this->_em->createQuery("SELECT count(DISTINCT r.id) FROM {$this->_entityName} r");
        return $query->getResult();
    }

    public function findAllFilter($alias = null) {
        $query = $this->_em->createQuery("SELECT {$alias['attrs']} FROM {$this->_entityName} {$alias['alias']}");
        return $query->getResult();
    }

    public function findAllLazy($first, $max, $alias = null, $data = null) {
        $query = $this->_em->createQuery("SELECT {$alias['attrs']} FROM {$this->_entityName} {$alias['alias']} ORDER BY p.nome ASC")
        ->setFirstResult($first)
        ->setMaxResults($max);
        return $query->getResult();
    }

    public function findFilter($alias = null, $id = null) {
        $query = $this->_em->createQuery("SELECT {$alias['attrs']} FROM {$this->_entityName} {$alias['alias']} WHERE {$alias['alias']}.id = :id");
        $query->setParameter('id', $id);
        return $query->getSingleResult();
    }
    
    public function pesquisar(array $data) {
        throw new \App\Sgr\BaseBundle\Exceptions\NegocioException('Metódo não implementado');
    }
    
}