<div class="container">
    <div class="row">

        <div class="col-12 text-center my-4">
            <h3>Minha conta</h3>
        </div>

    <!--    <div class="col">
            <a class="btn btn-primary" href="?a=cadastrar_endereco">Cadastrar endereço</a>
        </div> -->
        <div class="col">
            <a class="btn btn-primary" href="?a=cadastrar_endereco">altera senha</a>
        </div>
        <div class="col">
            <a class="btn btn-primary" href="?a=cadastrar_endereco">Historico de compras</a>
        </div>
        <div class="col">
            <a class="btn btn-primary" href="?a=cadastrar_endereco">Alterar dados</a>
        </div>
        <div class="col">

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Meus endereços</button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Endereços</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php foreach ($endereco as $ender) : ?>
                        <div>
                            <div class="card w-75">
                                <div class="card-body">
                                    <h5 class="card-title"></b><?= $ender->nome ?></h5>
                                    <p class="card-text"></p>
                                    <p><b>CEP: </b><?= $ender->cep ?></p>
                                    <p><b>Estado: </b><?= $ender->estado ?></p>
                                    <p><b>Cidade: </b><?= $ender->cidade ?></p>
                                    <p><b>Bairro: </b><?= $ender->bairro ?></p>
                                    <p><b>Rua: </b><?= $ender->rua ?></p>
                                    <p><b>Numero: </b><?= $ender->numero ?></p>
                                    <p><b>complemento: </b><?= $ender->complemento ?></p>
                                    <a href="?a=editar_endereco&id_end=<?= $ender->id_endere ?>" class="btn btn-primary">Editar</a>
                                    <a href="" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Adicionar endereço</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="?a=endereco_form" method="post" class="row g-3">


                                <div class="col-7">
                                    <label for="inputAddress" class="form-label">Rua</label>
                                    <input type="text" class="form-control" name="rua" placeholder="Rua / Avenida" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputZip" class="form-label">Numero</label>
                                    <input type="text" class="form-control" name="numero" placeholder="1000" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" placeholder="minha casa" required>
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress2" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" placeholder="bairro /setor /vila" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Complemento</label>
                                    <input type="text" class="form-control" name="comp" placeholder="Apartamento / comdominio residencial" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputState" class="form-label">Estado</label>
                                    <select id="inputState" name="estado" class="form-select">
                                        <option selected>Goias</option>
                                        <option>Distrito Federal</option>
                                        <option selected>Tocantins</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">CEP</label>
                                    <input type="text" class="form-control" name="cep" placeholder="00000000" required>
                                </div>
                                <hr>
                                <div class="col- offset-7">
                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    Content for the offcanvas goes here. You can place just about any Bootstrap component or custom elements here.
  </div>
</div>
<br>
<br><br>
<br>
<br>
<p>f</p>
    </div>
</div>