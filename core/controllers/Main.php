<?php

namespace core\controllers;

use ArrayObject;
use com_exception;
use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Functions;
use core\models\Comentarios;
use core\models\Endereco;
use core\models\Produtos;

class Main
{



    public function index()
    {


        $views = [
            'layout/head',
            'cabecario',
            'home',
            'layout/footer',
        ];

        Functions::layout($views);
    }



    public function perfil()
    {
        if (!Functions::check_session()) {
            Functions::redirect('inicio');
            return;
        }

        $views = [
            'layout/head',
            'cabecario',
            'perfil',
            'layout/footer',
        ];

        Functions::layout($views);
    }
    //=====================================================================================================================

    public function login()
    {
        if (Functions::check_session()) {
            Functions::redirect('inicio');
            return;
        }

        $views = [
            'layout/head',
            'cabecario',
            'login',
            'layout/footer',
        ];
        Functions::layout($views);
    }

    public function sair()
    {
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['id_usuario']);

        $views = [
            'layout/head',
            'cabecario',
            'home',
            'layout/footer',
        ];

        Functions::layout($views);
    }

    public function cadastro()
    {
        if (Functions::check_session()) {
            Functions::redirect('inicio');
            return;
        }

        $views = [
            'layout/head',
            'cabecario',
            'cadastre_se',
            'layout/footer',
        ];


        Functions::layout($views);
    }


    public function ver_evento()
    {

        $views = [


            'layout/head',
            'cabecario',
            'mostrar_evento',
            'layout/footer',


        ];


        Functions::layout($views);
    }

    public function comentarios()
    {
        $comentarios = new comentarios();
        $comentario = $comentarios->post_comentarios();

        $comentario = json_encode($comentario);
        echo $comentario;
        //print_r($_POST);


    }

    //=====================================================================================================================
    //view login
    public function get_comentarios()
    {
        $comentarios = new Comentarios();


        $comen = $comentarios->get_comentarios($_GET['id_evento']);

        $filtro_comentarios = [];


        foreach ($comen as $com) {
            if (isset($_SESSION['id_usuario'])) {



                if ($com->id_usuario == $_SESSION['id_usuario']) {

                    $array = (array) $com;
                    $array['pertence'] = 1;
                    array_push($filtro_comentarios, $array);
                } else {

                    $array = (array) $com;
                    $array['pertence'] = 0;
                    array_push($filtro_comentarios, $array);
                }
            } else {
                $array = (array) $com;
                $array['pertence'] = 0;
                array_push($filtro_comentarios, $array);
            }
        }




        $res = json_encode($filtro_comentarios);
        echo $res;
        //  print_r($filtro_comentarios);
        // return;
    }

    //=====================================================================================================================
    //view criar conta
    public function get_comentario()
    {

        $comentarios = new Comentarios();
        $res = json_encode($comentarios->get_comentario($_GET['id_comentario']));
        echo $res;
    }



    //========================================================================================================================
    //cadastro de usuario
    public function atualizar_comentario()
    {
        $comentario = new comentarios();
        $res = $comentario->get_comentario($_POST['id_comentario']);

        if ($res[0]->id_usuario != $_SESSION['id_usuario']) {

            echo 'nao pertence';
        } else {

            $comentario->editar_comentario();
            $res = $comentario->get_comentario($_POST['id_comentario']);
            $res = json_encode($res);
            echo $res;
        }
    }

    public function form_cadastro()
    {

        $usuario = new comentarios();
        $erro = [];
        $res = $usuario->verificar_usuario($_POST['text_email']);

        if (count($res)  > 0) {

            echo "Email ja cadastrado, ";
            die;
        }



        if (!isset($_POST['text_nome'])) {
            array_push($erro, 'Erro metodo');
        }

        if (!filter_var($_POST['text_email'], FILTER_VALIDATE_EMAIL)) {
            array_push($erro, 'Email invalido');
        }

        if ($_POST['text_senha'] != $_POST['text_confirma_senha']) {
            array_push($erro, 'Senha e confirmar senha deve ser iguais');
        }

        if (strlen($_POST['text_senha']) < 8) {
            array_push($erro, 'A senha deve ter no minimo 8 caracteres');
        }
        if (strlen($_POST['text_nome']) < 5) {
            array_push($erro, 'O nome deve ter no minimo 5 caracteres');
        }

        if (!empty($erro)) {

            foreach ($erro as $e) {
                echo  $e . ',';
            }
        } else {
            $usuario->cadastrar_usuario();
            $_SESSION['mensagem'] = 'Cadastrado com sucesso! Entre.';
            echo true;
        }
    }
    public function form_login()
    {

        $usuario = new comentarios();

        $res = $usuario->verificar_usuario($_POST['text_email']);

        if (count($res)  != 1) {

            echo "Email não cadastrado ";
            die;
        } elseif (!password_verify($_POST['senha'], $res[0]->senha)) {
            echo "Senha invalida ";
            die;
        }

        $_SESSION['usuario_email'] = $res[0]->email;
        $_SESSION['usuario_nome'] = $res[0]->nome;
        $_SESSION['id_usuario'] = $res[0]->id_usuario;



        echo 1;
    }
}
