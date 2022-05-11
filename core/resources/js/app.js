

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
  let n_comentarios = document.getElementById('n-comentarios')

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


        if (elemento.pertence == 0) {
          divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/usuarios/' + elemento.foto + '" alt="" class="img_perfil">  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"></div> </div> </div> </div></div>'
        } else if (elemento.pertence == 1) {
          divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/usuarios/' + elemento.foto + '" alt="" class="img_perfil">  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

        }
       

       // divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/' + elemento.foto + '" alt="" class="img_perfil">  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

      });

      document.getElementById('campo-momentario').value = ''
      n_comentarios.innerText = comentarios.length + ' Comentarios'
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

        divcomentarios.innerHTML = ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/usuarios' + elemento.foto + '" alt="" class="img_perfil">  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

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


  $.ajax({
    type: "GET",
    url: '?a=get_comentario&id_comentario=' + id,

    success: function (dados) {

      var objeto = JSON.parse(dados);

      document.getElementById('edit-com-' + id).innerHTML = ' <div class="col-12" id="edit-com-' + id + '" onblur="sair_da_edicao()"> <div class="ver_evento">  <div class="corpo_evento"> <img src="../core/resources/images/usuarios/' + objeto[0].foto + '" alt="" class="img_perfil">     <span class="nome">' + objeto[0].nome + '</span><br><form action="?a=atualizar_comentario" method="post" id="id-form-' + id + '" onblur="sair_da_edicao()"><textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-comentario-' + id + '"  onblur="cancelar_editar_comentario(' + id + ')" rows="3">' + document.getElementById(id).innerText + '</textarea><span><button class="btn mt-1" onclick="atualizar_comentario(' + id + ')">Atualizar</button></span> <button type="button" class="btn mt-1 " onclick="excluir_comentario(' + id + ' )">Excluir</button> <button type="button" class="btn mt-1 " onclick="cancelar_editar_comentario(' + id + ' )">Cancelar</button> </form>  </div></div></div>'
      document.getElementById('campo-comentario-' + id).focus()


    },
    error: function (erro) {
      console.log(erro)
    }
  });



}

// ao iniciar view mostar evento =============================================================================================
function inicio(id) {
  console.log(id)
  let divcomentarios = document.getElementById('comentarios')
  let n_comentarios = document.getElementById('n-comentarios')
  $.ajax({
    type: "GET",
    url: '?a=get_comentarios&id_evento=' + id,

    success: function (dados) {

console.log(dados)
      var objeto = JSON.parse(dados);


      var comentarios = objeto
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {
        if (elemento.pertence == 0) {
          divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img class="img_perfil" src="../core/resources/images/usuarios/' + elemento.foto + '" alt="" >  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"></div> </div> </div> </div></div>'
        } else if (elemento.pertence == 1) {
          divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img class="img_perfil" src="../core/resources/images/usuarios/' + elemento.foto + '" alt="" >  <span class="nome">' + elemento.nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

        }

      });
      document.getElementsByName('comentario').value = ''
      n_comentarios.innerText = comentarios.length + ' Comentarios'
      console.log(comentarios.length)
      return

    },
    error: function (erro) {
      console.log(erro)
    }
  });
}


//cancelar a ediçao do comentario  ========================================================================================
function cancelar_editar_comentario(id) {
  setTimeout(() => {

    let divcomentarios = document.getElementById('edit-com-' + id)

    $.ajax({
      type: "GET",
      url: '?a=get_comentario&id_comentario=' + id,

      success: function (dados) {

        var objeto = JSON.parse(dados);

        divcomentarios.innerHTML = ' <div class="col-12 mt-2"  id="edit-com-' + id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/usuarios/' + objeto[0].foto + '" alt="" class="img_perfil">  <span class="nome">' + objeto[0].nome + '</span><div class="seta"></div><div ><p class="comentario" id="' + id + '">' + objeto[0].comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + id + ')">Editar</a>  </div> </div> </div> </div></div>'


      },
      error: function (erro) {
        console.log(erro)
      }
    });
  }, 500);

}

//================================================================================================
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
      if (dados == 1) {

        window.location.href = "?a=login";
      } else {
        let divmessagem = document.getElementById('info')
        let mesagem = ''
        let erros = dados.split(",")
        erros.splice(-1, 1)
        erros.forEach((elemento, indice) => {
          mesagem += elemento + ' <br>'
        })

        divmessagem.innerHTML = `<div class="alert alert-danger mt-3" role="alert"> ${mesagem} </div>`

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
  let divmessagem = document.getElementById('info_login')
  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=form_login',
    data: frm.serialize(),

    success: function (dados) {
      

      if (dados != 1) {
        console.log(dados)
        divmessagem.innerHTML = `<div class="alert alert-danger mt-3" role="alert"> ${dados} </div>`

      } else {
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
      console.log(dados)
      let objeto = JSON.parse(dados);
      console.log(objeto)
      //console.log(dados)

      
      var eventos = objeto
      btn_presenca = '<a href="?a=login" class="btn btn-n-c  btn-conf  ">Confirmar presença</a>  '
      eventos.forEach((evento, indice) => {
        if(evento.presenca == 0){
          btn_presenca = ` <button  id="btn_presenca_${evento.id_evento}"  onclick="confirmar_presenca(${evento.id_evento})" class="btn btn-n-c  btn-conf">Confirmar presença <i class="fa-solid fa-check"></i></button>`
        }else if(evento.presenca == 1){
          btn_presenca = ` <button  id="btn_presenca_${evento.id_evento}"  onclick="confirmar_presenca(${evento.id_evento})" class="btn btn-c  btn-conf">Presença confirmada <i class="fa-solid fa-circle-check"></i></button>`

        }

        div_eventos.innerHTML += `<div class="col my-3" id="div_evento_${evento.id_evento}">

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
        <div class="foote-card" id="card_footer_${evento.id_evento}">
          <p class="mt-3 ma-5 pfooter"><a href="?a=ver_evento&ev=${evento.id_evento}" class="btn  ">Ver evento</a> 
                 ${btn_presenca}
                 </p>
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
//==========================================================================================================================
function confirmar_presenca(id_evento){
  console.log(id_evento)

  $.ajax({
    type: "POST",
    url: '?a=confirmar_presenca',
    data: {"id_evento": id_evento},

    success: function (dados) {

      if(dados == 0){
        document.getElementById('card_footer_'+id_evento).innerHTML = `<p class="mt-3 ma-5 pfooter"><a href="?a=ver_evento&ev=${id_evento}" class="btn  ">Ver evento</a> 
        <button  id="btn_presenca_${id_evento}"  onclick="confirmar_presenca(${id_evento})" class="btn btn-c  btn-conf">Presença confirmada <i class="fa-solid fa-circle-check"></i></button>`
      }else if(dados == 1){
        document.getElementById('card_footer_'+id_evento).innerHTML = `<p class="mt-3 ma-5 pfooter"><a href="?a=ver_evento&ev=${id_evento}" class="btn  ">Ver evento</a> 
        <button  id="btn_presenca_${id_evento}"  onclick="confirmar_presenca(${id_evento})" class="btn btn-n-c  btn-conf">Confirmar presença <i class="fa-solid fa-circle-check"></i></button>`
      }
    },
    error: function (erro) {
      console.log(erro)

    }
  });

}

//==========================================================================================================================
function get_presenca(id_evento){

  $.ajax({
    type: "POST",
    url: '?a=numero_presenca',
    data: {"id_evento": id_evento},

    success: function (dados) {
    
      document.getElementById('confir_pre').innerText = dados+' pessoas confirmaram presença'
      console.log(dados)
    },
    error: function (erro) {
      console.log(erro)

    }
  });

}

//=========================================================================================================================
function confirmar_presenca_no_ver_evento(id_evento){
  var paragrafo = document.getElementById('evento_'+id_evento)
  console.log(paragrafo)


  $.ajax({
    type: "POST",
    url: '?a=confirmar_presenca',
    data: {"id_evento": id_evento},

    success: function (dados) {
      paragrafo.innerHTML =''
      if(dados == 0){
        paragrafo.innerHTML =`<p ><a href="" class="btn  ">Voltar</a> <button onclick="confirmar_presenca_no_ver_evento(${id_evento})" class="btn btn-c">Presença confirmada <i class="fa-solid fa-circle-check"></i></button></p>`
        console.log('cadas')
      }else if(dados == 1){
        paragrafo.innerHTML = `<p ><a href="" class="btn  ">Voltar</a> <button onclick="confirmar_presenca_no_ver_evento(${id_evento})" class="btn btn-n-c">Confirmar presença <i class="fa-solid fa-circle-check"></i></button></p>`
        console.log('remo')
      }
     
     
      //console.log(dados)
     get_presenca(id_evento)
        //console.log(presenca)


    },
    error: function (erro) {
      console.log(erro)

    }
  });


}


function count_comentario(id_com){
  $.ajax({
    type: "POST",
    url: '?a=count_comentario',
    data: {"id_comentario": id_com},

    success: function (dados) {
      console.log(Number(dados))
      document.getElementById('n-comentarios').innerText = Number(dados) - 1+' Comentarios'
   
    },
    error: function (erro) {
      console.log(erro)

    }
  });

  
}



//==========================================================================================================================
function excluir_comentario(id_comentario){
  
  let n_c = count_comentario(id_comentario)
  $.ajax({
    type: "POST",
    url: '?a=excluir_comentario',
    data: {"id_comentario": id_comentario},

    success: function (dados) {
    
      console.log(document.getElementById('edit-com-' + id_comentario))
      document.getElementById('edit-com-' + id_comentario).innerHTML=''
     
    },
    error: function (erro) {
      console.log(erro)

    }
  });

}

//exluir perfil==================================================================================

function excluir_perfil(form){

var frmm = $('#'+form)
var msg = document.getElementById('erro_senha_ex_per')

  console.log(msg)
  frmm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=excluir_perfil',
    data: frmm.serialize(),

    success: function (dados) {
      console.log(dados)
      if(dados == 0){
        msg.innerText = 'Senha invalida'
      }else if(dados == 1){
        window.location.href = "?a=inicio";
      } else{
        msg.innerText = 'erro'
      }

    },
    error: function (erro) {
      console.log(erro)

    }
  });

}






