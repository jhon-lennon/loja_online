@include('cabecario')
@extends('layout/layout')
@section('home')
<body class="bg-secundario">
<h1>perfil</h1>

<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <div class="div-perfil">
                <img class="img-perfil" src="../resources/images/jhon2.jpg" alt="">
                <h2 class="mt-2">jhon lennon silva</h2>

                <h6>jhonsilva@mail.com</h6>

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
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu nome">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto do perfil</label>
                  <input type="file" class="form-control" name="imagem" aria-label="Upload">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">senha</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="sua senha">
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn_form">Salvar</button>
                  <a href="{{route('login')}}" class="btn btn_form">Alterar senha</a>

                </div>
                
              </form>
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
          Deseja realmente excluir seu perfil? <button class="btn btn-form">Sim</button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  
    @endsection