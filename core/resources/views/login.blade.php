
@extends('layout/layout')
@section('home')
<body class="bg-secundario">
  @include('cabecario')

<div class="container-fluid login-bg">
    <div class="row">
        <div class="login mt-2">
            <div>
                <h1 class="text-center h1-login">Entrar</h1>
            </div>
            <div class="text-center">
                <img src="../resources/images/Eventos.gif" class="img-login" alt="...">
            </div>
            <form action="{{route('post')}}" method="post">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Usuario</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn_form">Entrar</button>
                  <a href="{{route('cadastrar')}}" class="btn btn_form">Cadastre-se</a>
                </div>
              </form>
            
            
        </div>
    </div>
</div>
      
            
@endsection