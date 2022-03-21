<div class="container my-5">
    <div class="row">
        <div class="col-6 offset-3">

            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <?php
                    $contador = 0;
                    foreach ($produtos as $produto) :
                        $contador++;
                    ?>

                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $contador ?>" aria-label="Slide 2"></button>

                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    $contador = 0;
                    foreach ($produtos as $produto) :
                        $contador++;
                    ?>

                        <div class="carousel-item <?= $contador == 1 ? 'active' : $contador ?>" data-bs-interval="1500">
                            <img src="assets/images/<?= $produto->imagem ?>" class="d-block w-100 carrocel" alt="...">
                            <div class="carousel-caption d-none d-md-block">

                                <div class="alert bg_carrosel" role="alert">
                                    <h5><?= $produto->nome ?></h5>
                                    <p><?= $produto->descricao ?></p>
                                    <h3><?= preg_replace("/\./", ",", $produto->preco) ?> R$</h3>
                                    <a class="btn btn-primary" href="?a=add_carrinho&id_p=<?= $produto->id_produto ?>&retorno=ok">adicionar ao carrinho</a>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



        </div>
    </div>
</div>
