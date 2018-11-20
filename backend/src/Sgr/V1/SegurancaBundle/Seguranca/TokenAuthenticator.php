<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\SegurancaBundle\Seguranca;

/**
 * Description of ApiKeyAuthenticator
 *
 * @author odenilton
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Doctrine\ORM\EntityManager;

use App\Sgr\BaseBundle\Utils\JWT;

class TokenAuthenticator extends AbstractGuardAuthenticator {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning false will cause this authenticator
     * to be skipped.
     */
    public function supports(Request $request)
    {
        if (!$token = str_replace('Bearer ', '', $request->headers->get('Authorization'))) {
            // no token? Return null and no other methods will be called
            return;
        }
        return true;
    }

    /**
     * Called on every request. Return whatever credentials you want,
     * or null to stop authentication.
     */
    public function getCredentials(Request $request) {
        if (!$token = str_replace('Bearer ', '', $request->headers->get('Authorization'))) {
            // no token? Return null and no other methods will be called
            return;
        }

        // What you return here will be passed to getUser() as $credentials
        return array(
            'token' => $token,
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider) {
        $token = $credentials['token'];

        // if null, authentication will fail
        // if a User object, checkCredentials() is called
        return $this->em->getRepository('ReciboBundle:User')
                        ->findOneBy(array('email' => JWT::obterUserNamePorToken($token)));
    }

    public function checkCredentials($credentials, UserInterface $user) {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case
        return JWT::validateToken($credentials['token'], JWT::createSign($user));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $data = array(
            'status' => 'error',
            'message' => 'Houve uma falha na validação do token'
                //strtr($exception->getMessageKey(), $exception->getMessageData())
                // or to translate this message
                // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        );

        return new JsonResponse($data, 401);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null) {
        $data = array(
            'status' => 'error',
            'message' => 'Autenticação Requerida'
        );

        return new JsonResponse($data, 401);
    }

    public function supportsRememberMe() {
        return false;
    }

}
