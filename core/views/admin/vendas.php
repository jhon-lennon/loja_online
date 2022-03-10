<div class="container-fluid">
    <div class="row mt-5">
        <h1 class="text-center my-2">vendas</h1>
        <div class="col-2">
            <div class="alert alert-danger" role="alert">Pendentes <a href="?a=vendas_pendentes">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?=$pendentes ?>
                    <span class="visually-hidden">unread messages</span>
                </span></div>
            <div class="alert alert-warning" role="alert">em processamento <a href="">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    12
                    <span class="visually-hidden">unread messages</span>
                </span></div>
            <div class="alert alert-success" role="alert">concluidas <a href="?a=vendas_concluidas">ver</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    85
                    <span class="visually-hidden">unread messages</span>
                </span></div>

        </div>
    
    <div class="col-8 ">
        <table class="table table-primary">
            <thead>
                <tr>
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
                        <td><?= $venda->status ?></td>

                        <td><a href="?a=compra_detalhes&cod_c=<? $compra->codigo_compra ?>">Detalhes</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    </div>

</div>
