

<div class="container">
    <div class="row " style="margin-bottom: 70px;">
        <div class="col-6 offset-3">
            <h4>Sua compra</h4>
           <hr> 
        </div>
        
        <div class="col-6 offset-3">
            <h5>Cliente</h5>
            <p>Email: <?=$_SESSION['usuario'] ?></p>
            <p>Nome: <?=$_SESSION['nome'] ?></p>
            <p>Nome: <?=$_SESSION['telefone'] ?></p>
            <hr> 
        </div>
        <div class="col-6 offset-3">
            <h5>Endereço</h5>
           
        </div>
        <div class="col-6 offset-3">
      
           <p>Cep:   <?=$_SESSION['endereco']->cep?></p>    
           <p>Estado:   <?=$_SESSION['endereco']->estado?></p>  
           <p>Cidade:   <?=$_SESSION['endereco']->cidade?></p>  
           <p>Bairro:   <?=$_SESSION['endereco']->bairro?></p>  
           <p>Rua:   <?=$_SESSION['endereco']->rua?></p>  
           <p>Numero:   <?=$_SESSION['endereco']->numero?></p>  
           <p>Complemento:   <?=$_SESSION['endereco']->complemento?></p>  
           <hr> 
        </div>
        <div class="col-6 offset-3">
            <h5>Produtos</h5>
            
        </div>

        <div class="col-6 offset-3">
            <?php
           
            foreach($produtos as $produto):?>
                <p>======================</p>
                <?php foreach($produto as $produ =>$item):?>
                
                <p><?=$produ.': '.$item ?></p>
                <?php endforeach; ?>

            <?php endforeach; ?>
            <hr> 

          </div>  
            <div class="col-6 offset-3" >
                <h5>Pagamento</h5>

            <br>
            <p>Pagamento: <?=$_SESSION['pagamento'] ?></p>
            <p>Total: <?=number_format( $_SESSION['total_valor'], 2, ',', '.')?></p>
            </div>
            <div class="col-6 offset-3">
                <p>Codigo da compra: <?=$codigo_compra ?> </p>
                <p>Status: aguardando pagamento </p>
                <a href="?a=loja"class="btn btn-primary">Voltar a loja</a>
                <a href="?a=minhas_compras"class="btn btn-primary">minhas compras</a>

            <br>
    </div>
</div>
</div>









