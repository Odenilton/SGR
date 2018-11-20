<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\V1\ReciboBundle\Repository;

/**
 * Description of TurmaRepository
 *
 * @author Odenilton
 */
use App\Sgr\BaseBundle\Utils\Enum\EnumAno;
use App\Sgr\BaseBundle\Utils\Enum\EnumMes;
use App\Sgr\BaseBundle\Utils\Enum\EnumEstado;
use App\Sgr\BaseBundle\Utils\Enum\EnumBanco;

class UtilitariosRepository {

    public function obterMeses() {
        return EnumMes::getEnum();
    }

    public function obterAnos() {
        return EnumAno::getEnum();
    }

    public function obterEstados() {
        return EnumEstado::getEnum();
    }
    
     public function obterBancos() {
        return EnumBanco::getEnum();
    }

}
