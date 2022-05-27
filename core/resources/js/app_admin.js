

function form_login(form) {
  let frm = $('#' + form)
  let divmessagem = document.getElementById('info_login')
  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=form_login_admin',
    data: frm.serialize(),

    success: function (dados) {


      if (dados != 1) {
        console.log(dados)
        divmessagem.innerHTML = `<div class="alert alert-danger mt-3" role="alert">Login invalido</div>`

      } else {
        console.log(dados)
        window.location.href = "?a=inico";
      }

    },
    error: function (erro) {
      console.log(erro)

    }
  });
}

function get_cidades() {

  $.ajax({
    type: "GET",
    url: '?a=get_cidades',

    success: function (dados) {
      var objeto = JSON.parse(dados);

      document.getElementById('city').innerHTML = ''
      objeto.forEach((cidade, indice) => {
        document.getElementById('city').innerHTML += `<li><a class="dropdown-item" href="?a=cidades&city=${cidade.cidade}">${cidade.cidade}</a></li> `

      })
    },
    error: function (erro) {
      console.log(erro)
    }
  });


}
function pesquisar_usuario() {
  let frm = $('#pesquisa_u')

  console.log(frm)
  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=buscar_usuario',
    data: frm.serialize(),

    success: function (dados) {

      if (dados != 0) {
        var objeto = JSON.parse(dados);
        let atu = `<p>Nunca atualizado</p>`
        if (objeto.atualizado != 0) {
          let atu = `<p>ultima atualizaçao em ${objeto.atualizado}</p>`
        }
        let btns = ''
        if (objeto.produtor == 1) {
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})"  class="btn">excluir</button> <button onclick="remover_produtor(${objeto.id_u})" class="btn btn-r" >Remover dos produtores</button> <button onclick="eventos_usuario_count(${objeto.id_u})" class="btn">ver eventos</button></p>`

        } else {
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})" class="btn">excluir</button> <button  onclick="add_produtor(${objeto.id_u})" class="btn btn-c">Adicionar aos produtores</button> </p>`

        }

        document.getElementById('info_user').innerHTML = ` <img class="img-perfil " src="../../core/resources/images/usuarios/${objeto.foto}" alt="">
        <p class="mt-2">${objeto.nome}</p>
        <p>${objeto.email}</p>
        <p>cadastrado em ${objeto.cadastrado}</p>
        ${atu}
        ${btns}
        `
      } else {
        document.getElementById('info_user').innerHTML = ` <div class="alert alert-danger mt-3" role="alert">Nenhum resultado</div>`
      }

      console.log(dados)


    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
function refazer_pesquisar_usuario(email) {
 
  
  $.ajax({
    type: "POST",
    url: '?a=buscar_usuario',
    data: {"email_usuario": email},

    success: function (dados) {

      if (dados != 0) {
        var objeto = JSON.parse(dados);
        let atu = `<p>Nunca atualizado</p>`
        if (objeto.atualizado != 0) {
          let atu = `<p>ultima atualizaçao em ${objeto.atualizado}</p>`
        }
        let btns = ''
        if (objeto.produtor == 1) {
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})"  class="btn">excluir</button> <button onclick="remover_produtor(${objeto.id_u})" class="btn btn-r">Remover dos produtores</button> <button onclick="eventos_usuario_count(${objeto.id_u})" class="btn">ver eventos</button></p>`

        } else {
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})" class="btn">excluir</button> <button  onclick="add_produtor(${objeto.id_u})" class="btn btn-c">Adicionar aos produtores</button> <button onclick="eventos_usuario_count(${objeto.id_u})" class="btn">ver eventos</button> </p>`

        }

        document.getElementById('info_user').innerHTML = ` <img class="img-perfil " src="../../core/resources/images/usuarios/${objeto.foto}" alt="">
        <p class="mt-2">${objeto.nome}</p>
        <p>${objeto.email}</p>
        <p>cadastrado em ${objeto.cadastrado}</p>
        ${atu}
        ${btns}
        `
      } else {
        document.getElementById('info_user').innerHTML = ` <div class="alert alert-danger mt-3" role="alert">Nenhum resultado</div>`
      }

      console.log(dados)


    },
    error: function (erro) {
      console.log(erro)

    }
  });
}

function excluir_usuario(id_u) {
  console.log(id_u)

  $.ajax({
    type: "POST",
    url: '?a=excluir_usuario',
    data: {"id_usuario": id_u},

    success: function (dados) {
      console.log(dados)
     /*  if(dados = 1){
        document.getElementById('info_user').innerHTML = `<div class="alert alert-success mt-3" role="alert">Usuario excluido.</div>`
      }else{
        document.getElementById('info_user').innerHTML = `<div class="alert alert-danger mt-3" role="alert">Erro</div>`

      } */

    },
    error: function (erro) {
      console.log(erro)

    }
  });

}

function add_produtor(id_u) {
  console.log(id_u)

  $.ajax({
    type: "POST",
    url: '?a=add_produtor',
    data: {"id_usuario": id_u},

    success: function (dados) {
      console.log(dados)
     refazer_pesquisar_usuario(dados)
    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
function remover_produtor(id_u) {
  console.log(id_u)

  $.ajax({
    type: "POST",
    url: '?a=remover_produtor',
    data: {"id_usuario": id_u},

    success: function (dados) {
      console.log(dados)
      refazer_pesquisar_usuario(dados)
    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
function eventos_usuario_count(id_u) {
  console.log(id_u)

  $.ajax({
    type: "POST",
    url: '?a=eventos_usuario_count',
    data: {"id_usuario": id_u},

    success: function (dados) {
      console.log(dados)
      if(dados == 0){
        document.getElementById('info_user').innerHTML +=`<div class="alert alert-danger mt-3" role="alert">Esse usuario nao tem eventos </div>`
      }else if(dados == 1){
        window.location.href = "?a=eventos_do_usuario&id_u="+id_u;
      }

    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
//==============================================================================================
function usuario_eventos(id_usuario) {
  var div_eventos = document.getElementById('div_eventos')
  //var div_eventos = $('#div_eventos')

  $.ajax({
    type: "GET",
    url: '?a=eventos_usuario&id_u='+id_usuario,


    success: function (dados) {
      console.log(dados)
      let objeto = JSON.parse(dados);
      console.log(objeto)
      //console.log(dados)

      
      var eventos = objeto
      btn_presenca = '<a href="?a=login" class="btn btn-n-c  btn-conf  ">Confirmar presença</a>  '
       eventos.forEach((evento, indice) => {
     /*    if(evento.presenca == 0){
          btn_presenca = ` <button  id="btn_presenca_${evento.id_evento}"  onclick="confirmar_presenca(${evento.id_evento})" class="btn btn-n-c  btn-conf">Confirmar presença <i class="fa-solid fa-check"></i></button>`
        }else if(evento.presenca == 1){
          btn_presenca = ` <button  id="btn_presenca_${evento.id_evento}"  onclick="confirmar_presenca(${evento.id_evento})" class="btn btn-c  btn-conf">Presença confirmada <i class="fa-solid fa-circle-check"></i></button>`

        }  */

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

function excluir_evento(id_evento){
  console.log(id_evento)
  $.ajax({
    type: "POST",
    url: '?a=delete_usuario',
    data: {"id_evento": id_evento},

    success: function (dados) {
      console.log(dados)
      if(dados == 1){
        document.getElementById('ev'+id_evento).innerHTML =' <h5 style="color: red;" class="mt-3 text-center"><strong>Evento excluido</strong></h5>'
        
      }

    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
  

