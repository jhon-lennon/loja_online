<div class="container" style="margin-bottom: 60px;">
    <div class="container mt-2 ">
        <div class="row">
            <di class="col-7">
                <h3 class="text-center my-3">Categorias</h3>

                <a href="?a=produtos" class="btn btn-primary mx-1">Todas</a>
                <?php

                use core\classes\Functions;

                foreach ($categorias as $categoria) :  ?>

                    <a href="?a=produtos_categoria&c=<?= $categoria->categoria ?>" class="btn btn-primary mx-1"><?= $categoria->categoria ?></a>

                <?php endforeach;    ?>
            </di>
            <div class="col-5 text-end">
                <h3 class="text-center my-3">Filtros</h3>

                <a href="?a=produtos_disponiveis" class="btn btn-success mx-1">Disponiveis</a>
                <a href="?a=produtos_indisponiveis" class="btn btn-danger mx-1">Indisponiveis</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pesquisar estoque
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="?a=filtro_quantidade" method="post">

                                            <label>Produtos com estoque abaixo ou iqual a  </label>
                                      
                                            <input  type="number" name="quant">
                                       
                                        <button class="btn btn-primary " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-2">
            <div class="row">
                <div class="col-sm-4 offset-4 text-center">
                    <?php if (empty($produtos)) {
                        echo " <h1> 0 resultado</h1>";
                    } ?>
                </div>
            </div>
        </div>

        <div class="container my-2">
            <div class="row">
                <div class="col-4 offset-2 my-4">
                    <form action="?a=buscar_produtos" method="post" class="d-flex">
                        <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i></button>

                    </form>
                </div>
                <div class="col-6 my-4">

                    <a href="?a=adicionar_produto" class="btn btn-primary mx-1">Adicionar um produto</a>

                </div>
            </div>


            <?php if (isset($quantidade)) : ?>
                <div class="col-4 offset-4 my-4">
                    <h4 class="text-center">Busca <?= $quantidade ?> resultado(s)</h4>
                </div>
            <?php endif; ?>
        </div>


    </div>
    <div class="row mt-5">
        <?php foreach ($produtos as $produto) : ?>
            <div class="col-6 ">
                <div class="row">
                    <div class="col-5">
                        <img src="../assets/images/<?= $produto->imagem ?>" class="card-img-top t_image_admin shadow-lg p-3 mb-5 bg-body rounded" alt="...">
                    </div>
                    <div class="col-7 ">
                        <p>Nome: <?= $produto->nome ?></p>
                        <p>Descrição: <?= $produto->descricao ?></p>
                        <p>Total disponiveis: <?= $produto->estoque ?></p>
                        <p>Categoria: <?= $produto->categoria ?></p>
                        <h6><?= preg_replace("/\./", ",", $produto->preco) ?> R$</h6>

                        <a href="?a=editar_produto&id_pro=<?= Functions::encriptar($produto->id_produto) ?>" class="btn btn-primary">Editar</a>
                        <?php if ($produto->estoque <= 0) : ?>
                            <span style="cursor: none" class="btn btn-danger ">Indisponivel</span>
                        <?php else : ?>
                            <span style="cursor: none;" class="btn btn-success ">Disponivel</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>