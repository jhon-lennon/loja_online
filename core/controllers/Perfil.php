<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Clientes;
use core\models\Compras;
use core\models\Endereco;
use core\models\Produtos;

class Perfil
{

    public function minhas_compras()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
        }
        $compra = new Compras();
        $compras = $compra->minhas_compras();


        $views = [
            'layouts/html_head',
            'head',
            'minhas_compras',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['compras' => $compras];

        Functions::layout($views,$dado);
    }
    
    public function compra_detalhes()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
        }
        $db= new Compras();
        $detalhes = $db->compra_detalhes();

        $compras = $db->compras();


        $views = [
            'layouts/html_head',
            'head',
            'compra',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['compras' => $compras, 'detalhes' => $detalhes];

        Functions::layout($views,$dado);
    }



}
