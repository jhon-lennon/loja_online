<?php
namespace core\controladores;

use core\classes\Functions;

class Main{

public function index(){
    $views = [
                'layouts/html_footer',
                'layouts/html_header'

    ];

    $dados = ['titulo'=> 'esse é o titulo'];
    
    Functions::layout($views, $dados);
}

public function loja(){
    echo"loja";
}

}