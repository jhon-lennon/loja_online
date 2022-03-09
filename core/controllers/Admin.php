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
    public function login(){

        if (isset($_SESSION['admin'])) {
            Functions::redirect_admin('inicio');
            return;
        }

        $views = [
            'admin/layouts/html_head',
            'admin/head',
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

        die($resultad);


      


        if ($resultado) {
            $_SESSION['usuario_admin'] = $resultado[0]->email;
            $_SESSION['id_admin'] = $resultado[0]->id_cliente;
            $_SESSION['nome_admin'] = $resultado[0]->nome;
             Functions::redirect('inicio');
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
        
        Functions::redirect('login');
        return;
    }
}