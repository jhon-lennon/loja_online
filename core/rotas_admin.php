<?php

//use core\controladores\Main;

use core\controllers\Admin;

$rotas = [
            'inicio'    =>     'admin@index',
            'login'      =>     'admin@login',
            'login_form' => 'admin@login_form',
            'sair'      => 'admin@sair',
            'vendas' => 'admin@vendas',
            'produtos' => 'admin@produtos',
            'clientes' => 'admin@clientes',  
            'vendas_aguardando_pagamento' => 'admin@vendas_aguardando_pagamento',
            'vendas_concluidas' => 'admin@vendas_concluidas',
            'vendas_enviadas' => 'admin@vendas_enviadas',
            'vendas_em_processamento' => 'admin@vendas_em_processamento',
            'clientes_ativos' => 'admin@clientes_ativos',
            'clientes_inativos' => 'admin@clientes_inativos',
            'clientes_excluidos' => 'admin@clientes_excluidos',






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

