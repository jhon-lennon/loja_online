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

        if (isset($_SESSION['admin'])) {
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
            echo 0;
            return;
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
      unset($_SESSION['admin']);
   
      Functions::redirect_admin('login');
            return;
  }
  public function erro()
  {
      $views = [
          'admin/layout/head',
          'admin/erro',
          'admin/layout/footer',

      ];

      Functions::layout_admin($views,);
      return;
  }
  public function get_cidades(){
    if(!Functions::isAjax()){
        Functions::redirect_admin('erro');
        return;
    }
    $city = new Admin_model();
    $cidades = $city->cidades();
    $cidades = json_encode($cidades);
    echo $cidades;
    }
    public function buscar_usuario(){
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }
        $user = new Admin_model();
        $usuario = $user->get_usuario($_POST['email_usuario']);
        if(count($usuario) == 1){
            $res_user = [];

            $res_user['id_u'] = $usuario[0]->id_usuario;
            $res_user['nome'] = $usuario[0]->nome;
            $res_user['email'] = $usuario[0]->email;
            $res_user['foto'] = $usuario[0]->foto;

            if($usuario[0]->produtor != 1){
            $res_user['produtor'] = 0;
            }else{
            $res_user['produtor'] = 1;
            }

           if( $usuario[0]->updated_at != null){
                $res_user['atualizado'] = date('d/m/Y',strtotime($usuario[0]->updated_at));
           }else{
            $res_user['atualizado'] = 0;
           }
           $res_user['cadastrado'] = date('d/m/Y',strtotime( $usuario[0]->created_at));
           





            $usuari = json_encode($res_user);
            echo $usuari;
            return;
        }else{
            echo 0;
            return;
        }
    }

    public function excluir_usuario(){
        
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }

        $user = new Admin_model();
        $user->excluir_usuario($_POST['id_usuario']);
        echo 1;
    }

    public function add_produtor(){
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }
        $user = new Admin_model();
        $user->adiciona_produtor($_POST['id_usuario']);
        
        $emal = $user->get_email_usuario($_POST['id_usuario']);
         echo $emal[0]->email;
        
    }

    public function remover_produtor(){
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }
        $user = new Admin_model();
        $user->remove_produtor($_POST['id_usuario']);
        $emal = $user->get_email_usuario($_POST['id_usuario']);
         echo $emal[0]->email;
    }

    public function eventos_usuario(){
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }
        $user = new Admin_model();
        $eventos = $user->eventos_do_produtor($_POST['id_usuario']);
        if(count($eventos) > 0){
          $ev = json_encode($eventos);
        echo $ev;   
        }else{
            echo 0;
        }
       
        
    }
}
