<?php

use core\controladores\Main;

use core\controllers\Admin;

$rotas = [
            'inicio'    =>     'admin@inicio',
            'login'      =>     'admin@login',
            'form_login_admin' => 'admin@form_login_admin',
            'ver_evento' => 'main@ver_evento',

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

