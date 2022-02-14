<?php
namespace core\controladores;

use core\classes\Database;
use core\classes\Functions;

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

$dados = ['titulo'=> 'esse é o titulo'];

Functions::layout($views, $dados);
}
public function cadastrar_conta(){
    if(isset($_SESSION['usuario'])){
        $this->index();
        return;
    }
    
    $parametros = [
        ':email' => $_POST['text_email']
    ];
   // 
    $usuario = new Database();
    $usuario->select("SELECT * FROM produtos");
    print_r($usuario);
    
    die('fim');
    if($_SERVER['REQUEST_METHOD']!= 'POST'){
        $this->index();
        return;
    }
    if($_POST['text_senha1'] != $_POST['text_senha2']){
        $_SESSION['erro'] = "Senha e confirmar senha devem ser iguais.";
        $this->criar_conta();
    }
    if( strlen($_POST['text_senha1']) < 8 ){
        $_SESSION['erro'] = "A senha deve ter no minimo 8 caracters.";
        $this->criar_conta();
    }


    echo"<pre>";
   echo $_POST['text_nome'];
}

}

/*[text_nome] => 
    [text_email] => 
    [text_telefone] => 
    [text_senha1] => 
    [text_senha2] => 
) */