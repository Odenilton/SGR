<?php

namespace App\Sgr\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/v1/")
     * @Method({"OPTIONS","GET"})
     */
    public function indexAction(Request $request) {
        if ($request->isMethod('GET')) {
            return new JsonResponse(array('status' => 'ok', 'message' => 'Welcome to API'));
        } else {
            return new Response(200);
        }
    }

    /**
     * @Route("/")
     * @Method({"OPTIONS","GET"})
     */
    public function indexAction2(Request $request) {
        if ($request->isMethod('GET')) {
            return new JsonResponse(array('status' => 'ok', 'message' => 'Welcome to API'));
        } else {
            return new Response(200);
        }
    }

}