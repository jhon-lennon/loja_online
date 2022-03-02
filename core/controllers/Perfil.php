<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\Email_codigo;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Clientes;
use core\models\Compras;
use core\models\Endereco;
use core\models\Produtos;

class Perfil
{

    public function minhas_compras()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
        }
        $compra = new Compras();
        $compras = $compra->minhas_compras();


        $views = [
            'layouts/html_head',
            'head',
            'minhas_compras',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['compras' => $compras];

        Functions::layout($views, $dado);
    }

    public function compra_detalhes()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
        }
        $db = new Compras();
        $detalhes = $db->compra_detalhes();

        $compras = $db->compras();


        $views = [
            'layouts/html_head',
            'head',
            'compra',
            'rodape',
            'layouts/html_footer',
        ];
        $dado = ['compras' => $compras, 'detalhes' => $detalhes];

        Functions::layout($views, $dado);
    }

    public function alterar_senha()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
            return;
        }

        $views = [
            'layouts/html_head',
            'head',
            'alterar_senha',
            'rodape',
            'layouts/html_footer',
        ];


        Functions::layout($views);
        return;
    }
    public function alterar_dados()
    {
        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
            return;
        }

        $views = [
            'layouts/html_head',
            'head',
            'alterar_dados',
            'rodape',
            'layouts/html_footer',
        ];


        Functions::layout($views);
        return;
    }
    public function alterar_dados_form()
    {

        if (!isset($_SESSION['usuario'])) {
            Functions::redirect('home');
            return;
        }
        $nome = $_POST['nome'];
        $email = $_POST['text_email'];
        $telefone = $_POST['telefone'];


        //verificar se o wmail ja esta cadastrado
        $verifica = new Clientes();
        if ($_SESSION['usuario'] != $email) {
            if (!$verifica->verificar_email()) {
                $_SESSION['erro'] = "Email ja está cadastrado.";
                Functions::redirect('alterar_dados');
                return;
            }
        }

        //verificar se o nome foi requerido
        if ($nome == null || strlen($nome) < 8) {
            $_SESSION['erro'] = "O nome deve ter no minimo 10 caracteres.";
            Functions::redirect('alterar_dados');
            return;
        }
        //verificar se o telefone foi requerido
        if ($telefone == null || strlen($telefone) < 11) {
            $_SESSION['erro'] = "O telefone deve ter 11 digitos";
            Functions::redirect('alterar_dados');
            return;
        }
        if (!isset($_POST['text_senha'])) {
            $_SESSION['erro'] = 'informe a senha';
            Functions::redirect('alterar_dados');
            return;
        }
        $db = new Clientes();
        $senha = $db->verificar_senha();

        if ($senha == false) {
            $_SESSION['erro'] = 'senhaa invalida';
            Functions::redirect('alterar_dados');
            return;
        }
        $atualizar = $db->atualizar_dados();

        if ($atualizar == true) {
            $_SESSION['usuario'] = $email;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['nome'] = $nome;
            $_SESSION['mensagem'] = 'dados atualizados';
            Functions::redirect('alterar_dados');
            return;
        }
    }
    public function alterar_senha_form()
    {


        //verificar se a senha tem menos de 8 caracters
        if (strlen($_POST['nova_senha']) < 8) {
            $_SESSION['erro'] = "A nova senha deve ter no minimo 8 caracters.";
            Functions::redirect('alterar_senha');
            return;
        }

        //verificando se a senha e confirmar senha sao iguais
        if ($_POST['nova_senha'] != $_POST['nova_senha_2']) {
            $_SESSION['erro'] = "A nova senha e confirmar senha devem ser iguais.";
            Functions::redirect('alterar_senha');
            return;
        }
        $db = new Clientes();
        $senha = $db->verificar_senha();

        if ($senha == false) {
            $_SESSION['erro'] = 'senha invalida';
            Functions::redirect('alterar_senha');
            return;
        }
        $alterar = new Clientes();
        $alterar->alterar_senha();

        if ($alterar == true) {

            $_SESSION['mensagem'] = 'Senha Alterada';
            Functions::redirect('alterar_senha');
            return;
        }
    }
    public function esqueci_senha()
    {

        if (isset($_SESSION['usuario'])) {
            Functions::redirect('loja');
            return;
        }
        $views = [
            'layouts/html_head',
            'head',
            'esqueci_senha',
            'rodape',
            'layouts/html_footer',
        ];


        Functions::layout($views);
        return;
    }
    public function esqueci_senha_form()
    {

        if (isset($_SESSION['usuario'])) {
            Functions::redirect('loja');
            return;
        }
        $db = new Clientes();
        $verifica = $db;
        if ($verifica->verificar_email() == true) {
            $_SESSION['erro'] = "Email não cadastrado.";
            Functions::redirect('esqueci_senha');
            return;
        }

        $_SESSION['codigo'] = random_int(111111, 999999);

        $email = new Email_codigo();
        $enviar = $email->email_codigo();

        if ($enviar == false) {
            $_SESSION['erro'] = "EErro ao enviar email.";
            Functions::redirect('esqueci_senha');
            return;
        } else {
            $_SESSION['email'] = $_POST['text_email'];

            $views = [
                'layouts/html_head',
                'head',
                'recuperar_senha',
                'rodape',
                'layouts/html_footer',
            ];
            Functions::layout($views);
            return;
        }
    }
    public function recuperar_senha_form()
    {
        if (isset($_SESSION['usuario'])) {
            Functions::redirect('loja');
            return;
        }

        //verificar se a senha tem menos de 8 caracters
        if (strlen($_POST['nova_senha']) < 8) {
            $_SESSION['erro'] = "A nova senha deve ter no minimo 8 caracters.";
            $views = [
                'layouts/html_head',
                'head',
                'recuperar_senha',
                'rodape',
                'layouts/html_footer',
            ];
            Functions::layout($views);
            return;
        }

        //verificando se a senha e confirmar senha sao iguais
        if ($_POST['nova_senha'] != $_POST['nova_senha_2']) {
            $_SESSION['erro'] = "A nova senha e confirmar senha devem ser iguais.";
            $views = [
                'layouts/html_head',
                'head',
                'recuperar_senha',
                'rodape',
                'layouts/html_footer',
            ];
            Functions::layout($views);
            return;
        }
        if($_POST['codigo'] != $_SESSION['codigo']){
            $_SESSION['erro'] = "O codigo estar incorreto, verifique seu email.";
            $views = [
                'layouts/html_head',
                'head',
                'recuperar_senha',
                'rodape',
                'layouts/html_footer',
            ];
            Functions::layout($views);
            return;
        }
        $alterar = new Clientes();
        $alterar->recuperar_senha();

        if ($alterar == true) {
            unset($_SESSION['email']);
            unset($_SESSION['codigo']);


            $_SESSION['mensagem'] = 'Senha recuperada, faça o login para entrar';
            Functions::redirect('login');
            return;
        }

       
    }
}
