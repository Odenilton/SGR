<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Service;

/**
 * Description of UserService
 *
 * @author Odenilton
 */

use App\Sgr\BaseBundle\Service\BaseService;
use App\Sgr\BaseBundle\Utils\Configurator;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ParametroService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\Parametro";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:Parametro');
    }
    
    public function insert(array $data) {
        $orgao = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
        
        $entity = new $this->entity($data);
        $entity->setOrgao($orgao);
        
        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        unset($data['orgao']);
        $entity = $this->entityManager->getReference($this->entity, $data['id']);
        
        //Update Entity
        Configurator::configure($entity, $data);
        
        return $this->repository->insert($entity);
    }

}