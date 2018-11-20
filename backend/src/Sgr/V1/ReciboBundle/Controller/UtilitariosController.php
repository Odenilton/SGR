<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Sgr\V1\ReciboBundle\Controller;
/**
 * Description of UserController
 *
 * @author Odenilton
 */

use App\Sgr\BaseBundle\Controller\BaseController;
use App\Sgr\BaseBundle\Utils\Number;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UtilitariosController extends BaseController {
    
    public $filter = ['attrs' => '', 'alias' => ''];
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\UtilitariosService";
    
    /**
     * Lists all Users entities.
     *
     * @Route("/v1/utilitarios/anos")
     * @Method("GET")
     */
    public function obterAnos(Request $request) {
        if ($request->isMethod('GET')) {
            return $this->getService()->getResponseJson($this->getService()->obterAnos())->setStatusCode(Response::HTTP_OK);
        }else{
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }
    
    /**
     * Lists all Users entities.
     *
     * @Route("/v1/utilitarios/estados")
     * @Method("GET")
     */
    public function obterEstados(Request $request) {
        if ($request->isMethod('GET')) {
            return $this->getService()->getResponseJson($this->getService()->obterEstados())->setStatusCode(Response::HTTP_OK);
        }else{
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

    /**
     * Lists all Users entities.
     *
     * @Route("/v1/utilitarios/meses")
     * @Method("GET")
     */
    public function obterMeses(Request $request) {
        if ($request->isMethod('GET')) {
            return $this->getService()->getResponseJson($this->getService()->obterMeses())->setStatusCode(Response::HTTP_OK);
        }else{
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

     /**
     * Lists all Users entities.
     *
     * @Route("/v1/utilitarios/orgaos")
     * @Method("GET")
     */
    public function obterOrgaos(Request $request) {
        if ($request->isMethod('GET')) {
            return $this->getService()->getResponseJson($this->getService()->obterOrgaos())->setStatusCode(Response::HTTP_OK);
        }else{
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        } 
    }
    
    /**
     * Lists all Users entities.
     *
     * @Route("/v1/utilitarios/bancos")
     * @Method("GET")
     */
    public function obterBancos(Request $request) {
        if ($request->isMethod('GET')) {
            return $this->getService()->getResponseJson($this->getService()->obterBancos())->setStatusCode(Response::HTTP_OK);
        }else{
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        } 
    }
    
}
