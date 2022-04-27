
@extends('layout/layout')
@section('home')
<body class="bg-secundario">
    @include('cabecario')

    <div class="container-fluid login-bg">
        <div class="row">
            <div class="add_evento mt-2">
                <div>
                    <h1 class="text-center h1-login">Adicionar Evento</h1>
                </div>
                <div class="text-center">
                    <img src="../resources/images/Eventos.gif" class="img-login" alt="...">
                </div>
                <form action="{{ route('post') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                        <input type="email" class="form-control" name="titulo" id="exampleFormControlInput1"
                            placeholder="Nome do evento">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Local</label>
                        <input type="email" class="form-control" name="local" id="exampleFormControlInput1"
                            placeholder="nome do clube/praça/">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                                <select class="form-select" name="cidade" aria-label="Default select example">
                                    <option value="1">Araguatins</option>
                                    <option value="2">Augustinopolis</option>
                                    <option value="3">Buriti do Tocantins</option>
                                    <option value="4">Araguatins</option>
                                    <option value="5">Augustinopolis</option>
                                    <option value="6">Buriti do Tocantins</option>
                                    <option value="7">Araguatins</option>
                                    <option value="8">Augustinopolis</option>
                                    <option value="9">Buriti do Tocantins</option>
                                    <option value="10">Araguatins</option>
                                    <option value="11">Augustinopolis</option>
                                    <option value="12">Buriti do Tocantins</option>
                                    <option value="13">Araguatins</option>
                                    <option value="14">Augustinopolis</option>
                                    <option value="15">Buriti do Tocantins</option>
                                    <option value="16">Araguatins</option>
                                    <option value="17">Augustinopolis</option>
                                    <option value="18">Buriti do Tocantins</option>
                                    <option value="19">Araguatins</option>
                                    <option value="20">Augustinopolis</option>
                                    <option value="21">Buriti do Tocantins</option>
                                    <option value="22">Araguatins</option>
                                    <option value="23">Augustinopolis</option>
                                    <option value="24">Buriti do Tocantins</option>
                                    <option value="25">Buriti do Tocantins</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="exampleFormControlInput1"
                                    placeholder="rua/numero/">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Data inicio:</label>
                                <input class="form-control" name="data_inicio" type="date">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Hora inicio:</label>
                                <input class="form-control" name="hora_inicio" type="time">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Data final:</label>
                                <input class="form-control" name="data_final" type="date">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Hora final:</label>
                                <input class="form-control" name="hora_final" type="time">
                            </div>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Imagem</label>
                        <input type="file" class="form-control" name="imagem" aria-label="Upload">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form_preco">
                                <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                    checked onclick="valor_entrada()">
                                <label class="form-check-label " for="flexRadioDefault1">
                                    Evento Gratis
                                </label>
                            </div>
                            <div class="form-check form_preco">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    onclick="valor_entrada()">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Evento Pago
                                </label>
                            </div>
                        </div>
                        <div class="col-4 " id="preco_homem">
                        </div>
                        <div class="col-4 " id="preco_mulher">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descriçao</label>
                        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn_form">Adicionar</button>
                    <button class="btn btn_form">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
