<body class="bg-main">

  <h1 class="text-center my-5">Eventos de fulano</h1>
  <div class="row" id='div_eventos'>

    <?php
    $p = 0;
    foreach ($eventos as $evento) :
      $p++;
    ?>

      <div class="col my-3" id="div_evento_${evento.id_evento}">

        <div class="card shadow" style="width: 18rem;">
          <img src="../../core/resources/images/<?= $evento['imagem'] ?>" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title "><?= $evento['titulo'] ?></h5>
            <span id="cidade"><strong><?= $evento['cidade'] ?></strong> </span><br>
            <span id="dia"><strong><?= $evento['data'] ?></strong> </span>

            <p class="card-text text-start"><?= $evento['descricao'] ?> </p>
            <div class="info text-start">
              <span><i class="fa-solid fa-person-dress"></i> Entrada Mulher: <strong id="entrada"><?= $evento['valor_mulher'] ?></strong></span>
              <br>
              <span><i class="fa-solid fa-person"></i> Entrada Homen: <strong id="entrada"><?= $evento['valor_homem'] ?></strong></span> <br>
              <span><i class="fa-solid fa-location-dot"></i> Local: <strong><?= $evento['local'] ?></strong> </span> <br>
              <span><i class="fa-solid fa-clock"></i> Horario: <strong><?= $evento['horario'] ?> </strong> </span>
            </div>
          </div>
          <div class="foote-card" id="ev<?=$evento['id_evento']?>">
            <p class="mt-3 ma-5 pfooter"><a href="?a=ver_evento&ev=${evento.id_evento}" class="btn  ">Ver evento</a>


              <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $p ?>">
                Excluir evento
              </button>
            </p>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop<?= $p ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Excluir evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Quer excluir esse evento?
              <?= $p ?>
            </div>
            <div class="modal-footer" >
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
              <button type="button" onclick="excluir_evento(<?=$evento['id_evento']?>)" data-bs-dismiss="modal" class="btn btn-primary">Sim</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
  <pre>
  <?php print_r($eventos); ?>

</pre>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>