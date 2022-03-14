
<?php

use core\classes\Functions;

 ?>

<div class="container">
    <div class="row mt-5 " style="margin-bottom: 60px;">
        <h4 class="text-center my-2"><?= $titulo ?></h4>
        <hr>
        <div class="col-3">
            <div class="alert alert-danger text-center" role="alert">Aguardando pagamento <a href="?a=vendas_aguardando_pagamento">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $agardando_pagamento ?>
                    <span class="visually-hidden">unread messages</span>
                </span></div>
            <div class="alert alert-warning text-center" role="alert">Em processamento <a href="?a=vendas_em_processamento">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $em_processamento ?>
                    <span class="visually-hidden">unread messages</span>
                </span></div>
            <div class="alert alert-primary text-center" role="alert">Enviadas <a href="?a=vendas_enviadas">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $enviadas ?>
                    <span class="visually-hidden">unread messages</span>
                </span></div>

            <div class="alert alert-success text-center" role="alert">Concluidas <a href="?a=vendas_concluidas">ver</a></div>
            <div class="alert alert-secondary text-center" role="alert">Canceladas <a href="?a=vendas_canceladas">ver</a></div>
            <div class="alert alert-dark text-center" role="alert">Todas <a href="?a=vendas">ver</a></div>
        </div>

        <div class="col-9 ">
            <table class="table table-secondary" id="tabela-vendas">
                <thead>
                    <tr class="table table-dark">
                        <th scope="col">Data</th>
                        <th scope="col">Cod. Compra</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendas as $venda) : ?>
                        <tr>
                            <td><?= $venda->data_compra ?></td>
                            <td><?= $venda->codigo_compra ?></td>
                            <td><?= $venda->status?></td>

                            <td><a href="?a=compra_detalhes&id_compra=<?= Functions::encriptar($venda->id_compra )?>&id_cli=<?= Functions::encriptar($venda->id_usuario)?>&cod_compra=<?= Functions::encriptar($venda->codigo_compra)?>">Detalhes</a></td>
                        </tr>
                    <?php endforeach; ?>
                    

                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#tabela-vendas').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ resultatdos por pargina",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "visualizando _PAGE_ pagiana no total de _PAGES_",
                "infoEmpty": "Nenhum resultado encontrado",
                "infoFiltered": "(filtrado de um total _MAX_ vendas)",
                "search": "Pesquisar:",
                "paginate": {
                    "first": "Primeiro",
                    "last": "Ultimo",
                    "next": "Proximo",
                    "previous": "Anterior"
                }
            }

        });
    });
</script>