

<body class="bg-secundario">
 
    <div class="container-fluid login-bg">
        <div class="row">
            <div class="add_evento mt-2">
                <div>
                    <h1 class="text-center h1-login">Adicionar Evento</h1>
                </div>
                <div class="text-center">
                    <img src="../core/resources/images/Eventos.gif" class="img-login" alt="...">
                </div>
                <div id="form_add_e">

                
                <form action="?a=form_cadastro_evento" method="post" id="form-evento">
                   
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" id="exampleFormControlInput1"
                            placeholder="Nome do evento">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Local</label>
                        <input type="text" class="form-control" name="local" id="exampleFormControlInput1"
                            placeholder="nome do clube/praça/">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                             <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                                <select class="form-select" name="cidade" aria-label="Default select example">
                                   <?php foreach($cidades as $cidade): ?>
                                    <option value="<?=$cidade->cidade?>"><?=$cidade->cidade?></option>
                                    <?php endforeach; ?>
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
                        <input type="file" class="form-control" name="imagem" aria-label="Upload"  accept="image/*">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form_preco">
                                <input class="form-check-input " type="radio" name="entrada" id="flexRadioDefault1"
                                    checked onclick="valor_entrada()">
                                <label class="form-check-label " for="flexRadioDefault1">
                                    Evento Gratis
                                </label>
                            </div>
                            <div class="form-check form_preco">
                                <input class="form-check-input" type="radio" name="entrada" id="flexRadioDefault2"
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
                    <div id="info_cad">
          <!-- mensagemns de erro -->
        </div>
                    <button type="submit" onclick="form_evento()" class="btn btn_form">Adicionar</button>
                    <button class="btn btn_form">Cancelar</button>
            </div>
            </form>
            </div>

            <div id="info_cad">
          <!-- mensagemns de erro -->
        </div>
        </div>
    </div>
    </div>
