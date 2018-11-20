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

class PessoaService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\Pessoa";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:Pessoa');
    }
    
    public function insert(array $data) {
        $endereco = new PessoaEndereco($data['endereco']);
        unset($data['endereco']);
        
        $entity = new $this->entity($data);
        $entity->setEndereco($endereco);
        
        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        $endereco = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\PessoaEndereco', $data['endereco']['id']);
        $entity = $this->entityManager->getReference($this->entity, $data['id']);
        
        //Update Endereco
        Configurator::configure($endereco, $data['endereco']);
        unset($data['endereco']);
        
        //Update Entity
        Configurator::configure($entity, $data);
        $entity->setEndereco($endereco);
        
        return $this->repository->insert($entity);
    }

}