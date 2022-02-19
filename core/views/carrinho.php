

<div class=" container- fuiter bgg ">
<div class="container my-5">
<table class="table table-dark table-borderless">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Total</th>
      <th scope="col">opçoes</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($carrinho as $car):  ?>
    <tr>
      <td><?= $car->nome_produto ?></td>
      <td><?= $car->preco ?></td>
      <td><?= $car->quantidade ?></td>
      <td><?= $car->total ?></td>

      <td>opçoes</td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>

