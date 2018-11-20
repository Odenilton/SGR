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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 *
 * @Route("/v1/orgao/")
 */
class OrgaoController extends BaseController {
    
    public $filter = ['attrs' => 'o', 'alias' => 'o'];
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\OrgaoService";
    public $messages = ['lower' => 'orgão', 'upper' => 'Orgão'];
    
    /**
     * Lists all Users entities.
     *
     * @Route("")
     * @Method({"GET", "OPTIONS"})
     */
    public function indexAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::indexAction($request);
    }

    /**
     * Create a new User entity.
     * 
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::newAction($request);
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("show/{id}")
     * @Method({"GET", "OPTIONS"})
     */
    public function showAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::showAction($id, $request);
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("edit")
     * @Method({"PUT", "OPTIONS"})
     */
    public function editAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::editAction($request);
    }

    /**
     * Deletes a User entity.
     *
     * @Route("delete/{id}")
     * @Method({"DELETE", "OPTIONS"})
     */
    public function deleteAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::deleteAction($id, $request);
    }
    
}
