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

use Symfony\Component\DependencyInjection\ContainerInterface;

class OrgaoService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = "App\Sgr\V1\ReciboBundle\Entity\Orgao";
        $this->repository = $this->entityManager->getRepository('ReciboBundle:Orgao');
    }

}