

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
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})"  class="btn">excluir</button> <button onclick="remover_produtor(${objeto.id_u})" class="btn btn-r" >Remover dos produtores</button> <button onclick="eventos_usuario(${objeto.id_u})" class="btn">ver eventos</button></p>`

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
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})"  class="btn">excluir</button> <button onclick="remover_produtor(${objeto.id_u})" class="btn btn-r">Remover dos produtores</button> <button onclick="eventos_usuario(${objeto.id_u})" class="btn">ver eventos</button></p>`

        } else {
          btns = `<p><button onclick="excluir_usuario(${objeto.id_u})" class="btn">excluir</button> <button  onclick="add_produtor(${objeto.id_u})" class="btn btn-c">Adicionar aos produtores</button> <button onclick="eventos_usuario(${objeto.id_u})" class="btn">ver eventos</button> </p>`

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
function eventos_usuario(id_u) {
  console.log(id_u)

  $.ajax({
    type: "POST",
    url: '?a=eventos_usuario',
    data: {"id_usuario": id_u},

    success: function (dados) {
      console.log(dados)
      if(dados == 0){
        document.getElementById('info_user').innerHTML +=`<div class="alert alert-danger mt-3" role="alert">Esse usuario nao tem eventos </div>`
      }

    },
    error: function (erro) {
      console.log(erro)

    }
  });
}
