

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
function comentar(id_form) {
  //div dos comentarios
  let divcomentarios = document.getElementById('comentarios')

  //texto do comentario
  let frm = $('#' + id_form)

  frm.submit(function (e) {

    e.preventDefault()

  })
  $.ajax({
    type: "POST",
    url: '?a=post_comentario',
    data: frm.serialize(),

    success: function (dados) {


      var objeto = JSON.parse(dados);
      var comentarios = objeto
      
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">  <span class="nome">Leticia Lima</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

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
// editar comentario  =========================================================================================================
function editar_comentario(id) {

  
  document.getElementById('edit-com-' + id).innerHTML = ' <div class="col-12"> <div class="ver_evento">  <div class="corpo_evento"> <img src="../core/resources/images/logo3.jpg" alt="" class="img_perfil">     <span class="nome">jhon Lennon Silva</span><br><form action="?a=post_comentario" method="post" id="text_comentario"><textarea class="form-control mt-1" placeholder="Faça um comentário." name="comentario" id="campo-comentario-' + id + '" value="" rows="3">' + document.getElementById(id).innerText + '</textarea><span><button class="btn mt-1" onclick="comentar(text_comentario)" c>Atualizar</button></span> <button type="button" class="btn mt-1 " onclick="cancelar_editar_comentario(' + id + ' )">Cancelar</button></form>  </div></div></div>'

}

// ao iniciar view mostar evento =============================================================================================
function inicio() {
  
  let divcomentarios = document.getElementById('comentarios')
  $.ajax({
    type: "GET",
    url: '?a=get_comentarios',

    success: function (dados) {

      var objeto = JSON.parse(dados);
      var comentarios = objeto
      divcomentarios.innerHTML = ''
      comentarios.forEach((elemento, indice) => {

        divcomentarios.innerHTML += ' <div class="col-12 mt-2"  id="edit-com-' + elemento.id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">  <span class="nome">Leticia Lima</span><div class="seta"></div><div ><p class="comentario" id="' + elemento.id + '">' + elemento.comentario + '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + elemento.id + ')">Editar</a>  </div> </div> </div> </div></div>'

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
function cancelar_editar_comentario(id){

let divcomentarios = document.getElementById('edit-com-'+id)

  $.ajax({
    type: "GET",
    url: '?a=get_comentario&id_comentario='+id,
   
    success: function (dados) {

      var objeto = JSON.parse(dados);

      divcomentarios.innerHTML = ' <div class="col-12 mt-2"  id="edit-com-' + id + '"> <div class="ver_evento"> <div class="corpo_evento">  <img src="../core/resources/images/m.jpg" alt="" class="img_perfil">  <span class="nome">Leticia Lima</span><div class="seta"></div><div ><p class="comentario" id="' + id + '">' +objeto[0].comentario+ '</p></div><div class="row"><div class="col-12 text-end"> <a class="btn-editar-comentario m-end" onclick="editar_comentario(' + id+ ')">Editar</a>  </div> </div> </div> </div></div>'

      
    },
    error: function (erro) {
      console.log(erro)
    }
  });


}







