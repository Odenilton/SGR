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
abstract class EnumAno {

    public static $ano = [
        ['value' => 1, 'str' => 'DOISMILEDEZOITO', 'descricao' => '2018']
    ];

    public static function getEnum() {
        return self::$ano;
    }

}
