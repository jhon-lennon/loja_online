<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Comentarios{

    public function post_comentarios(){
       
        $db= new Database();
$parametro = [':id' => 0, ':com' => $_POST['comentario'], ':c' => null, ':u' => null];
        $db->insert('INSERT INTO comentarios VALUES  ( :id, :com ,:c, :u)',$parametro);

        $comentarios = $db->select("SELECT * FROM comentarios ORDER BY id DESC");
       
            return $comentarios;
        }
    
    
    
    public function get_comentario($id = null){
        if($id != null){
            $db= new Database();
            $parametros = [':id' => $id];

        $comentario = $db->select("SELECT * FROM comentarios WHERE id = :id", $parametros);
        return $comentario;
        }else{
                 $db= new Database();
        $comentarios = $db->select("SELECT * FROM comentarios ORDER BY id DESC");
       
            return $comentarios;  
        }
    }
       

 public function editar_comentario(){

    $db = new Database();

    $parametros = [':id_c' => $_POST['id_comentario'], ':c' => $_POST['comentario']];

    $db->update("UPDATE comentarios SET  comentario = :c, updated_at= NOW() WHERE id = :id_c",$parametros);
    return true;
 }
 

public function cadastrar_usuario(){

    $parametros = [
        ':e' => $_POST['text_email'],
        ':n'  => $_POST['text_nome'],
        ':s'  => $_POST['text_senha']
        
    ];

    $db = new Database();

    $db->insert('INSERT INTO usuarios VALUES (0, :e, :n, :s, NOW(), NULL)',$parametros);



}

}