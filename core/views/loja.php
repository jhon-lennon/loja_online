




<div class="bgg pt-2">

<div class="container mt-2 ">
    <a href="?a=loja" class="btn btn-primary mx-1">Todas</a>
    <?php foreach ($categorias as $categoria) :  ?>

    <a href="?a=loja_categoria&c=<?= $categoria->categoria ?>" class="btn btn-primary mx-1"><?= $categoria->categoria ?></a>

    <?php endforeach;    ?>


</div>


<div class="container my-5">
    <div class="row">
        <div class="col-sm-4 offset-4 text-center">
            <?php if (empty($produtos)) {echo" <h1> 0 resultado</h1>"; }?>
        </div>
    </div>
</div>





<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php foreach ($produtos as $produto) :  ?>
            <div class="col">
                <div class="card h-90">
                    <img src="assets/images/<?= $produto->imagem ?>" class="card-img-top t_image" alt="...">
                    <div class="card-body text-center">
                        
                        <h5 class="card-title "><?= $produto->nome ?></h5>
                        <p class="card-text "><?= $produto->descricao ?></p>
                        <p><h3><?= $produto->preco ?> R$</h3></p>
                        <a href="?a=add_carrinho&id_p=<?=$produto->id_produto ?>&nome=<?=$produto->nome ?>&preco=<?=$produto->preco ?>&img=<?=$produto->imagem ?>" class="btn btn-primary ">Adicionar ao carrinho</a>
                        
                    </div>
                </div>
            </div>
        <?php endforeach;    ?>
    </div>
</div>
</div>