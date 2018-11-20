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

use App\Sgr\V1\ReciboBundle\Entity\Pessoa;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PessoaFixture extends Fixture
{
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $array = array ('nome'=> 'ODENILTON', 'nit' => '2232');
        $pessoa = new Pessoa($array);
        
        $manager->persist($pessoa);
        $manager->flush();
    }

}