<div class="container">
  <div class="row">
    <div class="col-sm-8 offset-2">
      <div class="my-4 text-center">
        <h3>Adicionar endereço</h3>
      </div>


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
        
        <div class="col-md-4">
          <label for="inputState" class="form-label">Estado</label>
          <select id="inputState" name="estado" class="form-select">
            <option selected>Goias</option>
            <option>Distrito Federal</option>
            <option selected>Tocantins</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">CEP</label>
          <input type="text" class="form-control" name="cep" placeholder="00000000" required>
        </div>


        <div class="col-12">
          <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
      </form>

      <?php if (isset($_SESSION['erro'])) : ?>
        <div class="alert alert-danger my-2" role="alert">
          <p><?= $_SESSION['erro'] ?></p>
          <?php unset($_SESSION['erro']);?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>