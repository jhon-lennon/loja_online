<div class="container bgg">
    <div class="row">
        <div class="col-sm-8 offset-2">
        <h4 class="text-center text-white mt-5 p-1 bg-dark bg-gradient">Compra</h4>
            <hr>
            <?php if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) : ?>
                <h3 class="text-center">Carrinho Vazio</h3>
                <div class="text-center"><a href="?a=loja" class="btn btn-primary">voltar a loja</a></div>
            <?php else : ?>
                <table class="table table-success">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Total</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($carrinho as $item) : ?>
                            <tr>
                                <td><?= $item['nome'] ?></td>
                                <td><?= $item['quant'] ?></td>
                                <td><?= number_format($item['preco'], 2, ',', '.') . ' R$' ?></td>
                                <td><?= number_format($item['total'], 2, ',', '.') . ' R$'  ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td><strong>Total</strong> </td>
                            <td></td>
                            <td><strong><?= $_SESSION['total'] ?></strong></td>

                            <td><strong><?= number_format($total, 2, ',', '.') . ' R$' ?></strong></td>

                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        </div>
        <div class="container">
            <div class="row">
        <div class="col-sm-4 offset-2">
        <h4 class="text-center text-white mt-5 p-1 bg-dark bg-gradient">Cliente</h4>
            <hr>
            <p><b>Nome: </b><?=$_SESSION['nome'] ?></p>
            <p><b> Email: </b><?=$_SESSION['usuario'] ?></p>
            <p><b>Telefone: </b><?=$_SESSION['telefone'] ?></p>
            </div>
            <div class="col-sm-4">

            <h4 class="text-center text-white mt-5 p-1 bg-dark bg-gradient">Endereço</h4>
            <hr>
            <p><b>CEP: </b><?=$endereco[0]->cep ?></p>
            <p><b>Estado: </b><?=$endereco[0]->estado ?></p>
            <p><b>Cidade: </b><?=$endereco[0]->cidade ?></p>
            <p><b>Bairro: </b><?=$endereco[0]->bairro ?></p>
            <p><b>Rua: </b><?=$endereco[0]->rua ?></p>
            <p><b>Numero: </b><?=$endereco[0]->numero?></p>
            <p><b>complemento: </b><?=$endereco[0]->complemento ?></p>

        </div>
        </div>
        </div>
    
</div>