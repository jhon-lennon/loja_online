<?php

use core\controladores\Main;

use core\controllers\Admin;

$rotas = [
            'inicio'    =>     'admin@inicio',
            'login'      =>     'admin@login',
            'sair' => 'admin@sair',
            'form_login_admin' => 'admin@form_login_admin', //ajax
            'buscar_usuario' => 'admin@buscar_usuario',     //ajax
            'excluir_usuario' => 'admin@excluir_usuario',   //ajax
            'add_produtor' => 'admin@add_produtor',         //ajax
            'remover_produtor' => 'admin@remover_produtor', //ajax
            'eventos_usuario_count' => 'admin@eventos_usuario_count',   //ajax
            'get_cidades' => 'admin@get_cidades',           //ajax
            'eventos_usuario' => 'admin@eventos_usuario',   //ajax
            'delete_usuario' => 'admin@delete_usuario',     //ajax
           'eventos_do_usuario' => 'admin@eventos_do_usuario',
            'erro' =>   'admin@erro',
            
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

