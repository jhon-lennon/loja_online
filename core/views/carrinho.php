<div class="container-fluid bgg">
  <div class="row">
    <div class="col-sm-9 offset-1">
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
                <td><?= number_format($item['preco'],2,',','.').' R$' ?></td>
                <td><?= number_format($item['total'],2,',','.').' R$'  ?></td>
                <td><a href="?a=adicionar_item_carrinho&id_p=<?=$item['id_pro']?>"><i class="fa-solid fa-plus btn btn-primary"></i></a>
                    <a href="?a=diminuir_item_carrinho&id_item=<?=$item['id_pro']?>"><i class="fa-solid fa-minus btn btn-primary"></i></a>
                    <a href="?a=apagar_item_carrinho&id_item=<?=$item['id_pro']?>"><i class="fa-solid fa-trash-can btn btn-danger"></i></td></a>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong> </td>
              <td></td>
              <td><strong><?= $_SESSION['total'] ?></strong></td>
              <td></td>
              <td><strong><?=number_format($total,2,',','.').' R$' ?></strong></td>
              <td><a class="btn btn-success btn-sm" href="?a=finalizar_compra">Finalizar comprar</a></td>
            </tr>
          </tbody>
        </table>
        <div class="my-5">
          <a class="btn btn-primary" href="?a=limpar_carrinho">Limpar carrihno</a>
          <a class="btn btn-primary" href="?a=loja">Continuar comprando</a>
        </div>
        <i class="&#xF267"></i>
        
      <?php endif; ?>
    </div>
  </div>
</div>