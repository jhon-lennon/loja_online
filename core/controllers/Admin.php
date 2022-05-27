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
        $eventos = $user->eventos_do_produtor($_GET['id_u']);
        if(count($eventos) > 0){
          $ev = json_encode($eventos);
        echo $ev;   
        }else{
            echo 0;
        }

    }
    public function eventos_usuario_count(){
        if(!Functions::isAjax()){
            Functions::redirect_admin('erro');
            return;
        }
        $user = new Admin_model();
        $eventos = $user->eventos_do_produtor($_POST['id_usuario']);
        if(count($eventos) > 0){
          
        echo 1;   
        }else{
            echo 0;
        }

    }
    public function eventos_do_usuario(){
        if (!isset($_SESSION['admin'])) {
            Functions::redirect_admin('inicio');
            return;
        }

        $db = new Admin_model();
        $eventos = $db->eventos_do_produtor($_GET['id_u']);
        // print_r($eventos);

        $resultado_com_filtro = [];

        foreach ($eventos as $evento) {
         
            $vh = 'Gratis';
            $vm = 'Gratis';


            if ($evento->valor_homem > 0) {
                $vh = $evento->valor_homem . ' R$';
            }
            if ($evento->valor_mulher > 0) {
                $vm = $evento->valor_mulher . ' R$';
            }

            $hi = date('H:i',  strtotime($evento->data_inicio));
            $hf = date('H:i',  strtotime($evento->data_fim));
            $di = date('d/m/y',  strtotime($evento->data_inicio));
            $df = date('d/m/y',  strtotime($evento->data_fim));



            $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];

            $dia_sem_num_i = date('w', strtotime($evento->data_inicio));
            $dia_sem_num_f = date('w', strtotime($evento->data_fim));


            $nome_dia_i =  $dias[$dia_sem_num_i];
            $nome_dia_f =  $dias[$dia_sem_num_f];


            $text_dia = '';

            if ($di ==  $df) {
                $text_dia = 'Dia ' . $di . ' ' . $nome_dia_i;
            } else {
                $text_dia = 'Dia ' . $di . ' ' . $nome_dia_i . ' à ' . $df . ' ' . $nome_dia_f;
            }

            $res = [
                'id_evento' => $evento->id_evento,
                'id_usuario' => $evento->id_usuario,
                'titulo' => substr($evento->titulo_evento, 0, 25),
                'descricao' => substr($evento->descricao, 0, 60) . '...',
                'valor_homem' => $vh,
                'valor_mulher' => $vm,
                'local' => substr($evento->local, 0, 28),
                'cidade' => $evento->cidade,
                'imagem' => $evento->imagem,
                'horario' => $hi . ' as ' . $hf,
                'data' => $text_dia,
                
                'endereco' => $evento->endereco,

            ];


            array_push($resultado_com_filtro, $res);
        }



        $dados = ['eventos' => $resultado_com_filtro];
        $views = [
            'admin/layout/head',
            'admin/cabecario',
            'admin/eventos_usuario',
            'admin/layout/footer',

        ];

        Functions::layout_admin($views, $dados);
        return;
    }
    public function delete_usuario(){

        $usu = new Admin_model();
        $usuario = $usu->delete_tudo_de_usuario($_POST['id_evento']);
        if($usuario == true){
            echo 1;
        }else{
            echo 0;
        }
    }
}
