<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;
use Exception;

class Endereco
{

public function buscar_enderecos(){
    $parametros = [':id_u' => $_SESSION['id_cliente']];
    $db = new Database();
    $endereco = $db->select('SELECT * FROM enderecos WHERE id_cliente = :id_u', $parametros);
    return $endereco;
}

public function buscar_enderecos_resumo(){
    $parametros = [':id_u' => $_SESSION['id_cliente'], ':id_ende' => $_POST['id_ende']];
    $db = new Database();
    $endereco = $db->select('SELECT * FROM enderecos WHERE id_cliente = :id_u AND id_endere = :id_ende', $parametros);
    return $endereco;
}
public function cadastrar_endereco(){
    $db = new Database();

    $parametros = [
                    ':id_c' => $_SESSION['id_cliente'],
                    ':nome' => $_POST['nome'],
                    ':cep' => $_POST['cep'],
                    ':estado' => $_POST['estado'],
                    ':cidade' => $_POST['cidade'],
                    ':bairro' => $_POST['bairro'],
                    ':rua' => $_POST['rua'],
                    ':numero' => $_POST['numero'],
                    ':comp' => $_POST['comp']

    ];
    try{
    $db->insert("INSERT INTO enderecos VALUES(0, :id_c, :nome, :cep, :estado, :cidade, :bairro, :rua, :numero, :comp)",$parametros);
    }
    catch(Exception $e){
      return false;  
    }
    return true;

    
}




}
