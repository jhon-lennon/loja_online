<?php
namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{
    private $ligacao;

    private function ligar(){

        $this->ligacao = new PDO('mysql:host='.MYSQL_SERVE.';'.
                                'dbname='.MYSQL_DATABASE.';'.
                                'charset='.MYSQL_CHARSET,
                                MYSQL_USER,
                                MYSQL_PASS,
                                array(PDO::ATTR_PERSISTENT => true)
                            );
        //debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function desligar(){
        $this->ligacao = null;
    }

    public function select($sql, $parametros = null){
        if(!preg_match("/^SELECT/i", $sql)){

        throw new Exception('Base de dados - Nao é espressao SELECT');

        }

        $this->ligar();
        $resultados = null;

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();
        
        return $resultados;
    }

    public function insert($sql, $parametros = null){
        if(!preg_match("/^INSERT/i", $sql)){

        throw new Exception('Base de dados - Nao é espressao INSERT');

        }

        $this->ligar();
        
        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();
       
    }
    public function update($sql, $parametros = null){
        if(!preg_match("/^UPDATE/i", $sql)){

        throw new Exception('Base de dados - Nao é espressao UPDATE');

        }

        $this->ligar();
        $resultados = null;

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();
        return $resultados;
    }

    public function delete($sql, $parametros = null){
        if(!preg_match("/^DELETE/i", $sql)){

        throw new Exception('Base de dados - Nao é espressao DELETE');

        }

        $this->ligar();
        
        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();
       
    }

    public function statement($sql, $parametros = null){
        if(preg_match("/^(DELETE|INSERT|UPDATE|SELECT)/i", $sql)){

        throw new Exception('Base de dados - Nao é espressao Instruçao invalida');

        }

        $this->ligar();
        
        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();
       
    }

}

