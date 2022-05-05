<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Eventos_model{
    public function get_eventos($evento = null)
    {
        if($evento == null){

        $db = new Database();
        $resultado = $db->select('SELECT * FROM eventos');
        return $resultado;
        }else{
            $db = new Database();
            $paramentros = [':id_e' => $evento];
            $resultado = $db->select('SELECT * FROM eventos WHERE id_evento = :id_e',$paramentros);
            return $resultado;
        }
      
    }
    public function get_presenca($id_evento){
        $db = new Database();
        $paramentros =[':id_e' => $id_evento];
        $res = $db->select('SELECT * from presenca WHERE id_evento = :id_e', $paramentros);
        return $res;
    }



}