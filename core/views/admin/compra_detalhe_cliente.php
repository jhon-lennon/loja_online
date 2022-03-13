<div class="container">
    <div class="row " style="margin-bottom: 50px;">

        <div class="col-6 mt-5">
            <h4 class="text-center">Detalhes</h4>

        </div>


        <div class="col-6 mt-5 ">


            <?php if ($compras[0]->status == 'em processamento') : ?>
                <div class="text-end">
                    <button class="btn btn-warning">Compra em processamento</button>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Alterar status</a>
                </div>


                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Insira o codigo de rastramento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label>Codigo de rastreio: </label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-2">
                                            <input class="btn btn-success" type="submit" value="Enviar">
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancelar venda</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Insira o motivo do cancelamento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label>Motivo: </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-4">
                                            <input class="btn btn-danger" type="submit" value="Cancelar venda">
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sair</button>

                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif ($compras[0]->status == 'enviada') : ?>
                <div class="text-end">
                    <button class="btn btn-success">Compra enviada</button>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Alterar status</a>
                </div>
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Finalizar compra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a href="" class="btn btn-success">Concluir venda</a>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancelar venda</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Insira o motivo do cancelamento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label>Motivo: </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-4">
                                            <input class="btn btn-danger" type="submit" value="Cancelar venda">
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sair</button>

                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($compras[0]->status == 'aguardando pagamento') : ?>
                <div class="text-end">
                    <button class="btn btn-danger">Aguardando pagamento</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cancelar venda
                    </button>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Insira o motivo do cancelamento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label>Motivo: </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-4">
                                            <input class="btn btn-danger" type="submit" value="Cancelar venda">
                                        </div>

                                    </div>

                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">sair</button>
                                </div>
                            </div>
                        </div>
                    </div>
                

            <?php elseif ($compras[0]->status == 'cancelada') : ?>
                <div class="text-end">
                    <button class="btn btn-danger">Compra cancelada</button>
                </div>

            <?php elseif ($compras[0]->status == 'concluida') : ?>
                <div class="text-end">
                    <button class="btn btn-success">Compra concluida</button>
                </div>

            <?php endif; ?>


        </div>

        <div class="col-6 ">
            <hr>
            <h4>Cliente</h4>

            <strong>
                <p>Nome:
            </strong> <?= $cliente->nome ?></p>
            <strong>
                <p>Email:
            </strong> <?= $cliente->email  ?></p>
            <p><strong>Telefone: </strong> <?= $cliente->telefone ?></p>
        </div>
        <div class="col-6 ">
            <hr>
            <h4>Pagamento</h4>

            <strong>
                <p>Pagamento:
            </strong> <?= $compras[0]->pagamento ?></p>
            <strong>
                <p>Valor Total:
            </strong> <?= number_format($compras[0]->valor_total, 2, ',', '.') ?> R$</p>

        </div>

        <div class="col-6 ">
            <hr>
            <h4>Compra</h4>

            <strong>
                <p>Codigo da compra:
            </strong> <?= $compras[0]->codigo_compra ?></p>
            <strong>
                <p>Data:
            </strong> <?= $compras[0]->data_compra ?></p>
            <strong>
                <p>Status:
            </strong> <?= $compras[0]->status ?></p>

            <hr>
            <h4>Endereço</h4>

            <strong>
                <p>Cep:
            </strong> <?= $compras[0]->cep ?></p>
            <strong>
                <p>Estado:
            </strong> <?= $compras[0]->estado ?></p>
            <strong>
                <p>Cidade:
            </strong> <?= $compras[0]->cidade ?></p>
            <strong>
                <p>Bairro:
            </strong> <?= $compras[0]->bairro ?></p>
            <strong>
                <p>Rua:
            </strong> <?= $compras[0]->rua ?></p>
            <strong>
                <p>Numero:
            </strong> <?= $compras[0]->numero ?></p>
            <strong>
                <p>Complemento:
            </strong> <?= $compras[0]->complemento ?></p>
            <hr>
        </div>




        <div class="col-6 ">
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
                            <td><?= number_format($detalhe->preco, 2, ',', '.') ?> R$</td>
                            <td><?= $detalhe->quantidade  ?></td>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <p><a href="?a=vendas" class="btn btn-primary">Voltar</a></p>

        </div>

    </div>
</div>