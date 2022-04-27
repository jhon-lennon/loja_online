<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
  <link rel="stylesheet" href="../core/resources/css/app.css">


  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/fontawesome.css">
  <script src="fontawesome-free-6.1.1-web/js/all.js"></script>
  <script src="../core/resources/js/axios.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>













<nav class="navbar fixed-top navbar-expand-sm  navbar-dark " id="nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}"><img src="../core/resources/images/logo3.jpg" alt="" id="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Entrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cadastrar')}}">Cadstrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('perfil')}}">Perfil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cidades
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Araguatins</a></li>
            <li><a class="dropdown-item" href="#">Augustinopolis</a></li>
            <li><a class="dropdown-item" href="#">Axixá</a></li>
            <li><a class="dropdown-item" href="#">Butiri do Tocantins</a></li>
            <li><a class="dropdown-item" href="#">Esperantina</a></li>
            <li><a class="dropdown-item" href="#">Carrasco bonito</a></li>
            <li><a class="dropdown-item" href="#">São sebastião</a></li>
            <li><a class="dropdown-item" href="#">Araguatins</a></li>
            <li><a class="dropdown-item" href="#">Augustinopolis</a></li>
            <li><a class="dropdown-item" href="#">Axixá</a></li>
            <li><a class="dropdown-item" href="#">Butiri do Tocantins</a></li>
            <li><a class="dropdown-item" href="#">Esperantina</a></li>
            <li><a class="dropdown-item" href="#">Carrasco bonito</a></li>
            <li><a class="dropdown-item" href="#">São sebastião</a></li>
            <li><a class="dropdown-item" href="#">Araguatins</a></li>
            <li><a class="dropdown-item" href="#">Augustinopolis</a></li>
            <li><a class="dropdown-item" href="#">Axixá</a></li>
            <li><a class="dropdown-item" href="#">Butiri do Tocantins</a></li>
            <li><a class="dropdown-item" href="#">Esperantina</a></li>
            <li><a class="dropdown-item" href="#">Carrasco bonito</a></li>
            <li><a class="dropdown-item" href="#">São sebastião</a></li>

          </ul>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cidade ou evento" aria-label="Search">
        <button class="btn btn_form" type="submit">Buscar</button>
      </form>

    </div>
  </div>
</nav>
















<body class="bg-main">
  <div class="container-fluid">
    <div class="row espacocarrocel">
      <div class="col-12">
        <div class="ver_evento">

          <img src="../core/resources/images/noite_ev.jpg" class="d-block w-100  img_ver_evento" alt="...">
        </div>
      </div>

      <div class="col-12">


        <div class="ver_evento bg-transparente mb-3">
          <div class="corpo_evento">


            <h1>Festival do cupu</h1>

            <h5>Carrasco bonito do tocantins - TO</h5>

            <p id="dia"><strong>Dia 07/09 sexta à 15/09 Sabado</strong> </p>

            <p class="">descriçao: Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptas molestiae consectetur error, laboriosam architecto doloribus ad commodi repudiandae
              consequuntur totam quas tempore reiciendis, blanditiis, delectus autem temporibus dolor
              molestias. Eos.</p>
            <div class="info">
              <span><i class="fa-solid fa-person-dress"></i> Entrada Mulher: <strong id="entrada">10,00 R$</strong></span>
              <br>
              <span><i class="fa-solid fa-person"></i> Entrada Homen: <strong id="entrada">20,00 R$</strong></span> <br>
              <span><i class="fa-solid fa-location-dot"></i> Local: <strong>Parque de exposiçao</strong> </span> <br>
              <span><i class="fa-solid fa-clock"></i> Horario: <strong>23:00 as 04:00 </strong> </span>
              <p>970 pessoas confirmaram presença</p>


            </div>

            <p class=""><a href="" class="btn  ">Voltar</a> <a href="" class="btn btn-c">Presença confirmada <i class="fa-solid fa-circle-check"></i></a>


          </div>
        </div>
      </div>





      <button class="btn " onclick="comentt()">teste</button> <button class="btn" onclick="add_coment()">axios</button>
      <button class="btn" onclick="post_teste()">post</button>




      <div class="container" id="comentarioss">

      </div>


































      <div class="col-12">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/logo3.jpg" alt="" class="img_perfil">
            <span class="nome">jhon Lennon Silva</span><br>

            <textarea class="form-control mt-1" placeholder="Faça um comentário." name="descricao" id="campo-momentario" rows="3"></textarea>
            <span><button class="btn " onclick="aja()" class="btn  mt-2">comentar</button></span><span class="n-comentarios">934 comentários</span>
            <hr>


          </div>
        </div>
      </div>

      <div class="col-12 mt-2">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">
            <span class="nome">Leticia Lima</span>
            <div class="seta"></div>

            <p class="comentario">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi facilis mollitia reprehenderit modi itaque dicta ea pariatur nobis. Officia sunt quibusdam
              dolores consectetur aliquam, perferendis possimus eaque accusamus pariatur inventore.</p>

            <div class="row">
              <div class="col-12 text-end">
                <a class="btn-editar-comentario m-end" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Editar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-2">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/jhon2.jpg" alt="" class="img_perfil">
            <span class="nome">Lennon Carvalho</span>
            <div class="seta"></div>

            <p class="comentario">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi facilis mollitia reprehenderit modi itaque dicta ea pariatur nobis. Officia sunt quibusdam
              dolores consectetur aliquam, perferendis possimus eaque accusamus pariatur inventore.</p>
          </div>
        </div>
      </div>
      <div class="col-12 mt-2">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/jhon.jpg" alt="" class="img_perfil">
            <span class="nome"> Jhon Siva</span>
            <div class="seta"></div>

            <p class="comentario">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi facilis mollitia reprehenderit modi itaque dicta ea pariatur nobis. Officia sunt quibusdam
              dolores consectetur aliquam, perferendis possimus eaque accusamus pariatur inventore.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Editar perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Comentário</label>
              <textarea class="form-control mt-1" placeholder="Faça um comentário." name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mt-2">
              <button type="submit" class="btn btn_form">Salvar</button>
              <a href="{{route('login')}}" class="btn btn_form">Cancelar</a>

            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Excluir comentário</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Excluir comentário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Quer excluir esse comentário? <button class="btn btn-form">Sim</button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>












  <script src="../core/resources/js/app.js"></script>
</body>

</html>