<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\BaseBundle\Utils;

/**
 * Description of JWT
 *
 * @author odenilton
 */
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha512;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;

abstract class JWT {
    
    public static function createToken($user) {
        return (new Builder())->setIssuer('https://prefeituracachoeiradegoias.oemsistemas.com.br/api/v1/') // Configures the issuer (iss claim)
                        ->setAudience('https://prefeituracachoeiradegoias.oemsistemas.com.br') // Configures the audience (aud claim)
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + 1) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + 1800) // Configures the expiration time of the token (exp claim)
                        ->set('username', $user->getEmail()) // Configures a new claim, called "uid"
                        ->set('name', $user->getName()) // Configures a new claim, called "uid"
                        ->set('roles', $user->getRoles()) // Configures a new claim, called "uid"
                        ->sign(new Sha512(), self::createSign($user))
                        ->getToken()->__toString(); // Retrieves the generated token
    }

    public static function validateToken($token, $secret) {
        try{ 
            $decoded = (new Parser())->parse((string) $token);

            if (!$decoded->verify(new Sha512(), $secret)) {
                return false;
            }

            if (empty($decoded)) { 
                return false;
            }

            $data = new ValidationData();
            $data->setIssuer('https://prefeituracachoeiradegoias.oemsistemas.com.br/api/v1/');
            $data->setAudience('https://prefeituracachoeiradegoias.oemsistemas.com.br');
            $data->setCurrentTime(time());

            return $decoded->validate($data);
        } catch (Exception $ex) {
                return false;
        }
    }

    public static function obterUserNamePorToken($token) {
        return (new Parser())->parse((string) $token)->getClaim('username');
    }

    public static function createSign($user){
        $grupos = '';
        foreach ($user->getGrupos() as $value) {
            $grupos .= $value->getDescricao();
        }
        return $user->getSecret() . ':D' . $user->getpassword() . $grupos;

    }

}
