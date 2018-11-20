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
abstract class EnumMes {

    public static $mes = [
        ['value' => '01', 'str' => 'JANEIRO', 'descricao' => 'Janeiro'],
        ['value' => '02', 'str' => 'FEVEREIRO', 'descricao' => 'Fevereiro'],
        ['value' => '03', 'str' => 'MARCO', 'descricao' => 'Março'],
        ['value' => '04', 'str' => 'ABRIL', 'descricao' => 'Abril'],
        ['value' => '05', 'str' => 'MAIO', 'descricao' => 'Maio'],
        ['value' => '07', 'str' => 'JUNHO', 'descricao' => 'Junho'],
        ['value' => '07', 'str' => 'JULHO', 'descricao' => 'Julho'],
        ['value' => '08', 'str' => 'AGOSTO', 'descricao' => 'Agosto'],
        ['value' => '09', 'str' => 'SETEMBRO', 'descricao' => 'Setembro'],
        ['value' => '10', 'str' => 'OUTUBRO', 'descricao' => 'Outubro'],
        ['value' => '11', 'str' => 'NOVEMBRO', 'descricao' => 'Novembro'],
        ['value' => '12', 'str' => 'DEZEMBRO', 'descricao' => 'Dezembro'],
    ];

    public static function getEnum() {
        return self::$mes;
    }

}
