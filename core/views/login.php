<div class="container">
    <div class="row my-5">
        <div class="col-sm-4 offset-sm-4 ">
            <h3 class="text-center">Login</h3>

            <form action="" method="post">
            <div class="my-2">
                <label>Email:</label>
                <input type="email" name="text_email" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Senha:</label>
                <input type="password" name="text_senha1" class="form-control" require>
            </div>

            <div class="my-2">
                <input type="submit" value="Entrar" class="btn btn-primary">
            </div>
        </form>

                <?php if(isset($_SESSION['erro'])):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['erro']?>
                    </div>
                <?php endif?>
        </div>
    </div>
</div>
