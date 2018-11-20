<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadUserData
 *
 * @author Odenilton
 */

namespace App\Sgr\V1\ReciboBundle\DataFixtures;

use App\Sgr\V1\ReciboBundle\Entity\Grupo;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GrupoFixture extends Fixture
{
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $array = array ('name'=> 'ROLE_ADMINISTRADOR', 'descricao' => 'Administrador');
        $grupo = new Grupo($array);

        $manager->persist($grupo);
        $manager->flush();
    }

}