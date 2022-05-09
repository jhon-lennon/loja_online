<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Comentarios
{

    public function post_comentarios()
    {

        $db = new Database();
        $parametro = [':id' => 0, ':com' => $_POST['comentario'], ':c' => null, ':u' => null, ':id_e' => $_POST['id_evento'], ':id_u' => $_SESSION['id_usuario']];
        $db->insert('INSERT INTO comentarios VALUES  ( :id, :id_e, :id_u, :com ,:c, :u)', $parametro);
        $param = [':id_e' => $_POST['id_evento']];

        $comentarios = $db->select("SELECT comentarios.* , usuarios.nome ,usuarios.foto  FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario AND comentarios.id_evento = :id_e ORDER BY id DESC", $param);

        return $comentarios;
    }

    //SELECT comentarios.* , usuarios.nome ,usuarios.email  FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario

    public function get_comentario($id)
    {

        $db = new Database();
        $parametros = [':id' => $id];

        $comentario = $db->select("SELECT comentarios.* , usuarios.nome ,usuarios.foto  FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario AND comentarios.id = :id ", $parametros);
        return $comentario;
    }


    public function get_comentarios($id_evento)
    {
        $db = new Database();
        $parametros = [':id_e' => $id_evento];
        $comentarios = $db->select("SELECT comentarios.* , usuarios.nome ,usuarios.foto  FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario AND comentarios.id_evento = :id_e ORDER BY id DESC", $parametros);

        return $comentarios;
    }



    public function editar_comentario()
    {

        $db = new Database();

        $parametros = [':id_c' => $_POST['id_comentario'], ':c' => $_POST['comentario']];

        $db->update("UPDATE comentarios SET  comentario = :c, updated_at= NOW() WHERE id = :id_c", $parametros);
        return true;
    }


    public function cadastrar_usuario()
    {

        $parametros = [
            ':n'  => $_POST['text_nome'],
            ':e' => $_POST['text_email'],
            ':s'  => password_hash($_POST['text_senha'], PASSWORD_DEFAULT)

        ];

        $db = new Database();

        $db->insert('INSERT INTO usuarios VALUES (0, :n, :e, :s, null, NOW(), NULL)', $parametros);
    }

    public function verificar_usuario($email)
    {
        $db = new Database();
        $parametro = [':email' => $email];
        $usuario = $db->select('SELECT * FROM usuarios WHERE email = :email', $parametro);
        return $usuario;
    }

    public function n_comentario(){

        $db = new Database();
        $parametros = [':id_c' => $_POST['id_comentario']];
        $comentarios = $db->select("SELECT * FROM comentarios WHERE id_evento = (SELECT id_evento FROM comentarios WHERE id =  :id_c  )", $parametros);

        return $comentarios;
    }
}
