<?php

namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Compras
{

    public function registrar_compra($codigo_compra)
    {

        $db = new Database();


        $parametros = [
            ':id_u' => $_SESSION['id_cliente'],
            ':cod_com' => $codigo_compra,
            ':statu' => "aguardando pagamento",
            ':cep' => $_SESSION['endereco']->cep,
            ':est' => $_SESSION['endereco']->estado,
            ':cid' => $_SESSION['endereco']->cidade,
            ':bai' => $_SESSION['endereco']->bairro,
            ':rua' => $_SESSION['endereco']->rua,
            ':num' => $_SESSION['endereco']->numero,
            ':com' => $_SESSION['endereco']->complemento,
            ':pag' => $_SESSION['pagamento'],
            ':valor' => $_SESSION['total_valor']
        ];
    
        $db->insert('INSERT INTO compras VALUES (default, :id_u, :cod_com, NOW(), :statu, :cep, :est, :cid, :bai, :rua, :num, :com, :pag, :valor)', $parametros);
        return;
    }


    public function registrar_itens($itens, $codigo_compra)
    {

        $db = new Database();

        foreach ($itens as $item) {
            $parametros = [

                ':cod_com' => $codigo_compra,
                ':prod' => $item['nome'],
                ':preco' => $item['preço'],
                ':quant' => $item['quantidade']
            ];

            $db->insert('INSERT INTO compra_item VALUES (default, :cod_com, :prod, :preco, :quant)', $parametros);
        }
        return;
    }
    public function minhas_compras()
    {

        $db = new Database();
        $parametros = [':id_u' => $_SESSION['id_cliente']];

        $compras = $db->select('SELECT * FROM compras WHERE id_usuario = :id_u', $parametros);
        return $compras;
    }
    public function compra_detalhes()
    {

        $db = new Database();
        $parametros = [':cod_c' => $_GET['cod_c']];

        $detalhes = $db->select('SELECT * FROM compra_item WHERE codigo_compra = :cod_c', $parametros);
        return $detalhes;
    }
    public function compras()
    {

        $db = new Database();
        $parametros = [':cod_c' => $_GET['cod_c']];

        $compras = $db->select('SELECT * FROM compras WHERE codigo_compra = :cod_c', $parametros);
        return $compras;
    }
}
