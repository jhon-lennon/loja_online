<div class="container-fluid ">
  <div class="row" style="margin-bottom: 60px;">
    <div class="col-sm-10 offset-1">
      <h3 class="text-center mt-5">Carrinho</h3>
      <hr>
      <?php if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) : ?>
        <h3 class="text-center">Carrinho Vazio</h3>
        <div class="text-center"><a href="?a=loja" class="btn btn-primary">voltar a loja</a></div>
      <?php else : ?>
        <table class="table table-success">
          <thead>
            <tr>
              <th><i class="fa-solid fa-cart-shopping"></i></th>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Preço</th>
              <th>Total</th>
              <th>Opçoõs</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($carrinho as $item) : ?>
              <tr>
                <td><img src="assets/images/<?= $item['imagem'] ?>" width="30px" height="30px"></td>
                <td><?= $item['nome'] ?></td>
                <td><?= $item['quant'] ?></td>
                <td><?= number_format($item['preco'], 2, ',', '.') . ' R$' ?></td>
                <td><?= number_format($item['total'], 2, ',', '.') . ' R$'  ?></td>
                <td><a href="?a=adicionar_item_carrinho&id_p=<?= $item['id_pro'] ?>"><i class="fa-solid fa-plus btn btn-primary"></i></a>
                  <a href="?a=diminuir_item_carrinho&id_item=<?= $item['id_pro'] ?>"><i class="fa-solid fa-minus btn btn-primary"></i></a>
                  <a href="?a=apagar_item_carrinho&id_item=<?= $item['id_pro'] ?>"><i class="fa-solid fa-trash-can btn btn-danger"></i>
                </td></a>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong> </td>
              <td></td>
              <td><strong><?= $_SESSION['total'] ?></strong></td>
              <td></td>
              <td><strong><?= number_format($total, 2, ',', '.') . ' R$' ?></strong></td>
              <td><a class="btn btn-primary" href="?a=loja">voltar pra loja</a></td>
            </tr>
          </tbody>
        </table>


        <div class="container-fluid">
          <div class="row">
            <div class=" col-2 mt-4">
              <a class="btn btn-primary" href="?a=limpar_carrinho">Limpar carrihno</a>

            </div>




            <?php if (isset($_SESSION['usuario']) && !empty($endereco)) : ?>

              <div class="col-3">
                <form action="?a=continuar_compra" method="post">
                  <label for="inputState" class="form-label">Endereço: </label>
                  <select class="form-select" name="id_ende" aria-label=".form-select-sm example">
                    <?php foreach ($endereco as $ender) : ?>
                      <option selected value="<?= $ender->id_endere ?> "><?= $ender->nome . '   /   ' . $ender->rua ?></option>
                    <?php endforeach; ?>
                  </select>


              </div>


              <div class="col-2">

                <label for="inputState" class="form-label">Pagamento: </label>
                <select id="inputState" name="pagamento" class="form-select">
                  <option selected>Boleto</option>
                  <option>Visa</option>
                  <option>Master card</option>
                </select>

              </div>


              <div class="col-2 mt-4">
                <input type="submit" value="continuar" class="btn btn-success">
                </form>
              </div>





            <?php elseif (isset($_SESSION['usuario']) and empty($endereco)) : ?>
              <div class="col-4 mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fas fa-map-marker-alt"></i> Adicione um endereço para continuar</button>
              </div>
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


            <?php elseif (!isset($_SESSION['usuario'])) : ?>

              <div class="col-2 mt-4">
                <a href="?a=login" class="btn btn-success">Continuar</a>
              </div>

            <?php endif; ?>

          

          </div>


        </div>


     <?php endif; ?>   
    </div>
    <?php if (isset($_SESSION['erro_car'])) : ?>
              <div class="col-6 offset-3 mt-4">
                <div class="alert alert-danger" role="alert">
                  <h4 class="text-center"><i class="fas fa-exclamation-triangle"></i> Atençao carrinho atualizado</h4>
                  <hr>
                  <?php foreach ($_SESSION['erro_car'] as $mensagem) : ?>

                    <p class="text-center"><?= $mensagem ?></p>

                  <?php endforeach; ?>
                  <hr>
                  <h6 class="text-center">Revise seu carrinho</h6>
                  <?php unset($_SESSION['erro_car']); ?>


                </div>
              </div>
            <?php endif ?>
  </div>
</div>





