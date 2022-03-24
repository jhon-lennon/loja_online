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

    public function todas_categorias(){
        $db = new Database();
        $categoria = $db->select('SELECT DISTINCT categoria FROM produtos');
        return $categoria;
    }
    //==========================================================================================================================

    public function produto()
    {
        $db = new Database();
        $parametro = [':id_pro' => Functions::desencriptar($_GET['id_pro'])];
        $resultado = $db->select('SELECT * FROM produtos WHERE id_produto = :id_pro', $parametro);
        return $resultado;
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

        $cod_compra = Functions::desencriptar($_GET['cod_compra']);
        $parametros = [':cod_compra' => $cod_compra];
        $detalhes = $db->select('SELECT * FROM compra_item WHERE codigo_compra = :cod_compra', $parametros);
        return $detalhes;
      
    }
    //==========================================================================================================================

    public function compra()
    {
        $db = new Database();
        $id_compra = Functions::desencriptar( $_GET['id_compra']);
        $parametros = [':id_compra' => $id_compra];

        $compras = $db->select('SELECT * FROM compras WHERE id_compra = :id_compra', $parametros);
        return $compras;
    }
    //============================================================================================================================
    public function cliente_detalhe()
    {
        $db = new Database();
        $id_cliente = Functions::desencriptar( $_GET['id_cli']);
        $parametro = [':id_cli' => $id_cliente];
        $resultado = $db->select('SELECT * FROM clientes WHERE id_cliente = :id_cli', $parametro);
        return $resultado;
    }
    public function cancelar_compra_model(){
        $db = new Database();
        $parametros = [
            ':id_com' => Functions::desencriptar($_GET['id_compra']), ':mot_can' => $_POST['motivo']
        ];
        $db->update("UPDATE compras SET status = 'cancelada', motivo_cancelamento = :mot_can, updated_at = NOW() WHERE id_compra = :id_com ",$parametros );
     }
     //==================================================================================================================
     public function atualizara_estoque_mais($id_pr, $quantida){

        $db = new Database();
        $parametros = [':quant' => $quantida, ':id_p' => $id_pr];
        $db->update('UPDATE produtos SET estoque = estoque + :quant WHERE id_produto = :id_p', $parametros);
        return;
    }

    public function repor_estoque($id_pr, $quantida){

        $db = new Database();
        $parametros = [':quant' => $quantida, ':id_p' => $id_pr];
        $db->update('UPDATE produtos SET estoque = estoque + :quant WHERE id_produto = :id_p', $parametros);
        return;
    }


     public function add_codigo_rastreio(){
        $db = new Database();
        $parametros = [
            ':id_com' => Functions::desencriptar($_GET['id_compra']), ':cod_rastreio' => $_POST['cod_rastreio']
        ];
        $db->update("UPDATE compras SET status = 'enviada', codigo_rastreio = :cod_rastreio, updated_at = NOW() WHERE id_compra = :id_com ",$parametros );
     }
     public function concluir_compra(){
        $db = new Database();
        $parametros = [
            ':id_com' => Functions::desencriptar($_GET['id_compra'])
        ];
        $db->update("UPDATE compras SET status = 'concluida', updated_at = NOW() WHERE id_compra = :id_com ",$parametros );
     }

     public function buscar_enderecos()
     {
         $parametros = [':id_u' => Functions::desencriptar($_GET['id_cli'])];
         $db = new Database();
         $endereco = $db->select('SELECT * FROM enderecos WHERE id_cliente = :id_u', $parametros);
         return $endereco;
     }


 //alterar status do cliente
     public function ativar_cliente(){
        
        $db = new Database();
        $parametros = [
            ':id_cli' => Functions::desencriptar($_GET['id_cli'])
        ];
        $db->update("UPDATE clientes SET ativo = 1, deleted_at = null WHERE id_cliente = :id_cli ",$parametros );
        return;
     }

     public function inativar_cliente(){

       $db = new Database();
        $parametros = [
            ':id_cli' => Functions::desencriptar($_GET['id_cli'])
        ];
        $db->update("UPDATE clientes SET ativo = 0, deleted_at = null WHERE id_cliente = :id_cli ",$parametros );
        return;
     
    }

    public function excluir_cliente(){
        $db = new Database();
        $parametros = [
            ':id_cli' => Functions::desencriptar($_GET['id_cli'])
        ];
        $db->update("UPDATE clientes SET ativo = 0, deleted_at = NOW() WHERE id_cliente = :id_cli ",$parametros );
        return;

    }
    public function atualizar_produto( $nome_imagem){
        $db = new Database();
        $parametros = [
            ':id_pro' => Functions::desencriptar($_GET['id_pro']),
            ':nome' => $_POST['nome'],
            ':descri' => $_POST['desc'],
            ':preco' => $_POST['preco'],
            ':quant' => $_POST['quant'],
            ':categ' => $_POST['categ'],
            ':img' => $nome_imagem
        ];
        $db->update("UPDATE produtos SET nome = :nome, descricao = :descri, imagem = :img, preco = :preco, estoque = :quant, categoria = :categ, deleted_at = NOW() WHERE id_produto = :id_pro ",$parametros );
        return;

    }
    public function atualizar_produto_sem_imagem(){
        $db = new Database();
        $parametros = [
            ':id_pro' => Functions::desencriptar($_GET['id_pro']),
            ':nome' => $_POST['nome'],
            ':descri' => $_POST['desc'],
            ':preco' => $_POST['preco'],
            ':quant' => $_POST['quant'],
            ':categ' => $_POST['categ'],
            
        ];
        $db->update("UPDATE produtos SET nome = :nome, descricao = :descri, preco = :preco, estoque = :quant, categoria = :categ, deleted_at = NOW() WHERE id_produto = :id_pro ",$parametros );
        return;

    }
    public function adicionar_produto( $nome_imagem){
        $db = new Database();
        $parametros = [
            ':nome' => $_POST['nome'],
            ':descri' => $_POST['desc'],
            ':preco' => $_POST['preco'],
            ':quant' => $_POST['quant'],
            ':categ' => $_POST['categ'],
            ':img' => $nome_imagem
        ];
        $db->insert("INSERT INTO produtos VALUES ( 0, :nome, :categ, :descri, :img, :preco, 1, 0, :quant, NOW(), NOW(), null)",$parametros );
        return;

    }
    public function busca()
    {
        $db = new Database();
        $parametros = [':busca' => '%'.$_POST['busca'].'%'];
 
        $resultado = $db->select("SELECT * FROM produtos WHERE nome like :busca", $parametros);
        return $resultado;
    }
    public function produtos_categoria($categoria)
    {
        $db = new Database();
        $parametros = [':c' => $categoria];
        $resultado = $db->select('SELECT * FROM produtos WHERE categoria = :c', $parametros);
        return $resultado;
    }

    public function produtos_disponivel()
    {
        $db = new Database();
       
        $resultado = $db->select('SELECT * FROM produtos WHERE estoque > 0');
        return $resultado;
    }
    
    public function produtos_indisponivel()
    {
        $db = new Database();
       
        $resultado = $db->select('SELECT * FROM produtos WHERE estoque  < 1');
        return $resultado;
    }

    public function produtos_filtro_quantidade()
    {
        $db = new Database();
        $parametro = [':quant' => $_POST['quant']];
       
        $resultado = $db->select('SELECT * FROM produtos WHERE estoque  <= :quant', $parametro);
        return $resultado;
    }
  
    public function excluir_produto(){
        $parametros = [':id' => Functions::desencriptar($_GET['id_pro'])];

        $db = new Database();
        $db->delete('DELETE FROM produtos WHERE id_produto = :id',$parametros);
        return;
    }
    






}