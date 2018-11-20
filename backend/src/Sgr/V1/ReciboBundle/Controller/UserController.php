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
 * @Route("/v1/usuario/")
 */
class UserController extends BaseController {
    
    public $filter = ['attrs' => 'u', 'alias' => 'u'];
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\UserService";
    public $messages = ['lower' => 'usuário', 'upper' => 'Usuário'];
    
    /**
     * Lists all Users entities.
     *
     * @Route("")
     * @Method({"GET", "OPTIONS"})
     */
    public function indexAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::indexAction($request);
    }

    /**
     * Create a new User entity.
     * 
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::newAction($request);
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("show/{id}")
     * @Method({"GET", "OPTIONS"})
     */
    public function showAction($id, Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        return parent::showAction($id, $request);
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("edit")
     * @Method({"PUT", "OPTIONS"})
     */
    public function editAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
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

    /**
     * Finds and displays a Grupos entities.
     *
     * @Route("grupos")
     * @Method({"GET", "OPTIONS"})
     */
    public function showGruposAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoAdministrador();
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entity = $this->getService()->findAllGrupos($this->filter);
                return $this->getService()->getResponseJson($entity)->setStatusCode(Response::HTTP_OK);
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível listar Grupos - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }
    
}
