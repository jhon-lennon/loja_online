

//opçao de evento pago ou grates =========================================================================================
function valor_entrada() {

  var entrada = document.getElementById('flexRadioDefault2')
  var preco_homem = document.getElementById('preco_homem')
  var preco_mulher = document.getElementById('preco_mulher')

  console.log(entrada.checked)
  if (entrada.checked == true) {
    preco_homem.innerHTML =
      '<label for="exampleFormControlInput1" class="form-label">Homem</label><input class="form-control" name="preco_homem" type="number" value="00.00">'
    preco_mulher.innerHTML =
      '<label for="exampleFormControlInput1" class="form-label">Mulher</label><input class="form-control" name="preco_mulher" type="number" value="00.00">'
  } else {
    preco_homem.innerHTML = ''
    preco_mulher.innerHTML = ''
  }
}



//add comentario ========================================================================================================
function comentar(id_evento) {
  //div dos comentarios
  let divcomentarios = document.getElementById('comentarios')

  //texto do comentario
  let frm = $('#text_comentario_' + id_evento)

console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=post_comentario',
    data: frm.serialize() + '&id_evento=' + encodeURIComponent(id_evento),

    success: function (dados) {
      console.log(dados)
      
      var objeto = JSON.parse(dados);
      var comentarios = objeto
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/' + elemento.foto +'" alt="" class="img_perfil">  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

      });

      document.getElementById('campo-momentario').value = ''
      return

    },
    error: function (erro) {
      console.log(erro)
      divcomentarios.innerText = erro.statusCode(erro)
    }
  });

}






//atualizar comentario ========================================================================================================
function atualizar_comentario(id) {
  //div do comentario
  console.log(id)
  let divcomentarios = document.getElementById('edit-com-' + id)

  //texto do comentario
  let frm = $('#id-form-' + id)
  console.log(divcomentarios)
  console.log(frm)

  frm.submit(function (e) {

    e.preventDefault()


  })
  $.ajax({
    type: "POST",
    url: '?a=atualizar_comentario',
    data: frm.serialize() + '&id_comentario=' + encodeURIComponent(id),

    success: function (dados) {
      console.log(dados)

      var objeto = JSON.parse(dados);
      var comentarios = objeto
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">  <span class="nome">Leticia Lima</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

      });

    },
    error: function (erro) {
      console.log(erro)
      divcomentarios.innerText = erro.statusCode(erro)
    }
  });

}





function sair_da_edicao(id) {
  console.log('saiu')


}








// editar comentario  =========================================================================================================
function editar_comentario(id) {


  document.getElementById('edit-com-' + id).innerHTML = ' <div class="col-12" id="edit-com-' + id + '" onblur="sair_da_edicao()"> <div class="ver_evento">  <div class="corpo_evento"> <img src="../core/resources/images/logo3.jpg" alt="" class="img_perfil">     <span class="nome">jhon Lennon Silva</span><br><form action="?a=atualizar_comentario" method="post" id="id-form-' + id + '" onblur="sair_da_edicao()"><textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-comentario-' + id + '"  onblur="cancelar_editar_comentario(' + id + ')" rows="3">' + document.getElementById(id).innerText + '</textarea><span><button class="btn mt-1" onclick="atualizar_comentario(' + id + ')">Atualizar</button></span> <button type="button" class="btn mt-1 " onclick="cancelar_editar_comentario(' + id + ' )">Cancelar</button></form>  </div></div></div>'
  document.getElementById('campo-comentario-' + id).focus()
}

// ao iniciar view mostar evento =============================================================================================
function inicio(id) {
console.log(id)
  let divcomentarios = document.getElementById('comentarios')
  $.ajax({
    type: "GET",
    url: '?a=get_comentarios&id_evento='+id,

    success: function (dados) {


      var objeto = JSON.parse(dados);

console.log(dados)
      var comentarios = objeto
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/'+elemento.foto+'" alt="" class="img_perfil">  <span class="nome">'+elemento.nome+'</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

      });
      document.getElementsByName('comentario').value = ''
      return

    },
    error: function (erro) {
      console.log(erro)
    }
  });
}


//cancelar a ediçao do comentario  ========================================================================================
function cancelar_editar_comentario(id) {

  let divcomentarios = document.getElementById('edit-com-' + id)

  $.ajax({
    type: "GET",
    url: '?a=get_comentario&id_comentario=' + id,

    success: function (dados) {

      var objeto = JSON.parse(dados);

      divcomentarios.innerHTML = ' <div class="col-12 mt-2"  id="edit-com-' + id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">  <span class="nome">Leticia Lima</span><div class="seta"></div><div ><p class="comentario" id="' + id + '">' + objeto[0].comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + id + ')">Editar</a>  </div> </div> </div> </div></div>'


    },
    error: function (erro) {
      console.log(erro)
    }
  });


}


function form_cadastro(form) {
  let frm = $('#' + form)

  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=form_cadastro',
    data: frm.serialize(),
    
    success: function (dados) {
     console.log(dados)
      if(dados == 1){
        
        window.location.href = "?a=login";
      }else{
        let divmessagem = document.getElementById('info')
        let mesagem =''
        let erros = dados.split(",")
      erros.splice(-1,1)
      erros.forEach((elemento, indice) => {
        mesagem += elemento+' <br>'
       })

    divmessagem.innerHTML =  `<div class="alert alert-danger mt-3" role="alert"> ${mesagem} </div>`
       
      }
    },
    error: function (erro) {
      console.log(erro)
      divcomentarios.innerText = erro.statusCode(erro)
    }
  });
}

//receber dados formulario login==============================================================
function form_login(form) {
  let frm = $('#' + form)
  let divmessagem = document.getElementById('info')
  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=form_login',
    data: frm.serialize(),
    
    success: function (dados) {
     console.log(dados)
     if(dados != 1){
    divmessagem.innerHTML =  `<div class="alert alert-danger mt-3" role="alert"> ${dados} </div>`

     }else{
      window.location.href = "?a=inico";
     }
     
    },
    error: function (erro) {
      console.log(erro)
     
    }
  });
}

//receber dados formulario cadastro de evento ==============================================================
function form_evento() {
  let frm = $('#form-evento')

  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=form_cadastro_evento',
    data: frm.serialize(),
    
    success: function (dados) {
     console.log(dados)
  
     
     
    },
    error: function (erro) {
      console.log(erro)
     
    }
  });
}
//receber dados formulario cadastro de evento ==============================================================
function todos_eventos() {
  var div_eventos = document.getElementById('div_eventos')
 //var div_eventos = $('#div_eventos')

  $.ajax({
    type: "GET",
    url: '?a=todos_eventos',
    
    
    success: function (dados) {
     
     let objeto = JSON.parse(dados);
     console.log(objeto)
     //console.log(dados)


     var eventos = objeto
   
     eventos.forEach((evento, indice) => {

      div_eventos.innerHTML +=   `<div class="col my-3" id="div_evento_${evento.id_evento}">

      <div class="card shadow" style="width: 18rem;">
        <img src="../core/resources/images/${evento.imagem}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title ">${evento.titulo}</h5>
          <span id="cidade" ><strong>${evento.cidade}</strong> </span><br>
          <span id="dia" ><strong>${evento.data}</strong> </span>
          
          <p class="card-text text-start">${evento.descricao} </p>
          <div class="info text-start">
            <span><i class="fa-solid fa-person-dress"></i> Entrada Mulher: <strong id="entrada">${evento.valor_mulher}</strong></span>
            <br>
            <span><i class="fa-solid fa-person"></i> Entrada Homen: <strong id="entrada">${evento.valor_homem}</strong></span> <br>
            <span><i class="fa-solid fa-location-dot"></i> Local: <strong>${evento.local}</strong> </span> <br>
            <span><i class="fa-solid fa-clock"></i> Horario: <strong>${evento.horario} </strong> </span>
          </div>
        </div>
        <div class="foote-card">
          <p class="mt-3 ma-5 pfooter"><a href="?a=ver_evento&ev=${evento.id_evento}" class="btn  ">Ver evento</a> <button
            id="btn_presenca_${evento.id_evento}"  onclick="confirmar_presenca(${evento.id_evento})" class="btn btn-c  btn-conf">Presença confirmada <i class="fa-solid fa-circle-check"></i></button>
        </div>
      </div>
    </div>`

     });


     
    },
    error: function (erro) {
      console.log(erro)
     
    }
  });
}





