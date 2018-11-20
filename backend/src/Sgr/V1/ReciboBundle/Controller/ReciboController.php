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

use \Exception;
use App\Sgr\BaseBundle\Utils\Utilitarios;
use App\Sgr\BaseBundle\Exceptions\NegocioException;
use App\Sgr\BaseBundle\Exceptions\AcessoNegadoException;
use App\Sgr\V1\SegurancaBundle\Seguranca\Seguranca;

/**
 *
 * @Route("/v1/recibo/")
 */
class ReciboController extends BaseController {
    
    public $filter = ['attrs' => 'r.id, r.descricao, r.rendimentoTributavel', 'alias' => 'r'];
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\ReciboService";
    public $messages = ['lower' => 'recibo', 'upper' => 'Recibo'];

        /**
     * Lists all Recibo entities.
     *
     * @Route("lazy/")
     * @Method({"POST", "OPTIONS"})
     */
    public function indexActionLazy2(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        if ($request->isMethod('POST')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entities = $this->getService()->findAllLazy($data['first'], $data['max'], $this->filter, $data['recibo']);
                return $this->getService()->getResponseJson($entities)->setStatusCode(Response::HTTP_OK);
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível listar {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

    /**
     * Lists all Pessoas entities.
     *
     * @Route("count")
     * @Method({"POST", "OPTIONS"})
     */
    public function countAction(Request $request) {
         if ($request->isMethod('POST')) {
            $this->role = $this->getSeguranca()->getPermissaoUsuario();
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entities = $this->getService()->countRegitro($data);
                return $this->getService()->getResponseJson($entities)->setStatusCode(Response::HTTP_OK);
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível listar {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
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
     * Create a new Recibo entity.
     * 
     * @Route("new")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::newAction($request);
    }

    /**
     * Displays a form to edit an existing Recibo entity.
     *
     * @Route("edit")
     * @Method({"PUT", "OPTIONS"})
     */
    public function editAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        return parent::editAction($request);
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
