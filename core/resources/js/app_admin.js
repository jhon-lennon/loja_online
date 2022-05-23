

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
          
        }else{
            console.log(dados)
          window.location.href = "?a=inico";
        }
  
      },
      error: function (erro) {
        console.log(erro)
  
      }
    });
  }