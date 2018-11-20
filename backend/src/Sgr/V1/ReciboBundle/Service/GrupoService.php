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

use Doctrine\Common\Collections\ArrayCollection;

use App\Sgr\BaseBundle\Service\BaseService;
use App\Sgr\BaseBundle\Exceptions\NegocioException;
use App\Sgr\BaseBundle\Utils\Configurator;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\HttpFoundation\Response;

class GrupoService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\Grupo";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:Grupo');
    }

    public function insert(array $data) {
        $this->verificaRoleExistente($data['name']);

        $entity = new $this->entity($data);

        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        $temp = $this->findFilter(array('attrs'=>'g.name','alias'=>'g'), $data['id']);
        if ($data['name'] !== $temp['name'])
            $this->verificaRoleExistente($data['name']);

        $entity = $this->entityManager->getReference($this->entity, $data['id']);

        Configurator::configure($entity, $data);
        
        return $this->repository->insert($entity);
    }
    
    private function verificaRoleExistente($name){
        if (count($this->repository->findByName($name)) >= 1)
            throw new NegocioException("Nome de grupo já está em uso");
    }
    
}