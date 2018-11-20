<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\BaseBundle\Utils\Enum;

/**
 * Description of Enuns
 *
 * @author Odenilton
 */
use App\Sgr\BaseBundle\Exceptions\EnumNotFoundException;

abstract class Enuns {

    public static function getEnum() {
        return self::$enums;
    }

    public static function getDescricaoEnum($nomeEnum, $status) {
        if (!array_key_exists($status, self::getEnum($nomeEnum)))
            throw new EnumNotFoundException("Descrição do enum {$nomeEnum} não pode ser localizada");
        return self::getEnum($nomeEnum)[$status]['descricao'];
    }

}