<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Produtos
{

    public function produtos_disponiveis()
    {
        $db = new Database();


        $resultado = $db->select('SELECT * FROM produtos WHERE visivel = 1');
        return $resultado;
    }
    public function produtos_categoria($categoria)
    {
        $db = new Database();
        $parametros = [':c' => $categoria];
        $resultado = $db->select('SELECT * FROM produtos WHERE categoria = :c', $parametros);
        return $resultado;
    }

    public function produtos_pag_inicial()
    {
        $db = new Database();
        $parametros = [':pg' => '1'];
        $resultado = $db->select('SELECT * FROM produtos WHERE pag_inicio = :pg', $parametros);
        return $resultado;
    }
    public function busca()
    {
        $db = new Database();
        $parametros = [':busca' => '%'.$_POST['busca'].'%', ':visivel' => 1];
 
        $resultado = $db->select("SELECT * FROM produtos WHERE visivel = :visivel AND  nome like :busca ", $parametros);
        return $resultado;
    }


    public function categoria()
    {
        $db = new Database();
        $categoria = $db->select('SELECT DISTINCT categoria FROM produtos');
        return $categoria;
    }

    public function carrinho()
    {
        $parametros = [':id_cliente' => $_SESSION['id_cliente']];
        $db = new Database();
        $carrinho = $db->select('SELECT * FROM carrinho WHERE id_cliente = :id_cliente', $parametros);

        return $carrinho;
    }
    public function adicionar()
    {

        $add = new Database();
        $parametros = [
            ':disp' => 1,
            ':id_p' => $_GET['id_p'],
            
        ];
        $carrinho = $add->select('SELECT * FROM produtos WHERE id_produto = :id_p AND visivel = :disp AND estoque > 0', $parametros);
        return $carrinho;
    }

    public function produtos_ids($ids){
        $db = new Database();
        $produtos = $db->select("SELECT * FROM produtos WHERE id_produto IN ($ids)");
        return $produtos;
    }

    public function estoque_produto($id){
        $db = new Database();
        $parametros = [':id_p' => $id];
        $produtos = $db->select("SELECT estoque FROM produtos WHERE id_produto  = :id_p", $parametros);
        return $produtos;
    }
}

