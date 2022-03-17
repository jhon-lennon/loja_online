<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Admin_model;

class Admin
{
    //====================================================================================================================
    public function index()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/home',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views);
        return;
    }
    public function login()
    {

        if (isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('inicio');
            return;
        }

        $views = [
            'admin/layouts/html_head',
            'admin/login',
            'admin/rodape',
            'admin/layouts/html_footer',

        ];

        Functions::layout_admin($views,);
        return;
    }
    public function login_form()
    {
        if (isset($_SESSION['admin'])) {
            Functions::redirect_admin('inicio');
            return;
        }
        if (!$_POST['text_email']) {
            $_SESSION['erro'] = 'informe o email';
            Functions::redirect_admin('login');
            return;
        }
        if (!isset($_POST['text_senha'])) {
            $_SESSION['erro'] = 'informe a senha';
            Functions::redirect_admin('login');
            return;
        }

        if (!filter_var($_POST['text_email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erro'] = 'formato de email invalido';
            Functions::redirect_admin('login');
            return;
        }
        $usuario = strtolower(trim($_POST['text_email']));
        $senha = trim($_POST['text_senha']);

        $resultad =  new Admin_model();
        $resultado = $resultad->verificar_login($usuario, $senha);

        if ($resultado) {
            $_SESSION['usuario_admin'] = $resultado[0]->email;
            $_SESSION['id_admin'] = $resultado[0]->id_cliente;
            $_SESSION['nome_admin'] = $resultado[0]->nome;
            Functions::redirect_admin('inicio');
            return;
        }

        //===========================================================================================================
        //sair da sessaoo


    }
    public function sair()
    {
        unset($_SESSION['usuario_admin']);
        unset($_SESSION['id_admin']);
        unset($_SESSION['nome_admin']);

        Functions::redirect_admin('login');
        return;
    }
    public function vendas()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->todas_vendas();
        $titulo = "Todas as vendas";



        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];


        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function vendas_aguardando_pagamento()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->vendas('aguardando pagamento');
        $titulo = "Vendas aguardando pagamento";

        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];
        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function vendas_concluidas()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->vendas('concluida');
        $titulo = "Vendas Concluidas";

        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function vendas_enviadas()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->vendas('enviada');
        $titulo = "Vendas enviadas";

        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function vendas_canceladas()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->vendas('cancelada');
        $titulo = "Vendas canceladas";

        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function vendas_em_processamento()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $ven = new Admin_model();
        $agardando_pagamento = count($ven->vendas('aguardando pagamento'));
        $em_processamento =  count($ven->vendas('em processamento'));
        $enviadas = count($ven->vendas('enviada'));
        $vendas = $ven->vendas('em processamento');
        $titulo = "Vendas em processamento";

        $dados = [
            'agardando_pagamento' => $agardando_pagamento,
            'em_processamento' => $em_processamento,
            'vendas' => $vendas,
            'enviadas' => $enviadas,
            'titulo' => $titulo
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/vendas',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }


    public function clientes()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cli = new Admin_model();
        $clientes = $cli->todos_clientes();
        $dados = [
            'clientes' => $clientes,
            'titulo' => 'Todos os clientes'
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/clientes',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function clientes_ativos()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cli = new Admin_model();
        $clientes = $cli->clientes_ativos();
        $dados = [
            'clientes' => $clientes,
            'titulo' => 'Clientes ativos'
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/clientes',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function clientes_inativos()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cli = new Admin_model();
        $clientes = $cli->clientes_inativos();
        $dados = [
            'clientes' => $clientes,
            'titulo' => 'Clientes inativos'
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/clientes',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function clientes_excluidos()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cli = new Admin_model();
        $clientes = $cli->clientes_excluidos();
        $dados = [
            'clientes' => $clientes,
            'titulo' => 'Clientes excluidos'
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/clientes',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    //===================compras==================================================================================================
    public function compra_detalhes()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
        }
        $db = new Admin_model();
        $detalhes = $db->detalhes_compra_cliente();
        $compras = $db->compra();
        $cliente = $db->cliente_detalhe();

        if (empty($detalhes) || empty($compras)) {
            Functions::redirect_admin('vendas');
            return;
        }

        $dados = [
            'cliente' => $cliente[0],
            'compras' => $compras,
            'detalhes' => $detalhes
        ];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/compra_detalhe_cliente',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function produtos()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $pro = new Admin_model();
        $produtos = $pro->todos_produtos();
        $dados = ['produtos' => $produtos];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/produtos',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function cancelar_compra()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }

        $db = new Admin_model();

        $db->cancelar_compra_model();

        $this->compra_detalhes();
        return;
    }

    public function adicionar_codigo_rastreio(){

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $db = new Admin_model();

        $db->add_codigo_rastreio();

        $this->compra_detalhes();
        return;
    }

    public function concluir_compra()
    {

        $db = new Admin_model();
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $db->concluir_compra();

        $this->compra_detalhes();
        return;
    }

    public function cliente_detalhe(){
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
       $dado = new Admin_model();
       $cliente = $dado->cliente_detalhe();
       $compras = $dado->compras_cliente( Functions::desencriptar($_GET['id_cli']));
       $endereco = $dado->buscar_enderecos();
       $dados = ['cliente' => $cliente[0], 'compras' => $compras, 'endereco' => $endereco];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/cliente_detalhe',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    
    public function status_cliente_ativo(){

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cliente = new Admin_model();

        $cliente->ativar_cliente();

        $this->cliente_detalhe();
        return;
    }

    public function status_cliente_inativo(){

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cliente = new Admin_model();

        $cliente->inativar_cliente();

        $this->cliente_detalhe();
        return;
    }

    public function status_cliente_excluido(){

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cliente = new Admin_model();

        $cliente->excluir_cliente();

        $this->cliente_detalhe();
        return;
    }


}
