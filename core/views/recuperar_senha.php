<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="modal-body">
                <div class="col-6 offset-3">
                    <h4 class="text_center my-5">Defenir nova senha</h4>
                </div>

                <form action="?a=recuperar_senha_form" method="post" class="row g-3">

                    <div class="col-6 offset-3">
                        <label class="form-label">Nova senha</label>
                        <input type="password" class="form-control" name="nova_senha" required>
                    </div>
                    <div class="col-6 offset-3">
                        <label class="form-label">Repetir nova senha</label>
                        <input type="password" class="form-control" name="nova_senha_2" required>
                    </div>
                    <div class="col-6 offset-3">
                        <label class="form-label">Codigo de verificação</label>
                        <input type="password" class="form-control" name="codigo" required>

                    </div>
                    <div class="col-6 offset-3">
                        <input type="submit" class="btn btn-primary" value="Recuperar">
                        <a href="?a=esqueci_senha" class="btn btn-primary">Volar</a>
                    </div>
                </form>
                <div class="col-6 offset-3">
                <?php if(isset($_SESSION['erro'])):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['erro']?>
                        <?php unset($_SESSION['erro']);?>
                    </div>
                <?php endif?>
                </div>
            </div>
        </div>
    </div>