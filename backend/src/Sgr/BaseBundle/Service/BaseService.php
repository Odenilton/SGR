<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractService
 *
 * @author odenilton
 */

namespace App\Sgr\BaseBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use App\Sgr\BaseBundle\Utils\Configurator;

abstract class BaseService {

    /**
     *
     * @var EntityManager 
     */
    protected $entityManager;
    protected $entity;
    protected $container;
    protected $serializer;

    protected $repository;

    public function __construct(ContainerInterface $container = null) {
        $this->container = $container;
        $this->entityManager = $this->container->get('doctrine')->getManager();
        $this->serializer = $this->container->get('serializer');
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);
        
        return $this->repository->insert($entity);
    }

    public function update(array $data) {
        $entity = $this->entityManager->getReference($this->entity, $data['id']);
        Configurator::configure($entity, $data);
        
        return $this->repository->insert($entity);
    }

    public function delete($id) {
       $entity = $this->entityManager->getReference($this->entity, $id);
       
       return $this->repository->delete($entity);
    }

    public function countRegitro($data = null){
        return $this->repository->countRegitro($data);
    }

    public function findAll() {
        return $this->repository->findAll();
    }

    public function find($id) {
        return $this->repository->find($id);
    }

    public function findAllFilter($alias = null) {
       return $this->repository->findAllFilter($alias);
    }

    public function findAllLazy($first, $max, $alias = null, $data = null) {
       return $this->repository->findAllLazy($first, $max, $alias, $data);
    }

    public function findFilter($alias = null, $id = null) {
       return $this->repository->findFilter($alias, $id);
    }
    
    public function pesquisar(array $data){
        return $this->repository->pesquisar($data);
    }

    public function getResponseJson($content) {
        $json = new JsonResponse();
        $json->setContent($this->serialize($content));
        return $json;
    }

    public function getResponse($content = null) {
        $response = new Response();
        $response->setContent($this->serialize($content));
        return $response;
    }

    public function getHeadersResponseSend() {
        $response = new Response();
        $response->send();
    }

    public function getHeadersCORS($content) {
        $response = new Response();
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, access-control-allow-methods');
        $response->headers->set('Content-Type:', 'application/json');
        $response->setContent($this->serialize($content));
        return $response;
    }

    public function serialize($data, $format = 'json') {
        return $this->serializer->serialize($data, $format);
    }

    public function getRepository() {
        return $this->repository;
    }
    
}