<?php

use core\controladores\Main;

$rotas = [
    'inicio'    =>     'main@index',
    'login'      =>     'main@login',
    'ver_evento' => 'main@ver_evento',
    'post_comentario' => 'main@comentarios',
    'get_comentarios' => 'main@get_comentarios',
    'get_comentario' => 'main@get_comentario',
    'atualizar_comentario' => 'main@atualizar_comentario',

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

