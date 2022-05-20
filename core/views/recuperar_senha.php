<body class="bg-secundario">


  <div class="container-fluid login-bg">
    <div class="row">
      <div class="login mt-2">
        <div>
          <h1 class="text-center h1-login">Recuperar Senha</h1>
        </div>
        <div class="text-center">
          <img src="../core/resources/images/Eventos.gif" class="img-login" alt="...">
        </div>

        <form action="" method="post" id="recupera_senha">

          <div class="form-group my-1" id="campo_codigo">
              <label for="exampleInputEmail1">Usuario</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="mt-2 " id="btn_recupera">
            <button type="submit"  onclick="enviar_codigo()" class="btn btn_form">Enviar</button>
          
          </div>
        </form>
       
        <div id="info_cod">
          <!-- mensagemns de erro -->
        </div>

      </div>
    </div>
  </div>
 
    