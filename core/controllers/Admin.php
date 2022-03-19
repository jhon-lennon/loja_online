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
        $categorias = $pro->todas_categorias();
        $dados = ['produtos' => $produtos, 'categorias' => $categorias];

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

    public function buscar_produtos()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $pro = new Admin_model();
        $produtos = $pro->busca();
        $quant_resultado = count($produtos);
        $categorias = $pro->todas_categorias();
        $dados = ['produtos' => $produtos, 'categorias' => $categorias, 'quantidade' => $quant_resultado];

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
    public function produtos_categoria()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $categoria = $_GET['c'];
        $db = new Admin_model();
        $pro_categoria = $db->produtos_categoria($categoria);

        $categorias = $db->todas_categorias();
        $dados = ['produtos' => $pro_categoria, 'categorias' => $categorias];

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
    public function produtos_disponiveis()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $pro = new Admin_model();
        $produtos = $pro->produtos_disponivel();
        $categorias = $pro->todas_categorias();
        $dados = ['produtos' => $produtos, 'categorias' => $categorias];

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

    public function produtos_indisponiveis()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $pro = new Admin_model();
        $produtos = $pro->produtos_indisponivel();
        $categorias = $pro->todas_categorias();
        $dados = ['produtos' => $produtos, 'categorias' => $categorias];

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

    public function filtro_quantidade(){
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
       
        $pro = new Admin_model();
        $produtos = $pro->produtos_filtro_quantidade();
        $categorias = $pro->todas_categorias();
        $dados = ['produtos' => $produtos, 'categorias' => $categorias];

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


    public function editar_produto()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $pro = new Admin_model();
        $produto = $pro->produto();
        $dados = ['produto' => $produto[0]];

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/editar_produto',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views, $dados);
        return;
    }

    public function atualizar_produto_submit()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }


        if ($_FILES['foto']['error'] == 0) {

            if ($_FILES['foto']['type'] == 'image/jpeg') {


                $nome_foto = Functions::desencriptar($_GET['id_pro']) . '.jpeg';
                $atualizar = new Admin_model();
                $atualizar->atualizar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $this->editar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/png') {

                $nome_foto = Functions::desencriptar($_GET['id_pro']) . '.jpeg';

                $atualizar = new Admin_model();
                $atualizar->atualizar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $this->editar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/jpg') {

                $nome_foto = Functions::desencriptar($_GET['id_pro']) . '.jpeg';

                $atualizar = new Admin_model();
                $atualizar->atualizar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $this->editar_produto();
                return;
            } else {
                $_SESSION['erro'] = 'A imagem deve ser do tipo JPG, JPEG ou PNG';
                $this->editar_produto();
                return;
            }
        } else {

            $atualizar = new Admin_model();
            $atualizar->atualizar_produto_sem_imagem();
            $this->editar_produto();
            return;
        }
    }

    public function adicionar_produto()
    {


        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/adicionar_produto',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];

        Functions::layout_admin($views);
        return;
    }
    //=======================================================================================================================
    public function adicionar_produto_submit()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        if (empty($_POST['nome']) || empty($_POST['desc']) || empty($_POST['preco']) || empty($_POST['quant']) || empty($_POST['categ'])) {
            $_SESSION['erro'] = 'Preencha todos os campos';
            $this->adicionar_produto();
            return;
        }


        if ($_FILES['foto']['error'] == 0) {

            if ($_FILES['foto']['type'] == 'image/jpeg') {


                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';
                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/png') {

                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';

                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/jpg') {

                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';

                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } else {
                $_SESSION['erro'] = 'A imagem deve ser do tipo JPG, JPEG ou PNG';
                $this->adicionar_produto();
                return;
            }
        } else {

            $atualizar = new Admin_model();

            $atualizar->adicionar_produto('sem_imagem.jpg');
            $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
            $this->adicionar_produto();
            return;
        }
    }
    
    public function excluir_produto(){
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }

        $db = new Admin_model();

        $db->excluir_produto();

        $this->produtos();
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

    public function adicionar_codigo_rastreio()
    {

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

    public function cliente_detalhe()
    {
        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $dado = new Admin_model();
        $cliente = $dado->cliente_detalhe();
        $compras = $dado->compras_cliente(Functions::desencriptar($_GET['id_cli']));
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


    public function status_cliente_ativo()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cliente = new Admin_model();

        $cliente->ativar_cliente();

        $this->cliente_detalhe();
        return;
    }

    public function status_cliente_inativo()
    {

        if (!isset($_SESSION['usuario_admin'])) {
            Functions::redirect_admin('login');
            return;
        }
        $cliente = new Admin_model();

        $cliente->inativar_cliente();

        $this->cliente_detalhe();
        return;
    }

    public function status_cliente_excluido()
    {

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
