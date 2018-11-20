<?php

namespace App\Sgr\BaseBundle\Utils\Enum;

abstract class EnumBanco {

    public static $banco = [
        ['value' => "1", 'str' => 'BANCODOBRASIL', 'codigo' => "001", 'descricao' => "Banco do Brasil"],
        ['value' => "2", 'str' => 'BRADESCO', 'codigo' => "237", 'descricao' => "Bradesco"],
        ['value' => "3", 'str' => 'CAIXA', 'codigo' => "104", 'descricao' => "Caixa"],
        ['value' => "4", 'str' => 'HSBC', 'codigo' => "399", 'descricao' => "HSBC"],
        ['value' => "5", 'str' => 'ITAU', 'codigo' => "341", 'descricao' => "Itaú"],
        ['value' => "6", 'str' => 'SANTANDER', 'codigo' => "033", 'descricao' => "Santander"],
    ];

    public static function getEnum() {
        return self::$banco;
    }

    public static function getDescricaoEnum($valor) {

        $result = null;

        foreach (self::getEnum() as $value) {
            if ($value['value'] == $valor){
                $result = $value['descricao'];
            }
        }

        return strtoupper($result);
    }
}
