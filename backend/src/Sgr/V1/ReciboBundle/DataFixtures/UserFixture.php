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

use App\Sgr\V1\ReciboBundle\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $arra = array ('name'=> 'odenilton', 'password' => '123', 'email' => 'odeniltonlj@gmail.com');
        $userAdmin = new User($arra);
        $userAdmin->setPassword($this->encodePassword($userAdmin, $userAdmin->getPassword()));
        
        $manager->persist($userAdmin);
        $manager->flush();
    }
    
    private function encodePassword($user, $password){
        return $this->encoder->encodePassword($user, $password);
    }
}