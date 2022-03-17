<div class="container-fluid">
    <div class="row">

        <div class="col-6 ">
            <h3 class="text-center my-5">Produto</h3>
            <div class="row">
                <div class="col-6">
                    <img src="../assets/images/<?= $produto->imagem ?>" class="card-img-top t_image_admin_edit shadow-lg p-3 mb-5 bg-body rounded rounded float-end" alt="...">
                </div>
                <div class="col-6 text-start">
                    <p><strong>Nome:</strong>  <?= $produto->nome ?></p>
                    <p><strong>Descrição: </strong> <?= $produto->descricao ?></p>
                    <p><strong>Total disponiveis: </strong>  <?= $produto->estoque ?></p>
                    <p><strong>Categoria: </strong><?= $produto->categoria ?></p>
                    <p><strong>Peço: </strong><?= preg_replace("/\./", ",", $produto->preco) ?> R$</p>
                </div>
            </div>


        </div>
        <div class="col-6 ">
            <h3 class="text-center my-5">Editar</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col-8">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="" value="<?= $produto->nome ?>">
                    </div>
                                      <div class="col-2">
                        <label class="form-label">Preço:</label>
                        <input class="form-control" type="text" name="" value="<?= $produto->preco ?>">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Quantidade:</label>
                        <input class="form-control" type="text" name="" value="<?= $produto->estoque ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descrição:</label>
                        <input class="form-control" type="text" name="" value="<?= $produto->descricao ?>">
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Imagem:</label>
                        <input class="form-control" type="file" id="formFile" value="<?= $produto->imagem?>">
                    </div>
                       <div class="col ">
                           <br>
                           <button class="btn btn-primary " type="submit" value="Atualizar">atualizar</button> 
                       </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>