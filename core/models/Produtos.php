<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Produtos{

    public function produtos_disponiveis(){
        $db = new Database();
        $resultado = $db->select('SELECT * FROM produtos WHERE visivel = 1');
        return $resultado;
    }
    public function produtos_categoria($categoria){
        $db = new Database();
        $parametros = [':c' => $categoria];
        $resultado = $db->select('SELECT * FROM produtos WHERE categoria = :c',$parametros);
        return $resultado;
    }


    public function categoria(){
        $db = new Database();
        $categoria = $db->select('SELECT DISTINCT categoria FROM produtos');
        return $categoria;
    }

}