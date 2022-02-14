<?php

//use core\controladores\Main;

$rotas = [
            'inicio'    =>     'main@index',
            'loja'      =>     'main@loja',
            'criar_conta' =>    'main@criar_conta',
            'cadastrar_conta' => 'main@cadastrar_conta',
            'carrinho'  =>     'carrinho@carrinho'
];
$acao = 'inicio';

if(isset($_GET['a'])){
    if(!key_exists($_GET['a'],$rotas )){
        $acao = 'inicio';
    }else{
        $acao = $_GET['a'];
    }
}
$partes = explode('@', $rotas[$acao]);

$controlador = 'core\\controladores\\'.ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();

