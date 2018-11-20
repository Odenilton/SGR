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

use App\Sgr\V1\ReciboBundle\Entity\Orgao;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class OrgaoFixture extends Fixture
{
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $array = array ('nome'=> 'PREFEITURA MUNICIPAL', 'responsavel' => 'GERALDO ANTONIO NETO', 'cnpj' => '00000000');
        $orgao = new Orgao($array);
        
        $manager->persist($orgao);
        $manager->flush();
    }

}