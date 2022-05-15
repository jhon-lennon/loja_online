<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Usuario_model{
   
    public function remove_todas_presenca_usuario(){
        $db= new Database();
        $paramentros = [':id_u' => $_SESSION['id_usuario']];
        $db->delete('DELETE FROM presenca WHERE id_usuario = :id_u',$paramentros);
        return true;
    }

    public function remove_todos_comentarios_usuario(){
        $db= new Database();
        $paramentros = [':id_u' => $_SESSION['id_usuario']];
        $db->delete('DELETE FROM comentarios WHERE id_usuario = :id_u',$paramentros);
        return true;
    }
    public function excluir_usuario(){
        $db= new Database();
        $paramentros = [':id_u' => $_SESSION['id_usuario']];
        $db->delete('DELETE FROM usuarios WHERE id_usuario = :id_u',$paramentros);
        return true;
    }
    public function verificar_usuario($email)
    {
        $db = new Database();
        $parametro = [':email' => $email];
        $usuario = $db->select('SELECT * FROM usuarios WHERE email = :email', $parametro);
        return $usuario;
    }

    public function atualizar_user_sem_foto($email, $nome,)
    {

        $db = new Database();

        $parametros = [':id_u' => $_SESSION['id_usuario'], ':e' => $email, ':n' => $nome];

        $db->update("UPDATE usuarios SET email = :e, nome = :n,  updated_at= NOW() WHERE id_usuario = :id_u", $parametros);
        return true;
    }

    public function atualizar_user_com_foto($email, $nome, $foto)
    {
        $db = new Database();

        $parametros = [':id_u' => $_SESSION['id_usuario'], ':e' => $email, ':n' => $nome, ':f' => $foto];

        $db->update("UPDATE usuarios SET email = :e, nome = :n, foto = :f, updated_at= NOW() WHERE id_usuario = :id_u", $parametros);
        return true;
    }



}