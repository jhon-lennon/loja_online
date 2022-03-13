<div class="container">
    <div class="row " style="margin-bottom: 50px;">
        <div class="col-6 offset-3 mt-5">

            <h4 class="text-center my-5">Detalhes</h4>

            <hr>
            <h4>Cliente</h4>

            <strong><p>Nome: </strong> <?= $cliente->nome ?></p>
            <strong><p>Email: </strong> <?= $cliente->email  ?></p>
            <p><strong>Telefone: </strong> <?= $cliente->telefone ?></p>

            <hr>
            <h4>Compra</h4>

            <strong><p>Codigo da compra: </strong>  <?= $compras[0]->codigo_compra ?></p>
            <strong><p>Data: </strong> <?= $compras[0]->data_compra ?></p>
            <strong><p>Status: </strong> <?= $compras[0]->status ?></p>


            <hr>
            <h4>Endereço</h4>

            <strong><p>Cep: </strong> <?= $compras[0]->cep ?></p>
            <strong><p>Estado: </strong> <?= $compras[0]->estado ?></p>
            <strong><p>Cidade: </strong> <?= $compras[0]->cidade ?></p>
            <strong><p>Bairro: </strong> <?= $compras[0]->bairro ?></p>
            <strong><p>Rua: </strong> <?= $compras[0]->rua ?></p>
            <strong><p>Numero: </strong> <?= $compras[0]->numero ?></p>
            <strong><p>Complemento: </strong> <?= $compras[0]->complemento ?></p>
            <hr>

            <h4>Pagamento</h4>
            <hr>
            <strong><p>Pagamento: </strong> <?= $compras[0]->pagamento ?></p>
            <strong><p>Valor Total: </strong> <?=number_format( $compras[0]->valor_total , 2, ',', '.')?> R$</p>
            
            <hr>
            <h4>produtos</h4>
            <br>
            <table class="table table-primary">
                <thead>
                    <tr>

                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">quantidade</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($detalhes as $detalhe) : ?>
                        <tr>
                            <td><?= $detalhe->produto ?></td>
                            <td><?= number_format($detalhe->preco , 2, ',', '.')?> R$</td>
                            <td><?= $detalhe->quantidade  ?></td>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <p><a href="?a=vendas" class="btn btn-primary">Voltar</a></p>

        </div>
    </div>
</div>