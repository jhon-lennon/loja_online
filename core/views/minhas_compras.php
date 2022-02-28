<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <hr>
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
                    <?php foreach($compras as $compra ):?>
                    <tr>
                        <td><?=$compra->data_compra ?></td>
                        <td><?=$compra->codigo_compra ?></td>
                        <td><?=$compra->status ?></td>
                        
                        <td><a href="?a=compra_detalhes&cod_c=<?=$compra->codigo_compra ?>">Detalhes</a></td>
                    </tr>
                    <?php endforeach; ?>
                  
                </tbody>
            </table>
            <p><a href="?a=minha_conta" class="btn btn-primary">Voltar</a></p>
        </div>
    </div>
</div>


      