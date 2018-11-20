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
abstract class EnumEstado {

    public static $estado = [
        ['value' => 1, 'descricao' => "Acre", 'str' => "AC"],
        ['value' => 2, 'descricao' => "Alagoas", 'str' => "AL"],
        ['value' => 3, 'descricao' => "Amazonas", 'str' => "AM"],
        ['value' => 4, 'descricao' => "Amapá", 'str' => "AP"],
        ['value' => 5, 'descricao' => "Bahia", 'str' => "BA"],
        ['value' => 6, 'descricao' => "Ceará", 'str' => "CE"],
        ['value' => 7, 'descricao' => "Distrito Federal", 'str' => "DF"],
        ['value' => 8, 'descricao' => "Espírito Santo", 'str' => "ES"],
        ['value' => 9, 'descricao' => "Goiás", 'str' => "GO"],
        ['value' => 10, 'descricao' => "Maranhão", 'str' => "MA"],
        ['value' => 11, 'descricao' => "Minas Gerais", 'str' => "MG"],
        ['value' => 12, 'descricao' => "Mato Grosso do Sul", 'str' => "MS"],
        ['value' => 13, 'descricao' => "Mato Grosso", 'str' => "MT"],
        ['value' => 14, 'descricao' => "Pará", 'str' => "PA"],
        ['value' => 15, 'descricao' => "Paraíba", 'str' => "PB"],
        ['value' => 16, 'descricao' => "Pernambuco", 'str' => "PE"],
        ['value' => 17, 'descricao' => "Piauí", 'str' => "PI"],
        ['value' => 18, 'descricao' => "Paraná", 'str' => "PR"],
        ['value' => 19, 'descricao' => "Rio de Janeiro", 'str' => "RJ"],
        ['value' => 20, 'descricao' => "Rio Grande do Norte", 'str' => "RN"],
        ['value' => 21, 'descricao' => "Rondônia", 'str' => "RO"],
        ['value' => 22, 'descricao' => "Roraima", 'str' => "RR"],
        ['value' => 23, 'descricao' => "Rio Grande do Sul", 'str' => "RS"],
        ['value' => 24, 'descricao' => "Santa Catarina", 'str' => "SC"],
        ['value' => 25, 'descricao' => "Sergipe", 'str' => "SE"],
        ['value' => 26, 'descricao' => "São Paulo", 'str' => "SP"],
        ['value' => 27, 'descricao' => "Tocantins", 'str' => "TO"]
    ];

    public static function getEnum() {
        return self::$estado;
    }

}
