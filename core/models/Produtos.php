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

    public function produtos_pag_inicial(){
        $db = new Database();
        $parametros = [':pg' => '1'];
        $resultado = $db->select('SELECT * FROM produtos WHERE pag_inicio = :pg',$parametros);
        return $resultado;
    }


    public function categoria(){
        $db = new Database();
        $categoria = $db->select('SELECT DISTINCT categoria FROM produtos');
        return $categoria;
    }

    public function carrinho(){
        $parametros = [':id_cliente' => $_SESSION['id_cliente']];
        $db = new Database();
        $carrinho = $db->select('SELECT * FROM carrinho WHERE id_cliente = :id_cliente', $parametros);

        return $carrinho;

       
    } 
     public function adicionar(){
            $add = new Database();
           $quantidade = 2;
         /*   echo $_SESSION['id_cliente'];
           echo"<br><br>";
           echo $_GET['id_p'];
           echo"<br><br>";

           echo  $_GET['nome'];
           echo"<br><br>";

           echo $_GET['preco'];
           echo"<br><br>";

           echo  $quantidade * $_GET['preco'];
           echo"<br><br>";

           echo  $_GET['img'];
           echo"<br><br>";

           echo $quantidade;
           echo"<br><br>";



           die('aqui');
*/

            


            $parametros = [

                'id' =>0,
                ':id_c' => $_SESSION['id_cliente'],
                ':id_p' => $_GET['id_p'],
                ':nome_p' => $_GET['nome'],
                ':preco' => $_GET['preco'],
                ':total' => $quantidade * $_GET['preco'],
                ':imag' => $_GET['img'],
                ':quant' => $quantidade

            ];
  /*  echo $_SESSION['id_cliente'];
    echo"<br>";
    echo $_GET['id_p'];
    die;*/

        $carrinho = $add->insert("INSERT INTO carrinho VALUES( :id, :id_c, :id_p, :nome_p, :preco, :total, :imag, :quant)",$parametros);
          //  $add->insert("INSERT INTO carrinho VALUES( 0, $id_cliente , 8, "nome_p", 30.60, 60.65, "fff", 2)");
            
            return $carrinho;


        }

}