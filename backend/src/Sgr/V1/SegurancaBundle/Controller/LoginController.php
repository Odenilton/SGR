<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Sgr\V1\SegurancaBundle\Controller;
/**
 * Description of LoginController
 *
 * @author Odenilton
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Sgr\BaseBundle\Utils\JWT;
use App\Sgr\V1\ReciboBundle\Service\UserService;
use App\Sgr\BaseBundle\Controller\BaseController;

class LoginController extends BaseController {

    private $userService;

    /**
     * Lists all Atributos entities.
     *
     * @Route("/v1/login")
     * @Method({"OPTIONS","POST"})
     */
    public function indexAction(Request $request) {
        if ($request->isMethod('POST')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            $user = $this->getUserService()->findByEmail($data['email']);
            if ($user && $this->getUserService()->passwordValid($data['password'], $user)) {
                return new JsonResponse(
                        [
                            'token' => JWT::createToken($user)
                        ], Response::HTTP_OK);
            } else {
                return new JsonResponse(['status' => 'error', 'message' => 'Usuário ou senha inválidos'], Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return new JsonResponse();
        }
    } 

    /**
     * 
     * @return UserService
     */
    private function getUserService() {
        if ($this->userService == null || $this->userService === null)
            $this->userService = new UserService($this->container);
        return $this->userService;
    }

}
