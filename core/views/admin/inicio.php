

<body class="bg-admin">
<h1 class="mt-5">admin</h1>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2  style="color:white ;">Pesquisar evento</h2>
        <form class="d-flex" id="pesquisa_e" action="?a=pesquisa_eventos" method="POST">
          <input class="form-control me-2" type="search" name="pesquisa_e" placeholder="evento" aria-label="Search">
          <button class="btn btn_form" onclick="pesquisar_evento()" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">Buscar</button>
        </form>
         
          <div id="msg">
          <div class="alert alert-success mt-3" role="alert">Festa do açai</div>
        </div>
         
        </div>
        <div class="col-6">
        <h2  style="color:white ;">Pesquisar usuario</h2>
        <form class="d-flex" id="pesquisa_u" action="" method="POST">
          <input class="form-control me-2" type="search" name="email_usuario" placeholder="nome ou emil" aria-label="Search">
          <button class="btn btn_form" onclick="pesquisar_usuario()" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">Buscar</button>
        </form>
  <div class="text-center mt-2" style="color:white ;" id="info_user">

  
       
</div>
        </div>
        </div>
    </div>
</div>

