<?php
namespace core\controllers;
use core\classes\Functions;
use core\models\Produtos;

class Carrinho{

    public function carrinho(){
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
   
    $dados = ['carrinho'=> $carrinho, 'produtos' => $produtos];
    
    Functions::layout($views, $dados);
    }

    public function add_carrinho(){
        $car = new Produtos();

       
        $car->adicionar();

    
        Functions::redirect('loja');
        return;

    }

}