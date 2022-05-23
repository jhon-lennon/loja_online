<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Admin_model;

class Admin
{
    //====================================================================================================================
    public function inicio(){
    

        if (!isset($_SESSION['admin'])) {
            Functions::redirect_admin('login');
            return;
        }
      
        
            $views = [
                'admin/layout/head',
                'admin/cabecario',
                'admin/inicio',
                'admin/layout/footer',
    
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
            'admin/layout/head',
            'admin/login',
            'admin/layout/footer',

        ];

        Functions::layout_admin($views,);
        return;
    }
    public function form_login_admin()
    {
        
        if (isset($_SESSION['admin'])) {
           // echo 0;
          //  return;
        }
        if (empty( $_POST['text_user']) || empty( $_POST['text_senha'])) {
            echo 0;
            return;
        }
     
    

        $usuario = $_POST['text_user'];
        $senha = trim($_POST['text_senha']);

        $resultad =  new Admin_model();
        $resultado = $resultad->verificar_login($usuario, $senha);

        
        if ($resultado == false) {
            echo 0;
            return;
        }else{
            $_SESSION['admin'] = $resultado[0]->user_admin;
            echo 1;
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
   
 
}
