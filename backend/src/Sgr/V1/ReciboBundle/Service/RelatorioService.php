<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Service;

/**
 * Description of UserService
 *
 * @author Odenilton
 */

use App\Sgr\BaseBundle\Service\BaseService;
use App\Sgr\BaseBundle\Utils\Configurator;
use App\Sgr\V1\ReciboBundle\Entity\PessoaEndereco;

use Doctrine\Common\Collections\ArrayCollection;

use App\Sgr\V1\ReciboBundle\Dto\ReciboMesDto;
use App\Sgr\V1\ReciboBundle\Dto\RecordReciboDto;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RelatorioService extends BaseService {

    public function __construct(ContainerInterface $container = null) {
        parent::__construct($container);
        $this->entity = null;
        $this->repository = null;
    }
    
    public function reciboPorMes(array $data) {
        $reciboMesDto = new ReciboMesDto(array());
        $recordRecibo = null;

        $novasRecordsRecibo = new ArrayCollection();

        $reciboMesDto->setOrgao($data['orgao']['nome']);
        $reciboMesDto->setAno($data['ano']);
        $reciboMesDto->setMes($data['mes']);
        $reciboMesDto->setTitulo('Recibo por Mês');

        $reciboMesDto->setExibirINSS($data['relatorio']['isINSS']);
        $reciboMesDto->setExibirIRRF($data['relatorio']['isIRRF']);
        $reciboMesDto->setExibirISS($data['relatorio']['isISS']);

        $recibos = $this->entityManager->getRepository('ReciboBundle:Recibo')->pesquisar($data);
        
        foreach ($recibos as $recibo) {
            $recordRecibo = new RecordReciboDto(array());
            
            $recordRecibo->setAno($recibo->getAno());
            $recordRecibo->setMes($recibo->getMes());
            $recordRecibo->setNome($recibo->getPessoa()->getNome());
            $recordRecibo->setNit($recibo->getPessoa()->getNit());
            $recordRecibo->setValorBruto($recibo->getRendimentoTributavel());
            $recordRecibo->setValorINSS($recibo->getPrevidenciaOficial());
            $recordRecibo->setValorIRRF($recibo->getImpostoIRRF());
            $recordRecibo->setValorISS($recibo->getImpostoISS());

           // if (count($reciboMesDto->getRecordsRecibo()) <= 0){
            //    $reciboMesDto->getRecordsRecibo()->add($recordRecibo);
           // }

            //var_dump($this->verificaValor($recordRecibo->getNome(), $reciboMesDto->getRecordsRecibo())->count());

            if ($this->verificaValor($recordRecibo->getNome(), $novasRecordsRecibo)->count() == 0){
                $novasRecordsRecibo->add($recordRecibo);

                $reciboMesDto->setQtdTotal($recordRecibo->getQtd());
                $reciboMesDto->setValorTotalBruto($recordRecibo->getValorBruto());
                $reciboMesDto->setValorTotalINSS($recordRecibo->getValorINSS());
                $reciboMesDto->setValorTotalIRRF($recordRecibo->getValorIRRF());
                $reciboMesDto->setValorTotalISS($recordRecibo->getValorISS());
            }else{
                foreach ($novasRecordsRecibo as $value) {
                    if ($recordRecibo->getNome() == $value->getNome()){
                        $value->setQtd(1);
                        $value->setValorBruto($recordRecibo->getValorBruto());
                        $value->setValorINSS($recordRecibo->getValorINSS());
                        $value->setValorIRRF($recordRecibo->getValorIRRF());
                        $value->setValorISS($recordRecibo->getValorISS());

                        $reciboMesDto->setQtdTotal($recordRecibo->getQtd());
                        $reciboMesDto->setValorTotalBruto($recordRecibo->getValorBruto());
                        $reciboMesDto->setValorTotalINSS($recordRecibo->getValorINSS());
                        $reciboMesDto->setValorTotalIRRF($recordRecibo->getValorIRRF());
                        $reciboMesDto->setValorTotalISS($recordRecibo->getValorISS());
                    }
                }
            }

            
            $recordRecibo = null;
        }

        $recibos = null;
        $reciboMesDto->setRecordsRecibo($novasRecordsRecibo);

        return $reciboMesDto;
    }

    public function obterRecibo($id) {
        return $this->entityManager->getRepository('ReciboBundle:Recibo')->findOneById($id);
    }

    private function verificaValor($nome = '', $lista){
        $exp = new Comparison('nome', '=', $nome);
        $criteria = new Criteria();

        $criteria->where($exp);

        return $lista->matching($criteria);
    }

}