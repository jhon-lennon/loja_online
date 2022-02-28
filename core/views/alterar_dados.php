<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="modal-body">
                <div class="col-6 offset-3">
                    <h4 class="text_center my-5">Alerar Dados</h4>
                </div>

                <form action="?a=alterar_dados_form" method="post" class="row g-3">


                    <div class="col-6 offset-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="text_email" value="<?= $_SESSION['usuario'] ?>" required>
                    </div>
                    <div class="col-6 offset-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $_SESSION['nome'] ?>" required>
                    </div>
                    <div class="col-6 offset-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?= $_SESSION['telefone'] ?>" required>

                    </div>
                    <div class="col-6 offset-3">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control" name="text_senha" required>

                    </div>
                    <div class="col-6 offset-3">
                        <input type="submit" class="btn btn-primary" value="Alterar">
                        <a href="?a=minha_conta" class="btn btn-primary">Volar</a>
                    </div>
                </form>
                <div class="col-6 offset-3 my-5">
                    <?php if (isset($_SESSION['erro'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['erro'] ?>
                            <?php unset($_SESSION['erro']); ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col-6 offset-3 my-5">
                    <?php if (isset($_SESSION['mensagem'])) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['mensagem'] ?>
                            <?php unset($_SESSION['mensagem']); ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>


        </div>
    </div>
</div>