<div class="container">
    <div class="row my-5">

    <div class="col-sm-4 offset-sm-4 text-center">
    <img src="assets/images/logo.png" class="p-3 mb-5 bg-body rounded" alt="...">

</div>



        <div class="col-sm-4 offset-sm-4 ">
            <h3 class="text-center">Login</h3>

            <form action="?a=login_form" method="post">
            <div class="my-2">
                <label>Email:</label>
                <input type="text" name="text_email" class="form-control" require>
            </div>

            <div class="my-2">
                <label>Senha:</label>
                <input type="password" name="text_senha" class="form-control" require>
            </div>

            <div class="my-2">
                <input type="submit" value="Entrar" class="btn btn-primary">
                <a href="?a=criar_conta" class="btn btn-primary">Cadastre-se</a>
            </div>
        </form>
       

                <?php if(isset($_SESSION['erro'])):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['erro']?>
                        <?php unset($_SESSION['erro']) ;?>
                        <a href="?a=esqueci_senha" class="alert-link">esqueci a senha</a>
                    </div>
                <?php endif?>

                
                <?php if(isset($_SESSION['mensagem'])):?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['mensagem']?>
                        <?php unset($_SESSION['mensagem']) ;?>
                    </div>
                <?php endif?>

        </div>

    </div>
</div>
