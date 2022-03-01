<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="modal-body">
                <div class="col-6 offset-3">
                    <h4 class="text_center my-5">Recuperar senha</h4>
                </div>
                <form action="?a=esqueci_senha_form" method="post" class="row g-3">
                    <div class="col-6 offset-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="text_email" required>
                        <input type="submit" value="Enviar" class="btn btn-primary my-2">
                        <a href="?a=login" class="btn btn-primary">Voltar</a>

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
            </div>
        </div>
    </div>
</div>