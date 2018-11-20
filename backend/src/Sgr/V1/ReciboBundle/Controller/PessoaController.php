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
 * @Route("/v1/pessoa/")
 */
class PessoaController extends BaseController {

    public $filter = ['attrs' => 'p.id, p.nome, p.nomeMae, p.cpf', 'alias' => 'p'];
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\PessoaService";
    public $messages = ['lower' => 'pessoa', 'upper' => 'Pessoa'];

    /**
     * Lists all Pessoas entities.
     *
     * @Route("")
     * @Method({"GET", "OPTIONS"})
     */
    public function indexAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::indexAction($request);
    }

    /**
     * Lists all Pessoas entities.
     *
     * @Route("lazy/{first}/{max}")
     * @Method({"GET", "OPTIONS"})
     */
    public function indexActionLazy($first, $max, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::indexActionLazy($first, $max, $request);
    }

    /**
     * Lists all Pessoas entities.
     *
     * @Route("count")
     * @Method({"GET", "OPTIONS"})
     */
    public function countAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::countAction($request);
    }

    /**
     * Create a new Pessoa entity.
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::newAction($request);
    }

    /**
     * Finds and displays a Pessoa entity.
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
     * Deletes a Pessoa entity.
     *
     * @Route("delete/{id}")
     * @Method({"DELETE", "OPTIONS"})
     */
    public function deleteAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::deleteAction($id, $request);
    }

    /**
     * Create a new Recibo entity.
     * 
     * @Route("pesquisar")
     * @Method({"POST", "OPTIONS"})
     */
    public function pesquisarAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::pesquisarAction($request);
    }
    
}
