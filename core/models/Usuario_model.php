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



}