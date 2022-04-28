<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Comentarios;
use core\models\Endereco;
use core\models\Produtos;

class Main
{



    public function index()
    {


        $views = [
            'layout/head',
            'cabecario',
            'home',
            'layout/footer',
        ];

        Functions::layout($views);
    }
    //=====================================================================================================================
    //view loja
    public function loja()
    {

        $produtos = new Produtos();
        $resultado = $produtos->produtos_disponiveis();
        $categorias = $produtos->categoria();


        $views = [
            'layouts/html_head',
            'head',
            'loja',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['produtos' => $resultado, 'categorias' => $categorias];

        Functions::layout($views, $dado);
    }


    public function ver_evento()
    {

        $views = [


            'mostrar_evento',

        ];


        Functions::layout($views);
    }

    public function comentarios()
    {
        $comentarios = new comentarios();
        $comentario = $comentarios->post_comentarios();

        $comentario = json_encode($comentario);
        echo $comentario;

       die;
    }

    //=====================================================================================================================
    //view login
    public function get_comentarios()
    {
            $comentarios = new Comentarios();
         $res = json_encode( $comentarios->get_comentario());
          echo $res; 
        
          return;
    }

    //=====================================================================================================================
    //view criar conta
    public function get_comentario()
    {   
        
        $comentarios = new Comentarios();
         $res = json_encode( $comentarios->get_comentario($_GET['id_comentario']));
          echo $res; 
         
    }
       
    

    //========================================================================================================================
    //cadastro de usuario
    public function atualizar_comentario()
    {
       $comentario = new comentarios();
        $comentario->editar_comentario();
       $res = $comentario->get_comentario($_POST['id_comentario']);
        $res = json_encode($res);
        echo $res;

    }

    
}
