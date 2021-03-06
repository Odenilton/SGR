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
use App\Sgr\V1\ReciboBundle\Entity\PessoaEndereco;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ReciboService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\Recibo";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:Recibo');
    }
    
    public function insert(array $data) {
        $orgao = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
        $pessoa = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Pessoa', $data['pessoa']['id']);
        
        unset($data['orgao']);
        unset($data['pessoa']);
        
        $entity = new $this->entity($data);
        $entity->setOrgao($orgao);
        $entity->setPessoa($pessoa);
        
        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        $entity = $this->entityManager->getReference($this->entity, $data['id']); 
        $orgao = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Orgao', $data['orgao']['id']);
        $pessoa = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Pessoa', $data['pessoa']['id']);
               
        //Update Entity
        Configurator::configure($entity, $data);
        $entity->setOrgao($orgao);
        $entity->setPessoa($pessoa);
        
        return $this->repository->insert($entity);
    }

}