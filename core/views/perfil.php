

<body class="bg-secundario">
<h1>perfil</h1>

<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <div class="div-perfil">
                <img class="img-perfil" src="../core/resources/images/usuarios/<?= $_SESSION['usuario_foto']?>" alt="">
                <h2 class="mt-2"><?= $_SESSION['usuario_nome'] ?></h2>

                <h6><?= $_SESSION['usuario_email'] ?></h6>

                <a class="btn btn-form" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Editar</a>
                <button class="btn btn-form">voltar</button>

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
            <form  id="edit-perfil" action="?a=form_edit_perfil" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $_SESSION['usuario_email'] ?>" aria-describedby="emailHelp" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $_SESSION['usuario_nome'] ?>" aria-describedby="emailHelp" name="nome">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto do perfil</label>
                  <input type="file" class="form-control" name="foto" aria-label="Upload" accept="image/*">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">senha</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="sua senha">
                </div>
                <div class="mt-2">
                <button class="btn btn_form" onclick="form_edit()" >Salvar</button>
                  <a href="{{route('login')}}" class="btn btn_form">Alterar senha</a>

                </div>
                
              </form>
              <div class="my-2 alert " id="info" style="color: red;"><!-- mensagemns de erro --></div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Excluir meu perfil</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Excluir perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="?a=excluir_perfil" method="POST" id="ex_pe_fo">
                <div class="form-group">
        
                <label for="exampleInputPassword1"> Para exluir seu perfil digite sua senha e confirma</label>
                <p id="erro_senha_ex_per" style="color: red;"></p>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="sua senha">

                  <button type="button" onclick="excluir_perfil('ex_pe_fo')" class="btn btn-form mt-1">Excluir</button>
                  

                </div>
                
              </form>
         
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  
  