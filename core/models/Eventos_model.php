<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Eventos_model{
    public function get_eventos()
    {
        $db = new Database();
        $resultado = $db->select('SELECT * FROM eventos');
        return $resultado;
    }



}