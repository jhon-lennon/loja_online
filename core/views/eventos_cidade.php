


<body class="bg-main" onload="eventos_cidade('<?=$cidade?>')">
<?php include 'cabecario.php'; ?>



  <div class="container-fluid espacocarrocel" onload="get_cidades()">
    <div class="row" id="div_carrocel">
<div class="text-center"><h2 class="titulo-city">Destaques de <?=$cidade?></h2></div>
<div class="col-12 my-2">
  <div class="carcad">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../core/resources/images/noite_ev.jpg" class="d-block w-100 carrocel" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../core/resources/images/festa_do_cupu.jpg" class="d-block w-100 carrocel" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../core/resources/images/festa_do_peixe.jpg" class="d-block w-100 carrocel" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
</div>
</div>

  </nav>

<div class="row" id='div_eventos'>
  
  <div class="col-12">
    <nav class="navbar navbar-expand-md navbar-light ">
        <div class="container-fluid">
            <a href="" class="btn me-1 ">Esta semana</a>
         
          <a href="" class="btn me-1 ">Este mes</a>
          <button class=" btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" >
           mais filtros
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="btn me-1 my-1 ">desta semana</a>
                  </li>
           
              <li class="nav-item">
                <a href="" class="btn me-1 my-1 ">desta semana</a>
              </li>
              <li class="nav-item">
                <a href="" class="btn me-1 my-1 ">deste mês</a> 
              </li>
              <li class="nav-item">
                <a href="" class="btn me-1 my-1 ">aberto ao publico</a> 
              </li>
            </ul>
          </div>
        </div>
   
  </div>





  <div class="text-center"><h2 class="titulo-city">Eventos de <?=$cidade?></h2></div>
      <div class="col my-2">
        <div class="card shadow" style="width: 18rem;">
          <img src="../core/resources/images/festa_do_cupu.jpg" class="card-img-top" alt="...">
          <div class="card-body ">
            <h5 class="card-title text-center ">Festa do cupu</h5>
            <span id="dia"><strong>Dia 16/05 Quinta | Esperantina-TO</strong> </span>

            <p class="card-text text-center">Na AAbb de Araguatins dj Jhon tocando os melhores tecnomeloy...</p>
            <div class="info">
            gratis
              <span><i class="fa-solid fa-location-dot"></i> Local: <strong>AABB</strong> </span> <br>
              <span><i class="fa-solid fa-clock"></i> Horario: <strong>23:00 h</strong> </span>

            </div>


          </div>
          <div class="foote-card">
            <p class="mt-3 ma-5 pfooter"><a href="" class="btn  ">Ver evento</a> <a href=""
                class="btn btn-conf">Confirmar presença</a>
          </div>
        </div>
      </div>





    </div>

  </div>
  

