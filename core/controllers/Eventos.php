<?php

namespace core\controllers;

use core\classes\Functions;
use core\models\Admin as ModelsAdmin;
use core\models\Eventos_model;

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
        print_r($eventos);

        $resultado_com_filtro = [];

        foreach ($eventos as $evento) {

            $vh = 'Gratis';
            $vm = 'Gratis';


            if ($evento->valor_homem > 0) {
                $vh = $evento->valor_homem;
            }
            if ($evento->valor_mulher > 0) {
                $vm = $evento->valor_mulher;
            }

            $hi = date('H:i',  strtotime($evento->data_inicio));
            $hf = date('H:i',  strtotime($evento->data_fim));
            $di = date('d/m/y',  strtotime($evento->data_fim));
            $df = date('d/m/y',  strtotime($evento->data_fim));



            





            $res = [
                'id_evento' => $evento->id_evento,
                'id_usuario' => $evento->id_usuario,
                'titulo' => substr($evento->titulo_evento, 0, 25),
                'descricao' => substr($evento->descricao, 0, 60) . '...',
                'valor_homem' => $vh,
                'valor_mulher' => $vm,
                'local' => substr($evento->local, 0, 30),
                'cidade' => $evento->cidade,
                'imagem' => $evento->imagem,
                'horario' => $hi . ' as ' . $hf,
                'data' => 'Dia '.$di.' > '.$df

            ];



            //array_push($teste, ['nome' => 'jhon']);


            array_push($resultado_com_filtro, $res);
        }

        /*    [id-evento] => 6
        [id_usuario] => 1
        [titulo_evento] => Festival do chambarí
        [descricao] => descriçao: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas molestiae consectetur error, laboriosam architecto doloribus ad commodi repudiandae consequuntur totam quas tempore reiciendis, blanditiis, delectus autem temporibus dolor molestias. Eos.
        [valor_homen] => 10.00
        [valor_mulher] => 10.00
        [data_inicio] => 2022-05-01 06:44:08
        [data_fim] => 2022-05-01 06:44:12
        [local] => Parque de exposiçao
        [endereco] => avenida araguaia 5567
        [cidade] => araguatins - TO
        [imagem] => festa_do_peixe.jpg
 */






 $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];


 $hoje = date('Y-m-d');

 $dia_sem_num = date('w', strtotime($hoje));

echo $dias[$dia_sem_num];













        //  $r = json_encode($resultado_com_filtro);
        //  echo $r;


        print_r($resultado_com_filtro);
        //


    }





    public function form_cadastro_evento()
    {


        print_r($_POST);
        echo "teste";
    }
}
