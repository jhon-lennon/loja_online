


<body class="bg-main" onload="inicio()">
  <div class="container-fluid">
    <div class="row espacocarrocel">
      <div class="col-12">
        <div class="ver_evento">

          <img src="../core/resources/images/expoatins.jpeg" class="d-block w-100  img_ver_evento" alt="...">
        </div>
    


        <div class="ver_evento bg-transparente mb-3  ">
        
          <div class="corpo_evento">
  <br>

            <h1 class="text-center">XIX Expoatins</h1>

            <h5 class="text-center">Araguatins- TO</h5>

            <p id="dia" class="text-center"><strong>Dia 07/09 sexta à 15/09 Sabado</strong> </p>

            <p class=""> scriçao: Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptas molestiae consectetur error, laboriosam architecto doloribus ad commodi repudiandae
              consequuntur totam quas tempore reiciendis, blanditiis, delectus autem tedescriçao: Lorem ipsum dolor sit amet consectetur adipisicing elit.
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


      <div class="col-12">
        <div class="ver_evento">
          <div class="corpo_evento">
            <img src="../core/resources/images/logo3.jpg" alt="" class="img_perfil">
            <span class="nome">jhon Lennon Silva</span><br>
            <form action="?a=post_comentario" method="post" id="text_comentario">
            <textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-momentario" rows="3"></textarea>
            <span><button class="btn mt-1" onclick="comentar('text_comentario')" >comentar</button></span><span class="n-comentarios">934 comentários</span>
            </form>
            <hr>


          </div>
        </div>
      </div>
      <div class="row" id="comentarios"><!--comentarios sao exibidos aqui-->
      <div class="col-12 mt-2">
                    <div class="ver_evento">
                        <div class="corpo_evento">
                                <img src="../resources/images/m.jpg" alt="" class="img_perfil">
                                <span class="nome">Leticia Lima</span>
                                <div class="seta"></div>
                                
                            <p class="comentario">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi facilis mollitia reprehenderit modi itaque dicta ea pariatur nobis. Officia sunt quibusdam
                                 dolores consectetur aliquam, perferendis possimus eaque accusamus pariatur inventore.</p>
                                 
                                 <div class="row">
                                     <div class="col-12 text-end">
                                         <button class="btn-editar-comentario m-end" onclick="editar_comentario()">Editar</button>
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
