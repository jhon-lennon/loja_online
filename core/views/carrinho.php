
<a class="btn btn-primary" href="?a=limpar_carrinho">limpar carrihno</a>
<pre>
<?php if($carrinho == null): ?>
  <p>carrinho vazio</p>
<?php else: ?>
  <?php print_r($carrinho); ?>
<?php endif; echo $total;?>

</pre>
