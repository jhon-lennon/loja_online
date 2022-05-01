<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Admin_model;

class Eventos
{

    public function cadastro_evento(){

        $views = [
            'layout/head',
            'cabecario',
            'add_evento',
            'layout/footer',
        ];

        Functions::layout($views);
    }
    




public function form_cadastro_evento(){


    print_r($_POST);
    echo "teste";
}



}