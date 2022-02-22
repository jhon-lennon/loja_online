<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Endereco
{

public function buscar_enderecos(){
    $parametros = [':id_u' => $_SESSION['id_cliente']];
    $db = new Database();
    $endereco = $db->select('SELECT * FROM enderecos WHERE id_cliente = :id_u', $parametros);
    return $endereco;
}




}
