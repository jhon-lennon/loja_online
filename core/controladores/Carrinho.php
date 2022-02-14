<?php
namespace core\controladores;

use core\classes\Database;
use core\classes\Functions;

class Carrinho{

    public function carrinho(){


        $resultados = new Database();
        $resultados->select("SELECT * FROM clientes");
        var_dump($resultados);
        
        die('fim');

        $views = [
            'layouts/html_head',
            'head',
            'carrinho',
            'rodape',
            'layouts/html_footer'
    
    ];
    
    $dados = ['titulo'=> 'esse é o titulo'];
    
    Functions::layout($views, $dados);
    }

}