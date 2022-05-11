<body class="bg-main" onload="inicio(<?= $evento->id_evento ?>)">
  <div class="container-fluid">
    <div class="row espacocarrocel">
      <div class="col-12">
        <div class="ver_evento">

          <img src="../core/resources/images/<?= $evento->imagem ?>" class="d-block w-100  img_ver_evento" alt="teste">
        </div>



        <div class="ver_evento bg-transparente mb-3  ">

          <div class="corpo_evento">
            <br>

            <h1 class="text-center"><?= $evento->titulo ?></h1>

            <h5 class="text-center"><?= $evento->cidade ?></h5>

            <p class="dia_evento" class="text-center"><strong><?= $evento->data ?></strong> </p>

            <p class=""><?= $evento->descricao ?></p>
            <div class="info">
              <span><i class="fa-solid fa-person-dress"></i> Entrada Mulher: <strong id="entrada"><?= $evento->valor_mulher ?></strong></span>
              <br>
              <span><i class="fa-solid fa-person"></i> Entrada Homem: <strong id="entrada"><?= $evento->valor_homem ?></strong></span> <br>
              <span><i class="fa-solid fa-location-dot"></i> Local: <strong><?= $evento->local ?></strong> </span> <br>
              <span><i class="fa-solid fa-clock"></i> Horario: <strong><?= $evento->horario ?></strong> </span>
              <p id="confir_pre"><?= $evento->n_presencas ?> pessoas confirmaram presença</p>

            </div>

            <?php if (isset($_SESSION['id_usuario'])) : ?> 
            <div id="evento_<?= $evento->id_evento ?>">

             
                   <?php if ($evento->presenca == 1) : ?>
                          <p><a href="?a=inicio" class="btn  ">Voltar</a> <button onclick="confirmar_presenca_no_ver_evento(<?= $evento->id_evento ?>)" class="btn btn-c">Presença confirmada <i class="fa-solid fa-circle-check"></i></button></p>
                   <?php elseif ($evento->presenca == 0) : ?>
                          <p><a href="?a=inicio" class="btn  ">Voltar</a> <button onclick="confirmar_presenca_no_ver_evento(<?= $evento->id_evento ?>)" class="btn btn-n-c">Confirmar presença <i class="fa-solid fa-circle-check"></i></button></p>
                   <?php else : ?>
                        <p><a href="?a=inicio" class="btn  ">Voltar</a> <a href="?a=login" class="btn btn-c">Presença confirmada <i class="fa-solid fa-circle-check"></i></a></p>
                  <?php endif; ?>
                  </div>
              <?php else : ?>
                <p><a href="?a=inicio" class="btn  ">Voltar</a> <a href="?a=login" class="btn btn-n-c">Confirmar presença  <i class="fa-solid fa-check"></i></a></p>
              <?php endif; ?>

            



          </div>
        </div>
      </div>

      <?php if (isset($_SESSION['id_usuario'])) : ?>
        <div class="col-12">
          <div class="ver_evento">
            <div class="corpo_evento">
            <img class="img_perfil" src="../core/resources/images/usuarios/<?= $_SESSION['usuario_foto']?>" alt="">
              <span class="nome"><?= $_SESSION['usuario_nome'] ?></span><br>
              <form action="?a=post_comentario" method="post" id="text_comentario_<?= $evento->id_evento ?>">
                <textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-momentario" rows="3"></textarea>
                <span><button class="btn mt-1" onclick="comentar('<?= $evento->id_evento ?>')">comentar</button></span><span id="n-comentarios" class="n-comentarios"></span>
              </form>
              <hr>


            </div>
          </div>
        </div>
      <?php else : ?>
        <div class="col-12">
          <div class="ver_evento">
            <p class="text-center" style="color: white;"> Conecte-se <a href="">aqui</a> e deixe seu comentario.</p>
          </div>
        </div>
      <?php endif; ?>
      <div class="row" id="comentarios">
        <!--comentarios sao exibidos aqui via ajax-->
      </div>