
<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Comentarios;
use core\models\Usuario_model;

class Usuarios
{

    public function form_cadastre_se()
    {




        if ($_FILES['foto']['error'] == 0) {

            if ($_FILES['foto']['type'] == 'image/jpeg') {


                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';
                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/png') {

                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';

                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } elseif ($_FILES['foto']['type'] == 'image/jpg') {

                $nome_foto = rand(11111, 99999) . 'primeiro.jpeg';

                $atualizar = new Admin_model();
                $atualizar->adicionar_produto($nome_foto);

                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/' . $nome_foto);
                $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
                $this->adicionar_produto();
                return;
            } else {
                $_SESSION['erro'] = 'A imagem deve ser do tipo JPG, JPEG ou PNG';
                $this->adicionar_produto();
                return;
            }
        } else {

            $atualizar = new Admin_model();

            $atualizar->adicionar_produto('sem_imagem.jpg');
            $_SESSION['cadastrado'] = 'O produto foi cadastrado.';
            $this->adicionar_produto();
            return;
        }
    }
}
