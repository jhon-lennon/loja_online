<?php

//use core\controladores\Main;

use core\controllers\Admin;

$rotas = [
            'inicio'    =>     'admin@index',
            'login'      =>     'admin@login',
            'login_form' => 'admin@login_form',
            'sair'      => 'admin@sair',
            //produtos
            'produtos' => 'admin@produtos',
            'editar_produto' => 'admin@editar_produto',
            'atualizar_produto_submit' => 'admin@atualizar_produto_submit',

            //vendas  
            'vendas' => 'admin@vendas',
            'vendas_aguardando_pagamento' => 'admin@vendas_aguardando_pagamento',
            'vendas_concluidas' => 'admin@vendas_concluidas',
            'vendas_enviadas' => 'admin@vendas_enviadas',
            'vendas_em_processamento' => 'admin@vendas_em_processamento',
            'vendas_canceladas' => 'admin@vendas_canceladas',
            'adicionar_codigo_rastreio'=> 'admin@adicionar_codigo_rastreio',

            //clientes
            'clientes' => 'admin@clientes',
            'clientes_ativos' => 'admin@clientes_ativos',
            'clientes_inativos' => 'admin@clientes_inativos',
            'clientes_excluidos' => 'admin@clientes_excluidos',
            'cliente_detalhe' => 'admin@cliente_detalhe',
            
            //vendas clientes
            'compra_detalhes' => 'admin@compra_detalhes',
            'cancelar_compra' => 'admin@cancelar_compra',
            'concluir_compra' => 'admin@concluir_compra',

            //alterar status do cliente
            'cliente_ativo' => 'admin@status_cliente_ativo',
            'cliente_inativo' => 'admin@status_cliente_inativo',
            'cliente_excluido' => 'admin@status_cliente_excluido',


            
            
            







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

