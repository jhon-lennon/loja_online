<?php
namespace core\controllers;

use core\classes\Email_codigo;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Comentarios;
use core\models\Eventos_model;
use core\models\Presenca_model;
use core\models\Usuario_model;

class Usuarios{

    public function form_edit_perfil(){

        if (!Functions::check_session()) {
            Functions::redirect('inicio');
            return;
        }
        $user = new Usuario_model();
        $res= $user->verificar_usuario($_SESSION['usuario_email']); 

        $email = $_POST['email'];
        
        if($_SESSION['usuario_email'] != $email ){
            $usuario = $user->verificar_usuario($_POST['email']); 
            
            if(count($usuario) > 0){
                echo "Esse email ja está em uso";
                die;
                return;
            }
        }

        if(strlen($_POST['nome']) < 5){
            echo "O nome deve ter no minimo 5 caracteres";
            die;
            return;
        }



        $img = null;
        if ($_FILES['foto']['error'] == 0) {

            if ($_FILES['foto']['type'] == 'image/jpeg' || $_FILES['foto']['type'] == 'image/png' || $_FILES['foto']['type'] == 'image/jpg') {

                $img = $_SESSION['id_usuario'].'.jpeg';
                move_uploaded_file($_FILES['foto']['tmp_name'], '../core/resources/images/usuarios/' . $img);
              
    
            }else{
                echo "Imagen invalida";
                die;
                return;
               
            }

        }



        
        if (!password_verify($_POST['senha'], $res[0]->senha)) {
            echo "Senha invalida ";
            die;
            return;
        }

        if ($img == null){
           $user->atualizar_user_sem_foto($email, $_POST['nome']);

        } else{
            $user->atualizar_user_com_foto($email, $_POST['nome'],$img);
          
        }
        $usuario_atualizado = $user->verificar_usuario($email); 
        
        $_SESSION['usuario_email'] = $usuario_atualizado[0]->email;
        $_SESSION['usuario_nome'] = $usuario_atualizado[0]->nome;
        $_SESSION['id_usuario'] = $usuario_atualizado[0]->id_usuario;
        $_SESSION['usuario_foto'] = $usuario_atualizado[0]->foto;
        
        echo 1;

    }
    public function alterar_senha(){

        $ns = $_POST['nova_senha'];
       $rns = $_POST['repete_nova_senha'];
      $sa =  $_POST['senha_atual'];

        if(strlen($ns) < 8){
            echo 'Nova senha ter no minimo 8 caracteres';
            die;
            return;
        }
        if($ns != $rns){
            echo 'Nova senha e repetir nova senha devem ser iguais';
            die;
            return;
        }
        if(strlen($sa) < 1){
            echo 'Informe sua senha';
            die;
            return;
        }

        $user = new Usuario_model();
        $res= $user->verificar_usuario($_SESSION['usuario_email']); 
        if (!password_verify($sa, $res[0]->senha)) {
            echo "Senha invalida ";
            die;
            return;
        }
        $senha = password_hash($ns, PASSWORD_DEFAULT);
        $user->alterar_senha_user( $_SESSION['id_usuario'],$senha);
        echo 1;

       
    }
    public function recuperar_senha(){

        if (Functions::check_session()) {
            Functions::redirect('inicio');
            return;
        }

        $views = [
            'layout/head',
            'cabecario',
            'recuperar_senha',
            'layout/footer',
        ];

        Functions::layout($views);
    }
    public function valida_recuperar_senha(){
        if (Functions::check_session()) {
            echo 0;
            return;
            die;
        }
        $user = new Usuario_model();
        $res= $user->verificar_usuario($_POST['email']); 
        if (count($res) != 1){
            echo 2;
            return;
            die;
        }else{
            $_SESSION['codigo'] = random_int(1111, 9999);
           
            $cod = new Email_codigo();
            $cod->email_codigo($_POST['email'], $res[0]->nome);
            $_SESSION['email_recupera'] = $_POST['email'];
            echo 1;
        }
    }
    public function recuperar_senha_2(){

        if (Functions::check_session()) {
            Functions::redirect('inicio');
            return;
            
        }
      
        $views = [
            'layout/head',
            'cabecario',
            'recuperar_senha_2',
            'layout/footer',
        ];

        Functions::layout($views);
    }

    public function valida_codigo(){

        if($_SESSION['codigo'] == $_POST['codigo']){
            echo 1;
            die;
        }else{
            echo 2;
            die;
        }
        
    }
    public function salvar_senha(){
       
        if (Functions::check_session()) {
            echo 0;
            return;
            die;
        }

        if(strlen($_POST['nova_senha']) < 8){
            echo 3;
            return;

            die;
        }elseif($_POST['nova_senha'] != $_POST['repete_senha']){
            echo 2;
            return;

            die;
        }else{
            $user = new Usuario_model();
            $senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
            $user->recuperar_senha_user( $_SESSION['email_recupera'] ,$senha);
            unset($_SESSION['email_recupera']);
            unset($_SESSION['codigo']);
            $_SESSION['mensagem'] = 'Senha recuperada. Entre.';
            
            echo 1;
            return;
            die;
        }

        
    }
   
}
