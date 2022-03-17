



<div class="container" style="margin-bottom: 60px;">
<div class="container mt-2 ">
    <div class="row">
    <di class="col-7">
        <h3 class="text-center my-3">Categorias</h3>

        <a href="?a=loja" class="btn btn-primary mx-1">Todas</a>
        <?php

use core\classes\Functions;

 foreach ($categorias as $categoria) :  ?>

            <a href="?a=loja_categoria&c=<?= $categoria->categoria ?>" class="btn btn-primary mx-1"><?= $categoria->categoria ?></a>

        <?php endforeach;    ?>
    </di>
    <div class="col-5 text-end">
    <h3 class="text-center my-3">. . .</h3>

    <a href="?a=loja" class="btn btn-success mx-1">Disponiveis</a>
<a href="?a=loja" class="btn btn-danger mx-1">Indisponiveis</a>
<a href="?a=loja" class="btn btn-primary mx-1">Adicionar um produto</a>
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
        <div class="col-4 offset-4 my-4">
            <form action="?a=buscar" method="post" class="d-flex">
                <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar">
                <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i></button>
            </form>

        </div>
        <?php if (isset($quantidade)) : ?>
            <div class="col-4 offset-4 my-4">
                <h4 class="text-center">Busca <?= $quantidade ?> resultado(s)</h4>
            </div>
        <?php endif; ?>
    </div>


    </div>
    <div class="row mt-5">
        <?php foreach( $produtos as $produto ):?>
        <div class="col-6 ">
            <div class="row">
        <div class="col-5">
        <img src="../assets/images/<?= $produto->imagem ?>" class="card-img-top t_image_admin shadow-lg p-3 mb-5 bg-body rounded" alt="...">
        </div>
        <div class="col-7 ">
        <p>Nome: <?=$produto->nome?></p>
        <p>Descrição: <?=$produto->descricao?></p>
        <p>Total disponiveis: <?=$produto->estoque?></p>
        <p>Categoria: <?=$produto->categoria?></p>
        <h6><?= preg_replace("/\./", ",", $produto->preco) ?> R$</h6>
       
        <a href="?a=editar_produto&id_pro=<?=Functions::encriptar($produto->id_produto)?>" class="btn btn-primary" >Editar</a>
        <?php if ($produto->estoque <= 0) : ?>
                                <button class="btn btn-danger ">Indisponivel</button>
                            <?php else : ?>
                                <button class="btn btn-success ">Disponivel</button>
                            <?php endif; ?>
        </div>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
