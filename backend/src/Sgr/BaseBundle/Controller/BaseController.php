<?php

namespace App\Sgr\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use \Exception;
use App\Sgr\BaseBundle\Utils\Utilitarios;
use App\Sgr\BaseBundle\Exceptions\NegocioException;
use App\Sgr\BaseBundle\Exceptions\AcessoNegadoException;
use App\Sgr\V1\SegurancaBundle\Seguranca\Seguranca;

abstract class BaseController extends Controller {

    protected $service;
    public $filter;
    public $nameService;
    public $messages;
    public $seguranca;
    public $role = false;

    public function indexAction(Request $request) {
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entities = $this->getService()->findAllFilter($this->filter);
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

    public function countAction(Request $request) {
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entities = $this->getService()->countRegitro();
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

    public function indexActionLazy($first, $max, Request $request) {
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entities = $this->getService()->findAllLazy($first, $max, $this->filter);
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

    public function newAction(Request $request) {
        if ($request->isMethod('POST')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");
                $this->getService()->insert($data);
                return $this->getService()->getResponseJson(Utilitarios::getMessageSuccess("{$this->messages['upper']} cadastrado com sucesso"));
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível inserir {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

    public function showAction($id, Request $request) {
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entity = $this->getService()->find($id);
                return $this->getService()->getResponseJson($entity);
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

    public function editAction(Request $request) {
        if ($request->isMethod('PUT')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $this->getService()->update($data);
                return $this->getService()->getResponseJson(Utilitarios::getMessageSuccess("{$this->messages['upper']} alterado com sucesso"));
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível alterar {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

    public function deleteAction($id, Request $request) {
        if ($request->isMethod('DELETE')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $this->getService()->delete($id);
                return $this->getService()->getResponseJson(Utilitarios::getMessageSuccess("{$this->messages['upper']} removido com sucesso"));
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi possível remover {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }
    
    public function pesquisarAction(Request $request) {
        if ($request->isMethod('POST')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");

                $entity = $this->getService()->pesquisar($data);
                return $this->getService()->getResponseJson($entity)->setStatusCode(Response::HTTP_OK);
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

    public function getService() {
        if ($this->service == null || $this->service === null)
            $this->service = new $this->nameService($this->container);
        return $this->service;
    }

    /**
     * 
     * @return Seguranca
     */
    public function getSeguranca() {
        if ($this->seguranca == null || $this->seguranca === null)
            $this->seguranca = new Seguranca($this->get('security.authorization_checker'));
        return $this->seguranca;
    }

}
