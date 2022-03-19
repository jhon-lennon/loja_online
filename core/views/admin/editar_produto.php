<?php

use core\classes\Functions;
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-6 ">
            <h3 class="text-center my-5">Produto</h3>
            <div class="row">
                <div class="col-6">
                    <img src="../assets/images/<?= $produto->imagem ?>" class="card-img-top t_image_admin_edit shadow-lg p-3 mb-5 bg-body rounded rounded float-end" alt="...">
                </div>
                <div class="col-6 text-start">
                    <p><strong>Nome:</strong> <?= $produto->nome ?></p>
                    <p><strong>Descrição: </strong> <?= $produto->descricao ?></p>
                    <p><strong>Total disponiveis: </strong> <?= $produto->estoque ?></p>
                    <p><strong>Categoria: </strong><?= $produto->categoria ?></p>
                    <p><strong>Peço: </strong><?= preg_replace("/\./", ",", $produto->preco) ?> R$</p>
                </div>
            </div>


        </div>
        <div class="col-6 ">
            <h3 class="text-center my-5">Editar</h3>
            <form action="?a=atualizar_produto_submit&id_pro=<?= Functions::encriptar($produto->id_produto) ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= $produto->nome ?>">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Preço:</label>
                        <input class="form-control" type="text" name="preco" value="<?= $produto->preco ?>">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Quantidade:</label>
                        <input class="form-control" type="text" name="quant" value="<?= $produto->estoque ?>">
                    </div>
                    <div class="col-8">
                        <label class="form-label">Descrição:</label>
                        <input class="form-control" type="text" name="desc" value="<?= $produto->descricao ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Categoria:</label>
                        <input class="form-control" type="text" name="categ" value="<?= $produto->categoria ?>">
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Imagem:</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                    <div class="col ">
                        <br>
                        <button class="btn btn-primary " type="submit" value="Atualizar">atualizar</button>
                        <a class="btn btn-primary" href="?a=produtos">Voltar</a>
                        

                    <a class="btn btn-danger" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Excluir</a>
                
                <!--apresenta modal para concluir a conpra-->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Excluir Produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <span>Deeja realmente excluir esse produto?</span> 
                            </div>
                            <div class="modal-footer">
                            <a class="btn btn-danger text-end" href="?a=excluir_produto&id_pro=<?= Functions::encriptar($produto->id_produto)?>">Excluir</a>
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </form>

            <?php if(isset($_SESSION['erro'])):?>
                    <div class="alert alert-danger text-center mt-3" role="alert">
                        <?= $_SESSION['erro']?>
                        <?php unset($_SESSION['erro']) ;?>
                    </div>
                <?php endif?>
        </div>





    </div>
</div>
</div>