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
use App\Sgr\BaseBundle\Exceptions\NegocioException;
use App\Sgr\BaseBundle\Utils\Configurator;
use App\Sgr\V1\ReciboBundle\Repository\UtilitariosRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UtilitariosService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "";
        $this->repository = new UtilitariosRepository();
    }

    public function obterAnos() {
        return $this->repository->obterAnos();
    }

    public function obterMeses() {
        return $this->repository->obterMeses();
    }

    public function obterOrgaos() {
        return $this->entityManager->getRepository('ReciboBundle:Orgao')->findAll();
    }

    public function obterEstados() {
        return $this->repository->obterEstados();
    }
    
    public function obterBancos() {
        return $this->repository->obterBancos();
    }

    public function obterRecibo($id) {
        return $this->entityManager->getRepository('ReciboBundle:Recibo')->findOneById($id);
    }

}
