<body class="bg-secundario">

  <div class="container-fluid login-bg">
    <div class="row">
      <div class="login">
        <div>
          <h1 class="text-center h1-login">Cadastre-se</h1>
        </div>
        <div class="text-center">
          <img src="../resources/images/Eventos.gif" class="img-login" alt="...">
        </div>

        <form id="form-cadastro" action="?a=form_cadasto" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="text_email" aria-describedby="emailHelp" placeholder="Seu email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="text_nome" aria-describedby="emailHelp" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="text_senha" placeholder="senha">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirmar senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="text_confirma_senha" placeholder="confirme sua senha">
          </div>
          <div class="mt-2">
            <button onclick="form_cadastro('form-cadastro')" class="btn btn_form">Cadastrar</button>
            <a href="{{route('login')}}" class="btn btn_form">Entrar</a>

          </div>

        </form>
        <div id="info">
          
        </div>
      </div>
    </div>
  </div>