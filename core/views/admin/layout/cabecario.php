<?php

use core\classes\Functions; ?>

<div onload="get_cidades('city')">

  <nav class="navbar fixed-top navbar-expand-sm  navbar-dark " id="nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="?a=inicio"><img src="../core/resources/images/logo3.jpg" alt="" id="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?a=inicio">Home</a>
          </li>
          <?php if (Functions::check_session()) : ?>
            <li class="nav-item">
              <a class="nav-link active" href="?a=sair">Sair</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="?a=perfil">Perfil</a>
            </li>
            <?php if ($_SESSION['produtor'] == 1) : ?>
              <li class="nav-item">
              <a class="nav-link active" href="?a=cadastro_evento">Publicar evento</a>
            </li>
              <?php endif; ?>


          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link active" href="?a=login">Entrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="?a=cadastro">Cadastre-se</a>
            </li>

          <?php endif; ?>


          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="get_cidades()">
              Cidades
            </a>
            <ul class="dropdown-menu" id="city" aria-labelledby="navbarDropdown">
              <!--cidades iseridas aqui via ajax-->
            </ul>
          </li>

        </ul>
        <form class="d-flex" id="pesquisa" action="?a=pesquisa_eventos" method="POST">
          <input class="form-control me-2" type="search" name="pesquisa" placeholder="Cidade ou evento" aria-label="Search">
          <button class="btn btn_form" onclick="pesquisa_eventos('pesquisa')" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">Buscar</button>
        </form>

      </div>
    </div>
  </nav>
</div>