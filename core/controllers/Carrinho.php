<?php

namespace core\controllers;

use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Compras;
use core\models\Produtos;
use core\models\Endereco;

class Carrinho
{
    //====================================================================================================================
    public function carrinho()
    {

        if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
            $dados = ['carrinho' => null];
        } else {
            $ids = [];
            foreach ($_SESSION['carrinho'] as $id_p => $quant) {
                array_push($ids, $id_p);
            }
            $ids = implode(",", $ids);

            $produto = new Produtos();
            $produtos = $produto->produtos_ids($ids);


            $dados_tem = [];

            foreach ($produtos as $produto) {
                foreach ($_SESSION['carrinho'] as $car_produto => $quanti) {
                    if ($car_produto == $produto->id_produto) {

                        $id_pro = $produto->id_produto;
                        $nome = $produto->nome;
                        $imagem = $produto->imagem;
                        $preco = $produto->preco;
                        $quantidade = $quanti;
                        $total = $quanti * $preco;

                        array_push(
                            $dados_tem,
                            [
                                'id_pro' => $id_pro,
                                'nome' => $nome,
                                'imagem' => $imagem,
                                'preco' => $preco,
                                'quant' => $quantidade,
                                'total' => $total
                            ]
                        );
                    }
                }
            }
            $total = 0;
            foreach ($dados_tem as $item) {
                $total = $total + $item['total'];
            }
           

            if(isset($_SESSION['usuario'])){
                $end = new Endereco();
                $endereco = $end->buscar_enderecos();
                $dados = ['carrinho' => $dados_tem, 'total' => $total, 'endereco' => $endereco];
            }else{

                $dados = ['carrinho' => $dados_tem, 'total' => $total];
            }
            
        }


        $views = [
            'layouts/html_head',
            'head',
            'carrinho',
            'rodape',
            'layouts/html_footer'

        ];

        // $dados = ['carrinho' => $carrinho, 'produtos' => $produtos];

        Functions::layout($views, $dados);
    }
    //=====================================================================================================================
    public function add_carrinho()
    {
        $car = new Produtos();
        $carrinho = [];

        $produto = $car->adicionar();

        if (empty($produto)) {
            Functions::redirect('loja');
            return;
        }

        $id_p = $produto[0]->id_produto;
        $estoque = $produto[0]->estoque;

        if ($_SESSION['carrinho']) {
            $carrinho = $_SESSION['carrinho'];
        }


        if (!key_exists($id_p, $carrinho)) {
            $carrinho[$id_p] = 1;
            $_SESSION['carrinho'] = $carrinho;
        } else {

            if ($carrinho[$id_p] >= $estoque) {
                Functions::redirect('loja');
                return;
            }
            $cont =  $carrinho[$id_p] + 1;
            $carrinho[$id_p] = $cont;
            $_SESSION['carrinho'] = $carrinho;
        }

        $total = 0;

        foreach ($carrinho as $quantidade) {
            $total = $total + $quantidade;
        }
        
        $_SESSION['total'] = $total;
        if(isset($_GET['retorno'])){
            Functions::redirect('inicio');
        return;
        }

        Functions::redirect('loja');
        return;
    }
    //==================================================================================================================
    public function limpar_carrinho()
    {

        unset($_SESSION['carrinho']);
        unset($_SESSION['total']);
        Functions::redirect('carrinho');
        return;
    }
    //==================================================================================================================
    public function apagar_item_carrinho()
    {

        if (!isset($_GET['id_item'])) {
            Functions::redirect('carrinho');
            return;
        }

        $carrinho = $_SESSION['carrinho'];
        unset($carrinho[$_GET['id_item']]);
        $_SESSION['carrinho'] = $carrinho;

        Functions::redirect('carrinho');
        return;
    }
    //====================================================================================================================
    public function diminuir_item_carrinho()
    {

        if (!isset($_GET['id_item'])) {
            Functions::redirect('carrinho');
            return;
        }

        $carrinho = $_SESSION['carrinho'];
        if ($carrinho[$_GET['id_item']] <= 1) {
            unset($carrinho[$_GET['id_item']]);
            $_SESSION['carrinho'] = $carrinho;

            Functions::redirect('carrinho');
            return;
        }
        $carrinho[$_GET['id_item']] = $carrinho[$_GET['id_item']] - 1;
        $_SESSION['carrinho'] = $carrinho;



        $_SESSION['total'] = $_SESSION['total'] - 1;

        Functions::redirect('carrinho');
        return;
    } //==================================================================================================================
    public function adicionar_item_carrinho()
    {

        if (!isset($_GET['id_p'])) {
            Functions::redirect('carrinho');
            return;
        }


        $car = new Produtos();
        $carrinho = [];

        $produto = $car->adicionar();

        if (empty($produto)) {
            Functions::redirect('carrinho');
            return;
        }

        $id_p = $produto[0]->id_produto;
        $estoque = $produto[0]->estoque;

        if ($_SESSION['carrinho']) {
            $carrinho = $_SESSION['carrinho'];
        }


        if (!key_exists($id_p, $carrinho)) {
            $carrinho[$id_p] = 1;
            $_SESSION['carrinho'] = $carrinho;
        } else {

            if ($carrinho[$id_p] >= $estoque) {
                Functions::redirect('carrinho');
                return;
            }
            $cont =  $carrinho[$id_p] + 1;
            $carrinho[$id_p] = $cont;
            $_SESSION['carrinho'] = $carrinho;
        }

        $total = 0;

        foreach ($carrinho as $quantidade) {
            $total = $total + $quantidade;
        }
        $_SESSION['total'] = $total;

        Functions::redirect('carrinho');
        return;
    }
    //======================================================================================================================
    public function continuar_compra()
    {
        if (!isset($_SESSION['usuario'])) {
            $_SESSION['dados_temp'] = true;
            Functions::redirect('login_carrinho');
            return;
        }

        if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
            $dados = ['carrinho' => null];
            Functions::redirect('carrinho');
            return;

        } else {
            $ids = [];
            foreach ($_SESSION['carrinho'] as $id_p => $quant) {
                array_push($ids, $id_p);
            }
            $ids = implode(",", $ids);

            $produto = new Produtos();
            $produtos = $produto->produtos_ids($ids);


            $dados_tem = [];

            foreach ($produtos as $produto) {
                foreach ($_SESSION['carrinho'] as $car_produto => $quanti) {
                    if ($car_produto == $produto->id_produto) {

                        $id_pro = $produto->id_produto;
                        $nome = $produto->nome;
                        $imagem = $produto->imagem;
                        $preco = $produto->preco;
                        $quantidade = $quanti;
                        $total = $quanti * $preco;

                        array_push(
                            $dados_tem,
                            [
                                'id_pro' => $id_pro,
                                'nome' => $nome,
                                'imagem' => $imagem,
                                'preco' => $preco,
                                'quant' => $quantidade,
                                'total' => $total
                            ]
                        );
                    }
                }
            }
            $total = 0;
            foreach ($dados_tem as $item) {
                $total = $total + $item['total'];
            }
            $end = new Endereco();
            $endereco = $end->buscar_enderecos_resumo();

            unset($_SESSION['id_endere']);

            $_SESSION['endereco'] = $endereco[0];
            $_SESSION['pagamento'] = $_POST['pagamento'];

            $dados = ['carrinho' => $dados_tem, 'total' => $total, 'endereco' => $endereco];
        }

        //ficar ativa ate finalizar compra para nao registrar 2 vezes
        $_SESSION['andamento'] = true;

        $views = [
            'layouts/html_head',
            'head',
            'resumo_compra',
            'rodape',
            'layouts/html_footer'

        ];

        // $dados = ['carrinho' => $carrinho, 'produtos' => $produtos];

        Functions::layout($views, $dados);
    }
    //===============================================================================================================
    public function finalizar_compra()
    {

        if(!isset($_SESSION['andamento'])){
            Functions::redirect('loja');
            return;
        }


        if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
            Functions::redirect('loja');
        } else {
            $ids = [];
            foreach ($_SESSION['carrinho'] as $id_p => $quant) {
                array_push($ids, $id_p);
            }
            $ids = implode(",", $ids);

            $produto = new Produtos();
            $produtos = $produto->produtos_ids($ids);


            $dados_temp = [];

            foreach ($produtos as $produto) {
                foreach ($_SESSION['carrinho'] as $car_produto => $quanti) {
                    if ($car_produto == $produto->id_produto) {


                        $nome = $produto->nome;
                        $preco = $produto->preco;
                        $quantidade = $quanti;
                        $total = $quanti * $preco;

                        array_push(
                            $dados_temp,
                            [

                                'nome' => $nome,
                                'preço' => $preco,
                                'quantidade' => $quantidade,
                                'total' => $total
                            ]
                        );
                    }
                }
            }
            $total = 0;
            foreach ($dados_temp as $item) {
                $total = $total + $item['total'];
            }
            $_SESSION['total_valor'] = $total;
        }
        $codigo_compra = "BR".random_int(11111111,99999999);
        
        $dados = ['produtos' => $dados_temp , 'codigo_compra' => $codigo_compra];
        
        $registrar_compra = new Compras();
        $registrar_compra->registrar_compra($codigo_compra);

        $registrar = new Compras();

        $registrar->registrar_itens($dados_temp, $codigo_compra);

        $mail = new EnviarEmail();
        $email = $mail->enviar_resumo($codigo_compra);
        if($email == false){
            die('erro email');
        }

       unset($_SESSION['carrinho']);
       unset($_SESSION['total']);
       unset($_SESSION['andamento']);


        $views = [
            'layouts/html_head',
            'head',
            'pag_final_compra',
            'rodape',
            'layouts/html_footer'

        ];

        Functions::layout($views, $dados);
        return;
      
    }
}
