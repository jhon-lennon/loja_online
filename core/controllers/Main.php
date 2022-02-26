<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Clientes;
use core\models\Endereco;
use core\models\Produtos;

class Main
{



    public function index()
    {

        $produtos = new Produtos();
        $resultado = $produtos->produtos_pag_inicial();

        $views = [
            'layouts/html_head',
            'head',
            'home',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['produtos' => $resultado];

        Functions::layout($views, $dado);
    }
    //=====================================================================================================================
    //view loja
    public function loja()
    {

        $produtos = new Produtos();
        $resultado = $produtos->produtos_disponiveis();

        $categorias = $produtos->categoria();

        $views = [
            'layouts/html_head',
            'head',
            'loja',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['produtos' => $resultado,'categorias'=> $categorias];

        Functions::layout($views, $dado);
    }


    public function loja_categoria()
    {
        $categoria = $_GET['c'];
        $db = new Produtos();
        $pro_categoria = $db->produtos_categoria($categoria);

        $categorias = $db->categoria();

        $views = [
            'layouts/html_head',
            'head',
            'loja',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['produtos' => $pro_categoria,'categorias'=> $categorias];

        Functions::layout($views, $dado);
    }




    
    




    //=====================================================================================================================
    //view login
    public function login(){

        if (isset($_SESSION['usuario'])) {
            Functions::redirect('inicio');
        }

        $views = [
            'layouts/html_head',
            'head',
            'login',
            'rodape',
            'layouts/html_footer'

        ];

        Functions::layout($views,);
    }
    //==================================================================================================================
    public function login_carrinho(){

        if (isset($_SESSION['usuario'])) {
            Functions::redirect('inicio');
        }
        if(isset($_SESSION['dados_temp'])){
            unset($_SESSION['dados_temp']);
        }

        $views = [
            'layouts/html_head',
            'head',
            'login',
            'rodape',
            'layouts/html_footer'

        ];

        Functions::layout($views,);
    }
    //=====================================================================================================================
    //view criar conta
    public function criar_conta()
    {
        if (isset($_SESSION['usuario'])) {
            Functions::redirect('inicio');
            return;
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

    //========================================================================================================================
    //cadastro de usuario
    public function cadastrar_conta()
    {
        if (isset($_SESSION['usuario'])) {
            $this->index();
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
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

        if (!$verifica->verificar_email()) {
            $_SESSION['erro'] = "Email ja está cadastrado.";
            $this->criar_conta();
        }

        //verificar se o nome foi requerido
        if ($nome = null || strlen($nome) < 8) {
            $_SESSION['erro'] = "O nome deve ter no minimo 10 caracteres.";
            $this->criar_conta();
            return;
        }
        //verificar se o telefone foi requerido
        if ($telefone = null || strlen($telefone) < 11) {
            $_SESSION['erro'] = "O telefone deve ter 11 digitos";
            $this->criar_conta();
            return;
        }

        //verificar se a senha tem menos de 8 caracters
        if (strlen($senha1) < 8) {
            $_SESSION['erro'] = "A senha deve ter no minimo 8 caracters.";
            $this->criar_conta();
            return;
        }

        //verificando se a senha e confirmar senha sao iguais
        if ($senha1 != $senha2) {
            $_SESSION['erro'] = "Senha e confirmar senha devem ser iguais.";
            $this->criar_conta();
            return;
        }
        $p = random_int(1111111111, 9999999999);
        $purl = password_hash($p, PASSWORD_DEFAULT);

        $cadastrar = new Clientes();
        $cadastrar->cadastrar_cliente($purl);




        $confirma_email = new EnviarEmail();
        $confirma_email->enviar_email($email, $nome, $purl);

        if ($confirma_email) {
            $views = [
                'layouts/html_head',
                'head',
                'cadastro/conta_criada',
                'rodape',
                'layouts/html_footer'

            ];

            Functions::layout($views,);
        } else {
            echo "nao enviado";
        }
    }

    //=================================================================================================================
    //validar email e ativar conta
    public function verificar_email()
    {
        if (isset($_SESSION['usuario'])) {
            $this->index();
            return;
        }
        if (!isset($_GET['purl'])) {
            $this->index();
            return;
        }
        $cliente = new Clientes();
        $resultado = $cliente->validar_email($_GET['purl']);
        if ($resultado) {
            $views = [
                'layouts/html_head',
                'head',
                'cadastro/conta_ativada',
                'rodape',
                'layouts/html_footer'

            ];

            Functions::layout($views,);
        }
    }
//==================================================================================================================

    public function login_form()
    {
        if (isset($_SESSION['usuario'])) {
            Functions::redirect('inicio');
            return;
            
        }
        if (!$_POST['text_email']) {
            $_SESSION['erro'] = 'informe o email';
            Functions::redirect('login');
            return;
        }
        if (!$_POST['text_senha']) {
            $_SESSION['erro'] = 'informe a senha';
            Functions::redirect('login');
            return;
        }

        if (!filter_var($_POST['text_email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erro'] = 'formato de email invalido';
            Functions::redirect('login');
            return;
        }
        $usuario = strtolower(trim($_POST['text_email']));
        $senha = trim($_POST['text_senha']);

        $resultad =  new Clientes();
        $resultado = $resultad->verificar_login($usuario, $senha);


      


        if ($resultado) {
            $_SESSION['usuario'] = $resultado[0]->email;
            $_SESSION['id_cliente'] = $resultado[0]->id_cliente;
            $_SESSION['nome'] = $resultado[0]->nome;
            $_SESSION['telefone'] = $resultado[0]->telefone;
            if(isset($_SESSION['dados_temp'])){
                unset($_SESSION['dados_temp']);
                Functions::redirect('carrinho');
                return;
            }
            
            
            Functions::redirect('inicio');
            return;
        }
        //===========================================================================================================
        //sair da sessaoo


    }
    public function sair()
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['id_cliente']);
        unset($_SESSION['nome']);
        unset($_SESSION['telefone']);
        Functions::redirect('inicio');
        return;
    }
//====================================================================================================================
public function editar_endereco()
{

    if (!isset($_SESSION['usuario'])) {
        Functions::redirect('inicio');
        return;
    }
    $end = new Endereco();
    $endereco = $end->buscar_enderecos_editar($_GET['id_end']);
    if(count($endereco) != 1){
        Functions::redirect('minha_conta');
        return;
    }
    $dados = ['endereco' => $endereco];
    $views = [
        'layouts/html_head',
        'head',
        'editar_endereco',
        'rodape',
        'layouts/html_footer',
    ];

    Functions::layout($views, $dados);
    return;
}
//======================================================================================================================
//editar endereço formulario
    public function editar_endereco_form(){
        
        $endereco = new Endereco();

       $mensagem = $endereco->atualizar_endereco();
       $dados = ['mensagem' => $mensagem];
       $views = [
           'layouts/html_head',
           'head',
           'editar_endereco',
           'rodape',
           'layouts/html_footer',
       ];
   
       Functions::layout($views, $dados);
       return;

    }

    //===============================================================================================================
    //formulario endereco
    public function endereco_form()
    {

    $form = new Endereco();
    $resutado = $form->cadastrar_endereco();
    if($resutado = true){
        Functions::redirect('carrinho');
        return;
    }else{
        $_SESSION['erro'] = 'ocorreu um erro';
        Functions::redirect('inicio');
        return;
    }
    }

//======================================================================================================================
     public function minha_conta(){
         
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('inicio');
            return;
        }
        $end = new Endereco();
        $endereco = $end->buscar_enderecos();


        $dados = ['endereco' => $endereco];

        $views = [
            'layouts/html_head',
            'head',
            'minha_conta',
            'rodape',
            'layouts/html_footer'

        ];

        Functions::layout($views, $dados);
        return;
     }

}
