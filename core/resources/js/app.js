


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




function comentt() {
  var divcomentarios = document.getElementById('comentarioss')
  var comentarios = [
    { nome: 'Leticia Lima', comentarios: 'escriçao: Lorem ipsum dolor sitconsequuntur totam quas tempore reiciendis, blanditiis, delectus autem temporibus dolor amet consectetur adipisicing e laboriosam architecto doloribus ad commodi repudianda' },
    { nome: 'Amanda vieira', comentarios: 'escriçao: Lorem ipsum dolor sitconsequuntur totam quas tempore reiciendis, blanditiis, delectus autem temporibus dolor amet consectetur adipisicing e laboriosam architecto doloribus ad commodi repudianda' },
    { nome: 'Lais silva', comentarios: 'escriçao: Lorem ipsum dolor sitconsequuntur totam quas tempore reiciendis, blanditiis, delectus autem temporibus dolor amet consectetur adipisicing e laboriosam architecto doloribus ad commodi repudianda' }
  ]

  comentarios.forEach((elemento, indice) => {

    divcomentarios.innerHTML += '<div class="col-12 mt-2"><div class="ver_evento"><div class="corpo_evento"><img src="../resources/images/m.jpg" alt="" class="img_perfil"><span class="nome">' + elemento.nome + '</span><div class="seta"></div><p class="comentario">' + elemento.comentarios + '</p><div class="row"><div class="col-12 text-end"><a class="btn-editar-comentario m-end" data-bs-toggle="modal"  href="#exampleModalToggle" role="button">Editar</a></div></div></div></div></div>'

  });


}

function add_coment() {
  console.log('chegou')
  axios.get('http://localhost/eventos_bico/public/script_php')


    .then(function (response) {
      // handle success
      console.log(response.data);


    })
    .catch(function (error) {


      console.log(error);
    })
    .then(function () {

    });
}

function post_teste() {







  //axios.post('http://localhost/eventos_bico/public/script_php', {
  // nome: 'Santos',
  //   comentario: 'Dumont'
  // })


  axios({
    method: 'post', // verbo http
    url: 'http://localhost/eventos_bico/public/com', // url
    data: {
      nome: 'Santos',
      comentario: 'gggh'
    }
  })
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {
      console.error(error);
    });
}






function add_comentario() {
  var coment = document.getElementById('campo-momentario')
  console.log(coment.value)
  axios({
    method: 'post',
    url: 'script_php',
    data: {
      nome: 'Santos',
      comentario: coment.value
    }
  })
    .then(function (response) {
      var divcomentarios = document.getElementById('comentarioss')


      let comentarios = response.data
      console.log(comentarios);

      coment.value = ''
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += '<div class="col-12 mt-2"><div class="ver_evento"><div class="corpo_evento"><img src="../resources/images/m.jpg" alt="" class="img_perfil"><span class="nome">teste</span><div class="seta"></div><p class="comentario">' + elemento.comentario + '</p><div class="row"><div class="col-12 text-end"><a class="btn-editar-comentario m-end" data-bs-toggle="modal"  href="#exampleModalToggle" role="button">Editar</a></div></div></div></div></div>'

      });
    })
    .catch(function (error) {
      console.error(error);
    });
}



function aja() {
  var divcomentarios = document.getElementById('comentarioss')
  var comenta = document.getElementById('campo-momentario')
console.log('chegei')

  $.ajax({
      type: "POST",
      url: '?a=post_comentario',
      data: {
          nome: 'Santos',
          comentario: comenta.value,
          
      },
      success: function (dados) {


         var objeto = JSON.parse(dados);

          console.log(objeto)


          var comentarios = objeto
          divcomentarios.innerHTML = ''
          comentarios.forEach((elemento, indice) => {

             divcomentarios.innerHTML += '<p>' + elemento.comentario + '</p>'
          }
          
          );





      },
      error: function (erro) {
          console.log(erro)
      }
  });
}













require('./bootstrap');
