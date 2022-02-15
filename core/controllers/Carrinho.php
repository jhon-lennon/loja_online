<?php
namespace core\controllers;
use core\classes\Functions;

class Carrinho{

    public function carrinho(){
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