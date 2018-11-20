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

class UserService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\User";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:User');
    }

    public function insert(array $data) {
        $this->verificaEmailExistente($data['email']);

        $grupos = new ArrayCollection();

        foreach ($data['grupos'] as $grupo) {
            $temp = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Grupo', $grupo['id']);
            $grupos->add($temp);
            $temp = null;
        }
        
        unset($data['grupos']);
    
        $entity = new $this->entity($data);
        $entity->setPassword($this->encodePassword($entity, $entity->getPassword()));
        $entity->setGrupos($grupos);

        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        $temp = $this->findFilter(array('attrs'=>'u.email','alias'=>'u'), $data['id']);
        if ($data['email'] !== $temp['email'])
            $this->verificaEmailExistente($data['email']);

        $grupos = new ArrayCollection();

        foreach ($data['grupos'] as $grupo) {
            $temp = $this->entityManager->getReference('App\Sgr\V1\ReciboBundle\Entity\Grupo', $grupo['id']);
            $grupos->add($temp);
            $temp = null;
        }
        
        $entity = self::findByEmail($data['email']);

        unset($data['salt']);
        unset($data['secret']);

        $changedPassword = false;
        if (empty($data['password'])){
            unset($data['password']);
        }else {
            $changedPassword = true;
        }

        Configurator::configure($entity, $data);

        if ($changedPassword)
            $entity->setPassword($this->encodePassword($entity, $entity->getPassword()));
    
        $entity->setGrupos($grupos);
        
        return $this->repository->insert($entity);
    }

    public function passwordValid($password, $alvo){
        if (strcmp($this->encodePassword($alvo, $password), $alvo->getPassword()) == 0)
            return true;
        return false;
    }
    
    public function findByEmail($email){
        return $this->repository->findOneByEmail($email);
    }

    public function findAllFilter($alias = null) {
        $users = $this->repository->findAll();
        foreach ($users as $user) {
            $user->setPassword('');
            $user->setSecret('');
            $user->setSalt('');
        }
        return $users;
    }

    public function findAllGrupos() {
        return $this->repository->findAllGrupos();
    }
    
    private function verificaEmailExistente($email){
        if (count($this->repository->findEmail($email)) >= 1)
            throw new NegocioException("E-mail já está em uso");
    }
    
    private function encodePassword($user, $password){
        $encoder = $this->container->get('security.password_encoder');
        return $encoder->encodePassword($user, $password);
    }

}