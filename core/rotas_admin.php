<?php

//use core\controladores\Main;

$rotas = [
            'inicio'    =>     'admin@index',
            'login'      =>     'admin@login',
            'login_form' => 'admin@login_form',
            'sair'      => 'admin@sair',
            'vendas' => 'admin@vendas',
            'produtos' => 'admin@produtos',
            'clientes' => 'admin@clientes',  
            'vendas_pendentes' => 'admin@vendas_pendentes',
            'vendas_concluidas' => 'admin@vendas_concluidas',
            'vendas_enviadas' => 'admin@vendas_enviadas',


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

$controlador = 'core\\controllers\\'.ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();

