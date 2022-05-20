<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Eventos_model
{
    public function get_eventos($evento = null)
    {
        if ($evento == null) {

            $db = new Database();
            $resultado = $db->select('SELECT * FROM eventos');
            return $resultado;
        } else {
            $db = new Database();
            $paramentros = [':id_e' => $evento];
            $resultado = $db->select('SELECT * FROM eventos WHERE id_evento = :id_e', $paramentros);
            return $resultado;
        }
    }
    public function get_presenca($id_evento)
    {
        $db = new Database();
        $paramentros = [':id_e' => $id_evento];
        $res = $db->select('SELECT * from presenca WHERE id_evento = :id_e', $paramentros);
        return $res;
    }

    public function get_presenca_user($id_evento)
    {
        $db = new Database();
        $paramentros = [':id_e' => $id_evento, 'id_u' => $_SESSION['id_usuario']];
        $res = $db->select('SELECT * from presenca WHERE id_evento = :id_e AND id_usuario = :id_u', $paramentros);
        return $res;
    }

    public function delete_comentario($id_comentario)
    {
        $db = new Database();
        $paramentros = [':id_c' => $id_comentario, ':id_u' => $_SESSION['id_usuario']];
        $db->delete('DELETE FROM comentarios WHERE id = :id_c AND id_usuario = :id_u', $paramentros);
    }

    public function pesquisa($text)
    {
        $db = new Database();
        $paramentros = [':texto' => '%' . $text . '%'];
        $res = $db->select('SELECT * from eventos WHERE cidade like :texto or titulo_evento like :texto', $paramentros);
        return $res;
    }
    public function eventos_city($cidade)
    {
        $db = new Database();
        $paramentros = [':c' => $cidade];
        $eventos = $db->select('SELECT * FROM eventos WHERE cidade = :c', $paramentros);
        return $eventos;
    }
    public function get_all_cidades()
    {
        $db = new Database();

        $cidades = $db->select('SELECT * FROM cidades');
        return $cidades;
    }

    public function adicionar_evento($dados)
    {
        //   return print_r($dados);

        $paramentros = [
            'id_u' => $_SESSION['id_usuario'],
            ':ti' => $dados['titulo'],
            ':lo' => $dados['local'],
            ':ci' => $dados['cidade'],
            ':en' => $dados['endereco'],
            ':di' => $dados['data_i'],
            ':df' => $dados['data_f'],
            ':ph' => $dados['preco_h'],
            ':pm' => $dados['preco_m'],
            ':de' => $dados['descr'],
            ':im' => $dados['img']
        ];
    $db = new Database();
    $db->insert('INSERT INTO eventos VALUES(0, :id_u, :ti, :de, :ph, :pm, :di, :df, :lo, :en, :ci, :im)',$paramentros);

        return ;
    }
}
