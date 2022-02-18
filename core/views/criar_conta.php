<div class="container">
    <div class="row my-5">
        <div class="col-sm-4 offset-sm-4 ">
            <h3 class="text-center">Cadastrar</h3>

            <form action="?a=cadastrar_conta" method="post">

            <div class="my-2">
                <label>Nome:</label>
                <input type="text" name="text_nome" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Email:</label>
                <input type="email" name="text_email" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Telefone:</label>
                <input type="text" name="text_telefone" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Senha:</label>
                <input type="password" name="text_senha1" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Repita a senha:</label>
                <input type="password" name="text_senha2" class="form-control" require>
            </div>

            <div class="my-2">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </form>

                <?php if(isset($_SESSION['erro'])):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['erro']?>
                        <?php unset($_SESSION['erro']);?>
                    </div>
                <?php endif?>
        </div>
    </div>
</div>

