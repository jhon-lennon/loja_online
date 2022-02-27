<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Compras{

public function registrar_compra($codigo_compra){

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
                ':com' => $_SESSION['endereco']->complemento
];

//print_r($parametros);



$db->insert('INSERT INTO compras VALUES (default, :id_u, :cod_com, NOW(), :statu, :cep, :est, :cid, :bai, :rua, :num, :com)',$parametros);
return;
}


public function registrar_itens($itens, $codigo_compra){

    $db = new Database();
 
    foreach($itens as $item){
    $parametros = [
    
                    ':cod_com' => $codigo_compra,
                    ':prod' => $item['nome'],
                    ':preco' => $item['preço'],
                    ':quant' => $item['quantidade']
    ];
    
    $db->insert('INSERT INTO compra_item VALUES (default, :cod_com, :prod, :preco, :quant)',$parametros);

    }
    return;
    }



}
