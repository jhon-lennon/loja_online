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

}