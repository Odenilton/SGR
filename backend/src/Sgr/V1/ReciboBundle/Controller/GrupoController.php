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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 *
 * @Route("/v1/grupo/")
 */
class GrupoController extends BaseController {
    
    public $filter = ['attrs' => 'g', 'alias' => 'g'];
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\GrupoService";
    public $messages = ['lower' => 'grupo', 'upper' => 'Grupo'];
    
    /**
     * Lists all Users Grupos.
     *
     * @Route("")
     * @Method({"GET", "OPTIONS"})
     */
    public function indexAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::indexAction($request);
    }

    /**
     * Create a new Grupo entity.
     * 
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::newAction($request);
    }

    /**
     * Finds and displays a Grupo entity.
     *
     * @Route("show/{id}")
     * @Method({"GET", "OPTIONS"})
     */
    public function showAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::showAction($id, $request);
    }

    /**
     * Displays a form to edit an existing Grupo entity.
     *
     * @Route("edit")
     * @Method({"PUT", "OPTIONS"})
     */
    public function editAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::editAction($request);
    }

    /**
     * Deletes a Grupo entity.
     *
     * @Route("delete/{id}")
     * @Method({"DELETE", "OPTIONS"})
     */
    public function deleteAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::deleteAction($id, $request);
    }
    
}
