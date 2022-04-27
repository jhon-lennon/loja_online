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
    
    
    
    public function get_comentario(){
        $db= new Database();
        $comentarios = $db->select("SELECT * FROM comentarios ORDER BY id DESC");
       
            return $comentarios;
        
    }
        public function verificar_senha(){
          
            $parametros = [':id_c' => $_SESSION['id_cliente']];
           
            $db= new Database();
            $usuario = $db->select("SELECT * FROM clientes WHERE id_cliente = :id_c " , $parametros);

            if(count($usuario) != 1){
                return false;
    
            }elseif(!password_verify($_POST['text_senha'], $usuario[0]->senha)){
                return false;
            }

            return true;

        }


    public function cadastrar_cliente($purl1){
        $nome = $_POST['text_nome'];
        $email = $_POST['text_email'];
        $telefone = $_POST['text_telefone'];
        $senha1 = $_POST['text_senha1'];
        $senha2 = $_POST['text_senha2'];
        $purl = $purl1;
        $parametro = [
            ':nome' => $nome,
            ':email' => $email,
            ':tele' => $telefone,
            ':ende' => null,
            ':senha' => password_hash($senha1, PASSWORD_DEFAULT),
            ':purl' => $purl,
            ':ativo' => 0,
        ];
        $db = new Database();
        $db->insert('INSERT INTO clientes VALUES ( 0,:nome, :email, :tele, :ende, :senha, :purl, :ativo, NOW(), NOW(), null)',$parametro);

        return true;
 }
 public function validar_email($purl){

    $db = new Database();
    $parametros = [':purl' => $purl];
    $resultado = $db->select("SELECT * FROM clientes WHERE purl = :purl", $parametros);
    if(count($resultado) !=1){
        return false;
    }
    $id_cliente = $resultado[0]->id_cliente;
    $parametros = [':id_cliente' => $id_cliente];

    $db->update("UPDATE clientes SET purl= null, ativo= 1, updated_at= NOW() WHERE id_cliente = :id_cliente",$parametros);
    return true;
 }
 public function atualizar_dados(){

    $db = new Database();
    $parametro = [':email' => $_POST['text_email'], ':nome' => $_POST['nome'], ':tele' => $_POST['telefone'], ':id_c' => $_SESSION['id_cliente']];

    $db->update("UPDATE clientes SET email = :email, nome = :nome, telefone = :tele, updated_at = NOW() WHERE id_cliente = :id_c ",$parametro);

    return true;

    

 }
 public function alterar_senha(){
    $parametro =[':id_c' => $_SESSION['id_cliente'], ':senha' => password_hash($_POST['nova_senha'], PASSWORD_DEFAULT)];
    $db = new Database();
    $db->update("UPDATE clientes SET senha = :senha, updated_at = NOW() WHERE id_cliente = :id_c ",$parametro );
    return true;
 }


 public function recuperar_senha(){
    $parametro =[':email' => $_SESSION['email'], ':senha' => password_hash($_POST['nova_senha'], PASSWORD_DEFAULT)];
    $db = new Database();
    $db->update("UPDATE clientes SET senha = :senha, updated_at = NOW() WHERE email = :email ",$parametro );
    return true;
 }


}