<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Presenca_model{
    public function get_presencah($evento = null)
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

    public function get_presenca_user($id_evento){
        $db = new Database();
        $paramentros =[':id_e' => $id_evento, 'id_u' => $_SESSION['id_usuario']];
        $res = $db->select('SELECT * from presenca WHERE id_evento = :id_e AND id_usuario = :id_u', $paramentros);
        return $res;
    }

    public function insere_presenca($id_evento){
        $paramentros = [':id_e' => $id_evento, 'id_u' => $_SESSION['id_usuario']];
        $db= new Database();
        $db->insert('INSERT INTO presenca VALUES(0, :id_e, :id_u)', $paramentros);
        return true;

    }
    public function remove_presenca($id_presenca){
        $db= new Database();
        $paramentros = [':id_p' => $id_presenca];
        $db->delete('DELETE FROM presenca WHERE id_presenca = :id_p',$paramentros);
        return true;
    }



}