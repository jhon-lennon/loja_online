




<div class=" mt-2">


<div class="container mt-2 ">
    <a href="?a=loja" class="btn btn-primary mx-1">Todas</a>
    <?php foreach ($categorias as $categoria) :  ?>

    <a href="?a=loja_categoria&c=<?= $categoria->categoria ?>" class="btn btn-primary mx-1"><?= $categoria->categoria ?></a>

    <?php endforeach;    ?>


</div>


<div class="container my-2">
    <div class="row">
        <div class="col-sm-4 offset-4 text-center">
            <?php if (empty($produtos)) {echo" <h1> 0 resultado</h1>"; }?>
        </div>
    </div>
</div>





<div class="container my-2">
    <div class="col-4 offset-4 my-4">
        <form action="?a=buscar" method="post" class="d-flex">
    <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar">
    <button class="btn btn-primary" type="submit" >  <i class="fas fa-search"></i></button>
   <!-- <input class="btn btn-primary" type="submit" value="buscar" >-->
    </form>

    </div>
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php foreach ($produtos as $produto) :  ?>
            <div class="col ">
                <div class="card h-90">
                    <img src="assets/images/<?= $produto->imagem ?>" class="card-img-top t_image shadow-lg p-3 mb-5 bg-body rounded" alt="...">
                    <div class="card-body text-center">
                        
                        <h5 class="card-title "><?= $produto->nome ?></h5>
                        <p class="card-text "><?= $produto->descricao ?></p>
                        <p><h3><?= preg_replace("/\./",",",$produto->preco) ?> R$</h3></p>
                        <?php if($produto->estoque <=0 ): ?>
                            <button class="btn btn-danger ">Indisponivel</button>
                        <?php else: ?>
                            <a href="?a=add_carrinho&id_p=<?=$produto->id_produto ?>" class="btn btn-primary ">Adicionar ao carrinho</a>
                        <?php endif;?>
                        
                    </div>
                </div>
            </div>
        <?php endforeach;    ?>
    </div>
</div>

</div>