<?php

//use core\controladores\Main;

$rotas = [
            'inicio'    =>     'main@index',
            'loja'      =>     'main@loja',
            'loja_categoria' => 'main@loja_categoria',
            'buscar' => 'main@buscar',
            //criar conta=================================================
            'criar_conta' =>    'main@criar_conta',
            'cadastrar_conta' => 'main@cadastrar_conta',
            'verificar_email' =>'main@verificar_email',
            //login========================================================
            'login'           => 'main@login',
            'login_form'           => 'main@login_form',
            'sair'             => 'main@sair',
            //carrinho=======================================================
            'carrinho'  =>     'carrinho@carrinho',
            'add_carrinho' => 'carrinho@add_carrinho',
            'limpar_carrinho' => 'carrinho@limpar_carrinho',
            'apagar_item_carrinho' =>'carrinho@apagar_item_carrinho',
            'diminuir_item_carrinho' =>'carrinho@diminuir_item_carrinho',
            'adicionar_item_carrinho' =>'carrinho@adicionar_item_carrinho',
            //===============================================================
            'continuar_compra' => 'carrinho@continuar_compra',
            'resumo_compra' => 'carrinho@resumo_compra',
            'login_carrinho' => 'main@login_carrinho',
            'finalizar_compra' => 'carrinho@finalizar_compra',
            'simular_pagamento' => 'perfil@simular_pagamento',
            //==========================================================
            'editar_endereco' => 'main@editar_endereco',
            'endereco_form' => 'main@endereco_form',
            'minha_conta' => 'main@minha_conta',
            'editar_endereco_form' => 'main@editar_endereco_form',
            'minhas_compras' => 'perfil@minhas_compras',
            'compra_detalhes' => 'perfil@compra_detalhes',
            'excluir_endereco' => 'main@excluir_endereco',
            'alterar_senha' => 'perfil@alterar_senha',
            'alterar_senha_form' => 'perfil@alterar_senha_form',
            'alterar_dados' => 'perfil@alterar_dados',
            'alterar_dados_form' => 'perfil@alterar_dados_form',
            'esqueci_senha' => 'perfil@esqueci_senha',
            'esqueci_senha_form' => 'perfil@esqueci_senha_form',
            'recuperar_senha_form' => 'perfil@recuperar_senha_form',

            
            
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

