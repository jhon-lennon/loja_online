
<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3"><a href="?a=inicio"class="link_iten"><strong><?=APP_NAME?></strong></a> </div>
        <div class="col-6 text-end p-3">


    <a href="?a=inicio"class="link_iten">Inicio</a>
                <a href="?a=loja"class="link_iten">Loja</a>

            <?php if(isset($_SESSION['usuario'])):?>
                <a href="?a=sair"class="link_iten">Sair</a>
                <a href=""class="link_iten">Minha conta</a>
                               <a href="?a=carrinho"><i class="fa-solid fa-cart-shopping"></i></a>
            <span class="badge bg-warning">10</span>
          
            <?php else: ?>
                <a href="?a=login"class="link_iten">Login</a>
                <a href="?a=criar_conta"class="link_iten">Cadastre-se</a>
            <?php endif;?> 

             

        </div>

    </div>
</div>