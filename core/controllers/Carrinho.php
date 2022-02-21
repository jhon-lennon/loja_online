<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Produtos;

class Carrinho
{

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
                        $quantidade = $quant;
                        $total = $quant * $preco;

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
            foreach ($dados_tem as $item){
                $total = $total + $item['total'];
            }

           // array_push($dados_tem, ['total' => $total]);

//echo"<pre>";
          //  print_r($dados_tem);
            $dados = ['carrinho' =>$dados_tem, 'total' => $total];
          //  die;

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

        Functions::redirect('loja');
        return;
    }
    public function limpar_carrinho()
    {

        unset($_SESSION['carrinho']);
        unset($_SESSION['total']);
        Functions::redirect('carrinho');
        return;
    }
}
