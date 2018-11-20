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
 * @Route("/v1/parametro/")
 */
class ParametroController extends BaseController {
    
    public $filter = ['attrs' => 'p', 'alias' => 'p'];
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\ParametroService";
    public $messages = ['lower' => 'parâmetro', 'upper' => 'Parâmetro'];

    /**
     * Create a new Parametro entity.
     * 
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::newAction($request);
    }

    /**
     * Displays a form to edit an existing Parametro entity.
     *
     * @Route("edit")
     * @Method({"PUT", "OPTIONS"})
     */
    public function editAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::editAction($request);
    }
    
        /**
     * Create a new Parametro entity.
     * 
     * @Route("pesquisar")
     * @Method({"POST", "OPTIONS"})
     */
    public function pesquisarAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::pesquisarAction($request);
    }
    
}
