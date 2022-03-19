<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h3 class="text-center my-5">Cadastrar produto</h3>
            <form action="?a=adicionar_produto_submit" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8 ">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Preço:</label>
                        <input class="form-control" type="text" name="preco" placeholder="00.00">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Quantidade:</label>
                        <input class="form-control" type="text" name="quant">
                    </div>
                    <div class="col-8">
                        <label class="form-label">Descrição:</label>
                        <input class="form-control" type="text" name="desc">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Categoria:</label>
                        <input class="form-control" type="text" name="categ">
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Imagem:</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                    <div class="col ">
                        <br>
                        <button class="btn btn-primary " type="submit">Cadastrar</button>
                        <a class="btn btn-primary" href="?a=produtos">Voltar</a>
                    </div>
                </div>
            </form>

            <?php if (isset($_SESSION['erro'])) : ?>
                <div class="alert alert-danger text-center mt-3" role="alert">
                    <?= $_SESSION['erro'] ?>
                    <?php unset($_SESSION['erro']); ?>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION['cadastrado'])) : ?>
                <div class="alert alert-success text-center mt-3" role="alert">
                    <?= $_SESSION['cadastrado'] ?>
                    <?php unset($_SESSION['cadastrado']); ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>