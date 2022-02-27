<div class="container-fluid ">
  <div class="row">
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
            <div class=" col-2 ">
              <a class="btn btn-primary" href="?a=limpar_carrinho">Limpar carrihno</a>
              
            </div>
            <div class="col-1 mt-3 text-center">
              <h6>Endereço:</h6>
            </div>

            <div class="col-3">

              <form action="?a=continuar_compra" method="post">

                <select class="form-select" name="id_ende" aria-label=".form-select-sm example">
                  <?php foreach ($endereco as $ender) : ?>
                    <option selected value="<?= $ender->id_endere ?> "><?= $ender->nome . '   /   ' . $ender->rua ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="col-1 mt-3 text-center">
              <h6>Pagamento:</h6>
            </div>
            <div class="col-5">
             
            <input class="form-check-input" type="radio" name="pagamento" id="exampleRadios1" value="visa" checked>
  <label class="form-check-label" for="exampleRadios1">
  <i class="fa-brands fa-cc-visa"> Visa </i>
  </label>
  <input class="form-check-input" type="radio" name="pagamento" id="exampleRadios1" value="master" checked>
  <label class="form-check-label" for="exampleRadios1">
  <i class="fa-brands fa-cc-mastercard"> Masted </i>
  </label>
  <input class="form-check-input " type="radio" name="pagamento" id="exampleRadios1" value="boleto" checked>
  <label class="form-check-label" for="exampleRadios1">
  <i class="fa-solid fa-barcode"> Boleto </i>
  </label>

              <input type="submit" value="continuar" class="btn btn-success">
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
<?php endif; ?>
</div>
</div>
</div>
<br>




<img src="assets/images/alicate.jpg" style="width: 30rem;"class="img-fluid" alt="..." >
<br>

<br>

<br>

<br>

<br>
