<?php
namespace core\controllers;

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
        $user->alterar_senha_user($senha);
        echo 1;

       
    }
   
}
