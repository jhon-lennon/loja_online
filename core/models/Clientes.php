<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Clientes{

    public function verificar_email(){
        
        //verificar se o wmail ja esta cadastrado
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email'])) 
        ];
       
        $db= new Database();
        $usuario = $db->select("SELECT email FROM clientes WHERE email = :email" , $parametros);
        if(count($usuario) > 0){
            return false;
        }else{
            return true;
        }
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
}