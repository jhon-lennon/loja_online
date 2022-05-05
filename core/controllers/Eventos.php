<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Eventos_model;
use core\models\Presenca_model;

class Eventos
{

    public function cadastro_evento()
    {

        $views = [
            'layout/head',
            'cabecario',
            'add_evento',
            'layout/footer',
        ];

        Functions::layout($views);
    }

    public function todos_eventos()
    {

        $db = new Eventos_model();
        $eventos = $db->get_eventos();
        // print_r($eventos);

        $resultado_com_filtro = [];

        foreach ($eventos as $evento) {
            $presenca_confirma = 'nao logado';
            if (isset($_SESSION['id_usuario'])) {
                $presenca_confirma = 0;
                $presen = new Eventos_model();
                $presenca = $presen->get_presenca($evento->id_evento);

                foreach ($presenca as $p) {

                    if ($p->id_usuario == $_SESSION['id_usuario']) {
                        $presenca_confirma = 1;
                    }
                }
            }



            $vh = 'Gratis';
            $vm = 'Gratis';


            if ($evento->valor_homem > 0) {
                $vh = $evento->valor_homem . ' R$';
            }
            if ($evento->valor_mulher > 0) {
                $vm = $evento->valor_mulher . ' R$';
            }

            $hi = date('H:i',  strtotime($evento->data_inicio));
            $hf = date('H:i',  strtotime($evento->data_fim));
            $di = date('d/m/y',  strtotime($evento->data_inicio));
            $df = date('d/m/y',  strtotime($evento->data_fim));



            $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexts', 'Sabado'];

            $dia_sem_num_i = date('w', strtotime($evento->data_inicio));
            $dia_sem_num_f = date('w', strtotime($evento->data_fim));


            $nome_dia_i =  $dias[$dia_sem_num_i];
            $nome_dia_f =  $dias[$dia_sem_num_f];


            $text_dia = '';

            if ($di ==  $df) {
                $text_dia = 'Dia ' . $di . ' ' . $nome_dia_i;
            } else {
                $text_dia = 'Dia ' . $di . ' ' . $nome_dia_i . ' à ' . $df . ' ' . $nome_dia_f;
            }




            $res = [
                'id_evento' => $evento->id_evento,
                'id_usuario' => $evento->id_usuario,
                'titulo' => substr($evento->titulo_evento, 0, 25),
                'descricao' => substr($evento->descricao, 0, 60) . '...',
                'valor_homem' => $vh,
                'valor_mulher' => $vm,
                'local' => substr($evento->local, 0, 28),
                'cidade' => $evento->cidade,
                'imagem' => $evento->imagem,
                'horario' => $hi . ' as ' . $hf,
                'data' => $text_dia,
                'presenca' => $presenca_confirma

            ];


            array_push($resultado_com_filtro, $res);
        }






        $r = json_encode($resultado_com_filtro);
        echo $r;


        // print_r($resultado_com_filtro);



    }





    public function form_cadastro_evento()
    {


        print_r($_POST);
        echo "teste";
    }

    public function ver_evento()
    {

        if (!isset($_GET['ev']) || empty($_GET['ev'])) {
            Functions::redirect('inicio');
        }
        $db = new Eventos_model();
        $evento = $db->get_eventos($_GET['ev']);

        if (count($evento) == 0) {
            Functions::redirect('inicio');
        }

        $dados = ['evento' => $evento[0]];

        $views = [
            'layout/head',
            'cabecario',
            'mostrar_evento',
            'layout/footer',

        ];

        Functions::layout($views, $dados);
    }

    public function confirmar_presenca(){
        $pre = new Presenca_model();
        $presenca = $pre->get_presenca_user($_POST['id_evento']);
       if(count($presenca) == 0){
            $res = $pre->insere_presenca($_POST['id_evento']);
           echo 0;
       }else{
            $pre->remove_presenca($presenca[0]->id_presenca);
            echo 1;
       }
    }
}
