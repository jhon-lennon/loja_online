<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Produtos;

class Carrinho
{

    public function carrinho()
    {
        $car = new Produtos();

        $carrinho = $car->carrinho();

        $produtos = $car->produtos_disponiveis();


        $views = [
            'layouts/html_head',
            'head',
            'carrinho',
            'rodape',
            'layouts/html_footer'

        ];

        $dados = ['carrinho' => $carrinho, 'produtos' => $produtos];

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
