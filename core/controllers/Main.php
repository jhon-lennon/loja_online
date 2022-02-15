<?php
namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Clientes;

class Main{

public function index(){

    $views = [
        'layouts/html_head',
        'head',
        'home',
        'rodape',
        'layouts/html_footer'

    ];

    $dados = ['titulo'=> 'esse é o titulo'];
    
    Functions::layout($views, $dados);
}

public function loja(){
    $views = [
        'layouts/html_head',
        'head',
        'loja',
        'rodape',
        'layouts/html_footer'

];

$dados = ['titulo'=> 'esse é o titulo'];

Functions::layout($views, $dados);
}

public function login(){
    $views = [
        'layouts/html_head',
        'head',
        'login',
        'rodape',
        'layouts/html_footer'

];

Functions::layout($views,);
}

public function criar_conta(){
    if(isset($_SESSION['usuario'])){
        $this->index();
    }

    $views = [
        'layouts/html_head',
        'head',
        'criar_conta',
        'rodape',
        'layouts/html_footer'

];


Functions::layout($views,);
}
public function cadastrar_conta(){
    if(isset($_SESSION['usuario'])){
        $this->index();
        return;
    }
    if($_SERVER['REQUEST_METHOD']!= 'POST'){
        $this->index();
        return;
    }

    $nome = $_POST['text_nome'];
    $email = $_POST['text_email'];
    $telefone = $_POST['text_telefone'];
    $senha1 = $_POST['text_senha1'];
    $senha2 = $_POST['text_senha2'];
    
    //verificar se o wmail ja esta cadastrado
    $verifica = new Clientes();

    if(!$verifica->verificar_email()){
        $_SESSION['erro'] = "Email ja está cadastrado.";
        $this->criar_conta();
    }

    //verificar se o nome foi requerido
    if($nome = null || strlen($nome) < 8 ){
        $_SESSION['erro'] = "O nome deve ter no minimo 10 caracteres.";
        $this->criar_conta();
        return;
    }
    //verificar se o telefone foi requerido
    if($telefone = null || strlen($telefone) < 11 ){
        $_SESSION['erro'] = "O telefone deve ter 11 digitos";
        $this->criar_conta();
        return;
    }
    
    //verificar se a senha tem menos de 8 caracters
    if( strlen($senha1) < 8 ){
        $_SESSION['erro'] = "A senha deve ter no minimo 8 caracters.";
        $this->criar_conta();
        return;
    }
    
    //verificando se a senha e confirmar senha sao iguais
    if($senha1!= $senha2){
        $_SESSION['erro'] = "Senha e confirmar senha devem ser iguais.";
        $this->criar_conta();
        return;
    }
   $p = random_int(1111111111, 9999999999);
    $purl = password_hash($p, PASSWORD_DEFAULT);

    $cadastrar = new Clientes();
    $cadastrar->cadastrar_cliente($purl);
    

 
    $confirma_email = new EnviarEmail();
    $confirma_email->enviar_email($email,$nome,$purl);

    if($confirma_email){
        echo"enviado para ".$_POST['text_nome']."". $purl;
    }else{
        echo"nao enviado";
    }
   
}

}