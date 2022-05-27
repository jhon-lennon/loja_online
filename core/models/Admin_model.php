<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Admin_model
{
    public function get_usuario($email)
    {
        $db = new Database();
        $parametro = [':email' => $email];
        $usuario = $db->select('SELECT * FROM usuarios WHERE email = :email', $parametro);
        return $usuario;
    }
    public function get_email_usuario($id)
    {
        $db = new Database();
        $parametro = [':id' => $id];
        $usuario = $db->select('SELECT email FROM usuarios WHERE id_usuario = :id', $parametro);
        return $usuario;
    }

    public function verificar_login($us, $senha)
    {

        //verificar se o wmail ja esta cadastrado
        $parametros = [
            ':u' => $us
        ];

        $db = new Database();
        $usuario = $db->select("SELECT * FROM user_admin WHERE user_admin = :u", $parametros);
        if (count($usuario) != 1) {

            return false;
        } elseif (!password_verify($senha, $usuario[0]->senha_admin)) {


            return false;
        } else {
            return $usuario;
        }
    }
    public function cidades()
    {

        $db = new Database();
        $comentario = $db->select("SELECT * FROM cidades");
        return $comentario;
    }
    public function excluir_usuario($id_u)
    {
        $db = new Database();
        $paramentros = [':id_u' => $id_u];
        $db->delete('DELETE FROM usuarios WHERE id_usuario = :id_u', $paramentros);
        return true;
    }
    public function adiciona_produtor($id_u)
    {
        $db = new Database();

        $parametros = [':id_u' => $id_u];

        $db->update("UPDATE usuarios SET produtor = 1 , updated_at = NOW() WHERE id_usuario = :id_u", $parametros);
        return true;
    }

    public function remove_produtor($id_u)
    {
        $db = new Database();

        $parametros = [':id_u' => $id_u];

        $db->update("UPDATE usuarios SET produtor = 0 , updated_at = NOW() WHERE id_usuario = :id_u", $parametros);
        return true;
    }

    public function eventos_do_produtor($id_u)
    {
        $db = new Database();

        $parametros = [':id_u' => $id_u];
        $eventos = $db->select('SELECT * FROM eventos WHERE id_usuario = :id_u', $parametros);
        return $eventos;
    }
    public function delete_tudo_de_usuario($id_evento){
        $db = new Database();
        $paramentros = [':id_e' => $id_evento];
        $db->delete('DELETE FROM presenca WHERE id_evento = :id_e', $paramentros);
        $db->delete('DELETE FROM comentarios WHERE id_evento = :id_e', $paramentros);
        $db->delete('DELETE FROM eventos WHERE id_evento = :id_e', $paramentros);
        
        $res = $db->select('SELECT * FROM eventos WHERE id_evento = :id_e', $paramentros);

        if(count($res) > 0){
            return false;
        }else{
            return true;
        }
       
    }
}
