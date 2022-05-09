<?php

use core\controladores\Main;

$rotas = [
    'inicio'    =>     'main@index',
    'login'      =>     'main@login',
    'sair'      =>     'main@sair',
    'perfil' => 'main@perfil',
    'cadastro' => 'main@cadastro',
    'form_cadastro' => 'main@form_cadastro',
    'form_login' => 'main@form_login',
    'ver_evento' => 'eventos@ver_evento',
    'post_comentario' => 'main@comentarios',
    'get_comentarios' => 'main@get_comentarios',
    'get_comentario' => 'main@get_comentario',
    'atualizar_comentario' => 'main@atualizar_comentario',
    'cadastro_evento' => 'eventos@cadastro_evento',
    'form_cadastro_evento' => 'eventos@form_cadastro_evento',
    'todos_eventos' => 'eventos@todos_eventos',
    'confirmar_presenca' => 'eventos@confirmar_presenca',
    'numero_presenca' => 'eventos@numero_presenca',
    'excluir_comentario' =>'eventos@excluir_comentario',
    'count_comentario' => 'eventos@count_comentario',   

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

