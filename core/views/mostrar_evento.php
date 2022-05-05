
<pre>
<?php print_r($evento) ?>
</pre>
<body class="bg-main" onload="inicio(<?=$evento->id_evento?>)">
  <div class="container-fluid">
    <div class="row espacocarrocel">
      <div class="col-12">
        <div class="ver_evento">

          <img src="../core/resources/images/expoatins.jpeg" class="d-block w-100  img_ver_evento" alt="...">
        </div>
    


        <div class="ver_evento bg-transparente mb-3  ">
        
          <div class="corpo_evento">
  <br>

            <h1 class="text-center"><?=$evento->titulo_evento?></h1>

            <h5 class="text-center"><?=$evento->cidade?></h5>

            <p class="dia_evento" class="text-center"><strong>Dia 07/09 sexta à 15/09 Sabado</strong> </p>

            <p class=""><?=$evento->descricao?></p>
            <div class="info">
              <span><i class="fa-solid fa-person-dress"></i> Entrada Mulher: <strong id="entrada"><?=$evento->valor_mulher?></strong></span>
              <br>
              <span><i class="fa-solid fa-person"></i> Entrada Homen: <strong id="entrada"><?=$evento->valor_homem?></strong></span> <br>
              <span><i class="fa-solid fa-location-dot"></i> Local: <strong><?=$evento->local?></strong> </span> <br>
              <span><i class="fa-solid fa-clock"></i> Horario: <strong>23:00 as 04:00 </strong> </span>
              <p>970 pessoas confirmaram presença</p>


            </div>

            <p class=""><a href="" class="btn  ">Voltar</a> <a href="" class="btn btn-c">Presença confirmada <i class="fa-solid fa-circle-check"></i></a>
    

          </div>
        </div>
      </div>

      <?php if(isset($_SESSION['id_usuario'])): ?>
      <div class="col-12">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/logo3.jpg" alt="" class="img_perfil">
            <span class="nome"><?=$_SESSION['usuario_nome'] ?></span><br>
            <form action="?a=post_comentario" method="post" id="text_comentario_<?=$evento->id_evento?>">
            <textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-momentario" rows="3"></textarea>
            <span><button class="btn mt-1" onclick="comentar('<?=$evento->id_evento?>')" >comentar</button></span><span id="n-comentarios" class="n-comentarios"></span>
            </form>
            <hr>


          </div>
        </div>
      </div>
      <?php else: ?>
        <div class="col-12">
        <div class="ver_evento">
      <p class="text-center">  Conecte-se e deixe seu comentario <a href="">aqui</a></p>
        </div>                
        </div>
        <?php endif; ?>
      <div class="row" id="comentarios"><!--comentarios sao exibidos aqui--></div>
     

