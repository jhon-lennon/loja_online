<?php

namespace core\controllers;

use com_exception;
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



    public function perfil()
    {

     

        $views = [
            'layout/head',
            'cabecario',
            'perfil',
            'layout/footer',
        ];
        

        Functions::layout($views);
    }
    //=====================================================================================================================
    //view loja
    public function login()
    {

     

        $views = [
            'layout/head',
            'cabecario',
            'login',
            'layout/footer',
        ];
        

        Functions::layout($views);
    }
    public function cadastro()
    {

     

        $views = [
            'layout/head',
            'cabecario',
            'cadastre_se',
            'layout/footer',
        ];
        

        Functions::layout($views);
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

    public function form_cadastro(){
       
        $usuario = new comentarios();
 $erro =[];
        $res = $usuario->verificar_usuario($_POST['text_email']);
        
        if($res > 0){
            
           echo "Email ja cadastrado, ";
           die;
        }
       
       

        if(!isset($_POST['text_nome'])){
            array_push($erro, 'Erro metodo');
        }

        if(!filter_var($_POST['text_email'], FILTER_VALIDATE_EMAIL)){
            array_push($erro, 'Email invalido');
        }

        if($_POST['text_senha'] != $_POST['text_confirma_senha']){
            array_push($erro,'Senha e confirmar senha deve ser iguais');
        }

        if(strlen($_POST['text_senha']) < 8){
            array_push($erro,'A senha deve ter no minimo 8 caracteres');
        }
        if(strlen($_POST['text_nome']) < 5){
            array_push($erro, 'O nome deve ter no minimo 5 caracteres');
        }

        if(!empty($erro)){

             foreach($erro as $e){
           echo  $e.','; 
        }
         
        }else{
          echo true;
        }

      
        
        
        
       // $r = json_encode($erros);

        //echo $r; 



        //$u = new comentarios();
        //$u->cadastrar_usuario();



    }

    
}
