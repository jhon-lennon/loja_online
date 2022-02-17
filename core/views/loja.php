




<div class="bgg pt-2">

<div class="container mt-2 ">
    <a href="?a=loja" class="btn btn-primary mx-1">Todas</a>
    <?php foreach ($categorias as $categoria) :  ?>

    <a href="?a=loja_categoria&c=<?= $categoria->categoria ?>" class="btn btn-primary mx-1"><?= $categoria->categoria ?></a>

    <?php endforeach;    ?>


</div>

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php foreach ($produtos as $produto) :  ?>
            <div class="col">
                <div class="card h-90">
                    <img src="assets/images/<?= $produto->imagem ?>" class="card-img-top t_image" alt="...">
                    <div class="card-body ">
                        
                        <h5 class="card-title"><?= $produto->nome ?></h5>
                        <p class="card-text "><?= $produto->descricao ?></p>
                        <p><h3>R$ <?= $produto->preco ?></h3></p>
                        <div class="text-center">
                        <a href="" class="btn btn-primary ">Adicionar ao carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;    ?>
    </div>
</div>
</div>