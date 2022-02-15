<?php
namespace core\classes;

use Exception;

class Functions{
    public static function layout($estruturas, $dados = null){

        if(!is_array($estruturas)){
            throw new Exception("estrutura de view deve ser um arrey");
        }
        if(!empty($dados) && !is_array($dados)){
            throw new Exception("OS DADOS ENVIADOS DEVEM SER EM FORMA DE ARREY");
        }

        if(!empty($dados) && is_array($dados)){
            extract($dados);
        }

        foreach($estruturas as $estrutura){
            include("../core/views/$estrutura.php");
        }
    }

    public static function crriarHasch($num_caracter = 12){
        $caracrters = '012345678990987654321abcdefghijklmnopqrstuvxwyABCDEFGHIJKLMNOPQRSTUVYXWZzabcdefghi987654321jklmnopqrstuvxwyzBCDEFGHIJKLMNOPQRSTUVYXWZ';

        return substr(str_shuffle($caracrters), 0, $num_caracter);
    }

}