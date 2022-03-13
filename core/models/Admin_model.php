<?php
namespace core\models;

use core\classes\Database;
use core\classes\Functions;

class Admin_model{

    public function verificar_email(){
        
        //verificar se o wmail ja esta cadastrado
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email'])) 
        ];
       
        $db= new Database();
        $usuario = $db->select("SELECT email FROM user_admin WHERE email = :email" , $parametros);
        if(count($usuario) > 0){
            return false;
        }else{
            return true;
        }
    }
    //==========================================================================================================================

    
    public function verificar_login($usuario, $senha){
        
        //verificar se o wmail ja esta cadastrado
        $parametros = [
            ':email' => $usuario
        ];
       
        $db= new Database();
        $usuario = $db->select("SELECT * FROM user_admin WHERE email = :email" , $parametros);
        if(count($usuario) != 1){
            $_SESSION['erro'] = "Usuario não Cadastrado";
            
            Functions::redirect_admin('login');
            return;

        }elseif(!password_verify($senha, $usuario[0]->senha)){
            $_SESSION['erro'] = "Senha errada";
            Functions::redirect_admin('login');
            return;
        }
        return $usuario;
    }

    //==========================================================================================================================
    
    public function todos_produtos()
    {
        $db = new Database();
        $resultado = $db->select('SELECT * FROM produtos');
        return $resultado;
    }
    //==========================================================================================================================


    public function todos_clientes()
    {
        $db = new Database();
        $resultado = $db->select('SELECT * FROM clientes');
        return $resultado;
    }
    //==========================================================================================================================

    public function clientes_ativos()
    {
        $db = new Database();
        $parametro = [':ativo' => 1];
        $resultado = $db->select('SELECT * FROM clientes WHERE ativo = :ativo', $parametro);
        return $resultado;
    }
    //==========================================================================================================================

    public function clientes_inativos()
    {
        $db = new Database();
        $parametro = [':ativo' => 0];
        $resultado = $db->select('SELECT * FROM clientes WHERE ativo = :ativo && deleted_at is null ' , $parametro);
        return $resultado;
    }
    //==========================================================================================================================

    public function clientes_excluidos()
    {
        $db = new Database();
        $resultado = $db->select('SELECT * FROM clientes WHERE deleted_at != 0');
        return $resultado;
    }
    //==========================================================================================================================


    public function todas_vendas()
    {
        $db = new Database();
        $resultado = $db->select('SELECT * FROM compras');
        return $resultado;
    }
    //==========================================================================================================================

    public function vendas($status)
    {
        $db = new Database();
        $parametro = [':status' => $status];
        $resultado = $db->select('SELECT * FROM compras WHERE status = :status',$parametro);
        return $resultado;
    }
    //==========================================================================================================================
 
    public function compras_cliente($id_cliente)
    {

        $db = new Database();
        $parametros = [':id_u' => $id_cliente];

        $compras = $db->select('SELECT * FROM compras WHERE id_usuario = :id_u', $parametros);
        return $compras;
    }
    //==========================================================================================================================

    public function detalhes_compra_cliente()
    {

        $db = new Database();

        $cod_c = Functions::desencriptar(  $_GET['cod_c']);
        $parametros = [':cod_c' => $cod_c];
        $detalhes = $db->select('SELECT * FROM compra_item WHERE codigo_compra = :cod_c', $parametros);
        return $detalhes;
    }
    //==========================================================================================================================

    public function compra()
    {
        $db = new Database();
        $cod_c = Functions::desencriptar( $_GET['cod_c']);
        $parametros = [':cod_c' => $cod_c];

        $compras = $db->select('SELECT * FROM compras WHERE codigo_compra = :cod_c', $parametros);
        return $compras;
    }
    //============================================================================================================================
    public function cliente_detalhe()
    {
        $db = new Database();
        $id_cliente = Functions::desencriptar( $_GET['id_cli']);
        $parametro = [':id_c' => $id_cliente];
        $resultado = $db->select('SELECT * FROM clientes WHERE id_cliente = :id_c', $parametro);
        return $resultado;
    }



































        public function verificar_senha(){
          
            $parametros = [':id_c' => $_SESSION['id_cliente']];
           
            $db= new Database();
            $usuario = $db->select("SELECT * FROM clientes WHERE id_cliente = :id_c " , $parametros);

            if(count($usuario) != 1){
                return false;
    
            }elseif(!password_verify($_POST['text_senha'], $usuario[0]->senha)){
                return false;
            }

            return true;

        }


    public function cadastrar_cliente($purl1){
        $nome = $_POST['text_nome'];
        $email = $_POST['text_email'];
        $telefone = $_POST['text_telefone'];
        $senha1 = $_POST['text_senha1'];
        $senha2 = $_POST['text_senha2'];
        $purl = $purl1;
        $parametro = [
            ':nome' => $nome,
            ':email' => $email,
            ':tele' => $telefone,
            ':ende' => null,
            ':senha' => password_hash($senha1, PASSWORD_DEFAULT),
            ':purl' => $purl,
            ':ativo' => 0,
        ];
        $db = new Database();
        $db->insert('INSERT INTO clientes VALUES ( 0,:nome, :email, :tele, :ende, :senha, :purl, :ativo, NOW(), NOW(), null)',$parametro);

        return true;
 }
 public function validar_email($purl){

    $db = new Database();
    $parametros = [':purl' => $purl];
    $resultado = $db->select("SELECT * FROM clientes WHERE purl = :purl", $parametros);
    if(count($resultado) !=1){
        return false;
    }
    $id_cliente = $resultado[0]->id_cliente;
    $parametros = [':id_cliente' => $id_cliente];

    $db->update("UPDATE clientes SET purl= null, ativo= 1, updated_at= NOW() WHERE id_cliente = :id_cliente",$parametros);
    return true;
 }
 public function atualizar_dados(){

    $db = new Database();
    $parametro = [':email' => $_POST['text_email'], ':nome' => $_POST['nome'], ':tele' => $_POST['telefone'], ':id_c' => $_SESSION['id_cliente']];

    $db->update("UPDATE clientes SET email = :email, nome = :nome, telefone = :tele, updated_at = NOW() WHERE id_cliente = :id_c ",$parametro);

    return true;

    

 }
 public function alterar_senha(){
    $parametro =[':id_c' => $_SESSION['id_cliente'], ':senha' => password_hash($_POST['nova_senha'], PASSWORD_DEFAULT)];
    $db = new Database();
    $db->update("UPDATE clientes SET senha = :senha, updated_at = NOW() WHERE id_cliente = :id_c ",$parametro );
    return true;
 }


 public function recuperar_senha(){
    $parametro =[':email' => $_SESSION['email'], ':senha' => password_hash($_POST['nova_senha'], PASSWORD_DEFAULT)];
    $db = new Database();
    $db->update("UPDATE clientes SET senha = :senha, updated_at = NOW() WHERE email = :email ",$parametro );
    return true;
 }


}