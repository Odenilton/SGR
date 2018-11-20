<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sgr\BaseBundle\Utils;

/**
 * Description of Messages
 *
 * @author Odenilton
 */

abstract class Utilitarios {

    public static function getMessageSuccess($message){
        return array(
          'status' => 'success',
          'message' => $message
        );
    }
    
    public static function getMessageError($message){
        return array(
          'status' => 'error',
          'message' => $message
        );
    }
    
    public static function getMessageWarning($message){
        return array(
          'status' => 'warning',
          'message' => $message
        );
    }
    
    public static function getMessageErrorCredentials(){
        return ['status'=>'error', 'message'=>'Credênciais invalidas'];
    }
    
    public static function getMessageBadRequest(){
        return ['status'=>'error', 'message'=>'Requisição Inválida'];
    }
    
}