<body class="bg-secundario">


  <div class="container-fluid login-bg">
    <div class="row">
      <div class="login mt-2">
        <div>
          <h1 class="text-center h1-login">Login Admin</h1>
        </div>
        <div class="text-center">
          <img src="../../core/resources/images/Eventos.gif" class="img-login" alt="...">
        </div>
        <form action="" method="post" id="login">

          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input type="text" class="form-control"  name="text_user" aria-describedby="emailHelp" placeholder="user">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control"  name="text_senha" placeholder="Password">
          </div>
          <div class="mt-2">
            <button type="submit" onclick="form_login('login')" class="btn btn_form">Entrar</button>
           
          </div>
        </form>
        <div id="info_login">
          <!-- mensagemns de erro -->
        </div>

 

        <?php if (isset($_SESSION['mensagem'])): ?>
          <div id="msg">
          <div class="alert alert-success mt-3" role="alert"><?= $_SESSION['mensagem']?></div>
        </div>
          <?php 
          unset($_SESSION['mensagem']);
        endif;

          ?>

        






      </div>
    </div>
  </div>