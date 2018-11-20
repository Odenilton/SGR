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
use App\Sgr\BaseBundle\Utils\Enum\EnumBanco;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use \Exception;
use App\Sgr\BaseBundle\Utils\Utilitarios;

/**
 *
 * @Route("/v1/relatorio/")
 */
class RelatorioController extends BaseController {
    
    public $filter = null;
    
    public $nameService = "App\Sgr\V1\ReciboBundle\Service\RelatorioService";
    public $messages = ['lower' => 'relatório', 'upper' => 'Relatório'];

    /**
     * Lists all Users entities.
     *
     * @Route("recibo/{id}")
     * @Method({"GET", "OPTIONS"})
     */
    public function pdfAction(Request $request, $id)
    {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        if ($request->isMethod('GET')) {
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");
               
                $recibo = $this->getService()->obterRecibo($id);
                $formaPgto = null;
                $banco = null;
                $operacao = null;
                    
                if ($recibo->getPessoa()->getFormaPagamento() === 1){
                    $formaPgto = 'CHEQUE';
                }else {
                    $formaPgto = 'TRANSFERENCIA BANCARIA';
                    $banco = EnumBanco::getDescricaoEnum($recibo->getPessoa()->getBanco());
        
                    if ($recibo->getPessoa()->getBanco() === 3){
                        $operacao = $recibo->getPessoa()->getOperacao();
                    }
                }
                $html = $this->renderView('recibo.html.twig', array(
                    'title'  => 'Recibo',
                    'recibo' => $recibo,
                    'valorBrutoExtenso' => Number::extenso($recibo->getRendimentoTributavel()),
                    'formaPgto' => $formaPgto,
                    'banco' => $banco,
                    'operacao' => $operacao
                ));
        
                return new Response(
                    $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                    200,
                    array(
                        'Content-Type' => 'application/pdf' 
                    )
                );
            } catch (NegocioException $ex) {
                    return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                    return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi gerar relatorio {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }

    /**
     * Create a new User entity.
     * 
     * @Route("recibo-mes")
     * @Method({"POST", "OPTIONS"})
     */
    public function newAction(Request $request) {
        $this->role = $this->getSeguranca()->getPermissaoUsuario();
        
        if ($request->isMethod('POST')) {
            $body = $request->getContent();
            $data = json_decode($body, true);
            try {
                if (!$this->role)
                    throw new AcessoNegadoException("Acesso Negado");
                
                $dados = $this->getService()->reciboPorMes($data);
                $html = $this->renderView('recibo-mes.html.twig', array(
                    'dados'  => $dados
                ));
                ///print_r($dados);
                return new Response(
                    $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                    200,
                    array(
                        'Content-Type' => 'application/pdf' 
                    )
                );
            } catch (NegocioException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (AcessoNegadoException $ex) {
                return $this->getService()->getResponse(Utilitarios::getMessageError($ex->getMessage()))->setStatusCode(Response::HTTP_FORBIDDEN);
            } catch (Exception $ex) {
                return $this->getService()->getResponseJson(Utilitarios::getMessageError("Não foi gerar relatorio {$this->messages['lower']} - Erro: {$ex->getMessage()}"))->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if ($request->isMethod('OPTIONS')) {
            return $this->getService()->getResponse()->setStatusCode(Response::HTTP_OK);
        }
    }
        
}
