<?php

use core\controladores\Main;

$rotas = [
    'inicio'    =>     'main@index',
    'login'      =>     'main@login',
    'sair'      =>     'main@sair',
    'pesquisa_eventos' =>'eventos@pesquisa_eventos',
    'get_cidades' => 'main@get_cidades',
    'cidades' => 'main@view_cidade',
    'cidades_eventos' => 'main@cidades_eventos',
    'form_edit_perfil' => 'usuarios@form_edit_perfil',
    'alterar_senha' => 'usuarios@alterar_senha',
    'recuperar_senha' => 'usuarios@recuperar_senha',
    'recuperar_senha_2' => 'usuarios@recuperar_senha_2',
    'valida_codigo' => 'usuarios@valida_codigo',
    'salvar_senha' => 'usuarios@salvar_senha',
    'valida_recuperar_senha' => 'usuarios@valida_recuperar_senha',

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
    'excluir_perfil' => 'main@excluir_perfil', 

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

