<div class="container">
    <div class="row " style="margin-bottom: 50px;">
        <div class="col-6 offset-3 mt-5">

            <h4 class="text-center my-5">Detalhes</h4>


            <hr>
            <h4>Compra</h4>

            <p>Codigo da compra: <?= $compras[0]->codigo_compra ?></p>
            <p>Data: <?= date('d/m/Y - H:i',strtotime($compras[0]->data_compra)).'H'?></p>
            <p>Ultima atualização: <?= date('d/m/Y - H:i',strtotime($compras[0]->updated_at)).'H' ?></p>
            <?php if($compras[0]->codigo_rastreio != null): ?>
            <p>codigo de rastreio: <?= $compras[0]->codigo_rastreio?></p>
            <?php endif; ?>
            <p>Status: <?= $compras[0]->status ?></p>

           <?php

                        use core\classes\Functions;

 if($compras[0]->status == 'aguardando pagamento'): ?>
            <a href="?a=simular_pagamento&cod_c=<?=Functions::encriptar($compras[0]->codigo_compra)?>">simular pagamento</a>
           <?php endif;?>



            <hr>
            <h4>Endereço</h4>

            <p>Cep: <?= $compras[0]->cep ?></p>
            <p>Estado: <?= $compras[0]->estado ?></p>
            <p>Cidade: <?= $compras[0]->cidade ?></p>
            <p>Bairro: <?= $compras[0]->bairro ?></p>
            <p>Rua: <?= $compras[0]->rua ?></p>
            <p>Numero: <?= $compras[0]->numero ?></p>
            <p>Complemento: <?= $compras[0]->complemento ?></p>
            <hr>

            <h4>Pagamento</h4>
            <hr>
            <p>Pagamento: <?= $compras[0]->pagamento ?></p>
            <p>Valor Total: <?=number_format( $compras[0]->valor_total , 2, ',', '.')?> R$</p>
            
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
            <p><a href="?a=minhas_compras" class="btn btn-primary">Voltar</a></p>

        </div>
    </div>
</div>