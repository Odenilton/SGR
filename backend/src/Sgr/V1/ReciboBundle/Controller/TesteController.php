<?php

namespace App\Sgr\V1\ReciboBundle\Controller;

use App\Sgr\BaseBundle\Controller\BaseController;
use App\Sgr\BaseBundle\Utils\Number;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Exception;
use App\Sgr\BaseBundle\Utils\Utilitarios;
use App\Sgr\BaseBundle\Exceptions\NegocioException;
use App\Sgr\BaseBundle\Exceptions\AcessoNegadoException;
use App\Sgr\V1\SegurancaBundle\Seguranca\Seguranca;

use PHPJasper\PHPJasper;

class TesteController extends BaseController {

    public $nameService = "App\Sgr\V1\ReciboBundle\Service\RelatorioService";
    public $messages = ['lower' => 'relatório', 'upper' => 'Relatório'];

/*    public function pdfAction(Request $request, $id){
       
        if ($request->isMethod('GET')) {
            try {
                
               
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
    }*/

}
