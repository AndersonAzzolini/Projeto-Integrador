$(document).ready(function () {

  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      right: 'prev,next,today,dayGridMonth'
    },
    height: 'auto',
    locale: "pt-br",
    editable: true,
    eventLimit: true,
    dateClick: function(info) {
      alert('clicado em: ' + info.dateStr);
      alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
      alert('Current view: ' + info.view.type);
    },
  
    eventClick: function(info) {
      alert('Event: ' + info.event.title);
      alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
      alert('View: ' + info.view.type);
  
      // change the border color just for fun
      info.el.style.borderColor = 'red';
    },
    events: 'cardapio.php'
  });
  calendar.render();


  $("#btn-cadastro-funcionario").click(function () {
    $("#form-cadastro-funcionario").validate({
      rules: {
        // Campos obrigatórios
        nomeFuncionario: "required",
        senhaFuncionario: "required",
        sobrenomeFuncionario: "required",
        emailFuncionario: {
          required: true,
          email: true
        }
      },
      // Mensagens de erro para cada campo
      messages: {
        nomeFuncionario: "Campo Obrigatório",
        sobrenomeFuncionario: "Campo Obrigatório",
        senhaFuncionario: "Campo Obrigatório",
        emailFuncionario: {
          required: "Campo Obrigatório",
          email: "Insira um email valido!"
        }
      },
      errorPlacement: function (error, element) {
        // Aplica css nas menssagens de erro, conforme classe do bootsrap
        error.insertAfter(element).addClass("text-danger");
      },
      errorClass: "is-invalid",
      submitHandler: function (form) {
        $.ajax({ //Começa requisição para o servidor 
          method: "POST",
          url: "cadastro_funcionario/registerFuncionario", // Url de destino do form
          data: $('#form-cadastro-funcionario').serialize(), // Dados que serão enviados para o servidor, pega dos inputs no form
          timeout: 15000,
          dataType: 'json',
          success: function (retorno) { // Retorno após requisição ser concluida com sucesso.
            if (retorno['result'] == "cadastrado") {
              Swal.fire({
                title: 'Funcionário já cadastrado!',
                icon: 'error',
              })
            } else {
              Swal.fire({
                title: 'Funcionário cadastrado com sucesso!',
                icon: 'success',
              })
            }
          }
        })
      }
    });
  });

  $("#btn-cadastro-empresa").click(function () {
    $("#form-cadastro-empresa").validate({
      rules: {
        // Campos obrigatórios
        nome: "required",
        senha: "required",
        nomeEmpresa: "required",
        email: {
          required: true,
          email: true
        }
      },
      // Mensagens de erro para cada campo
      messages: {
        nome: "Campo Obrigatório",
        sobrenome: "Campo Obrigatório",
        nomeEmpresa: "Campo Obrigatório",
        email: {
          required: "Campo Obrigatório",
          email: "Insira um email valido!"
        }
      },
      errorPlacement: function (error, element) {
        // Aplica css nas menssagens de erro, conforme classe do bootsrap
        error.insertAfter(element).addClass("text-danger");
      },
      errorClass: "is-invalid",
      submitHandler: function (form) {
        $.ajax({ //Começa requisição para o servidor 
          method: "POST",
          url: "cadastro/index", // Url de destino do form
          data: $('#form-cadastro-empresa').serialize(), // Dados que serão enviados para o servidor, pega dos inputs no form
          timeout: 15000,
          dataType: 'json'
        }).done(function (retorno) { // Retorno após requisição ser concluida com sucesso.
          alert("teste")

          if (retorno['result'] == 'cadastrado') {
            alert("caiu no if")
          } else {
            alert("não caiu no if")
          }
        });
      }
    });
  });

  $('.form-check-input').click(function () {
    $ArrayIdAtivos = [];
    $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();

    if ($nome == "Ativo") {
      $nome = 'Desativado';
      $.ajax({ //Começa requisição para o servidor 
        method: "POST",
        url: "consulta_funcionario/AlteraSituacao", // Url de destino do form
        data: {
          'id': $id,
          'situacao': 0
        },
        timeout: 15000,
        dataType: 'json',
        success: function (retorno) {
          $('#' + $id).html('Desativado')
          if (retorno["result"] == true) {
            Swal.fire({
              title: retorno['mensagem'],
              icon: 'success',
            })
          } else {
            Swal.fire({
              title: retorno['mensagem'],
              icon: 'error',
            })
          }
        }
      })
    } else {
      $nome = 'Ativo';
      $.ajax({ //Começa requisição para o servidor 
        method: "POST",
        url: "consulta_funcionario/AlteraSituacao", // Url de destino do form
        data: {
          'id': $id,
          'situacao': 1
        },
        timeout: 15000,
        dataType: 'json',
        success: function (retorno) {
          $('#' + $id).html('Ativo')
          if (retorno["result"] == "desativado") {
            Swal.fire({
              title: retorno['mensagem'],
              icon: 'success',
            })
          } else {
            Swal.fire({
              title: retorno['mensagem'],
              icon: 'error',
            })
          }
        }
      })
    }
  })

  $('.dataTable').DataTable();

  AOS.init();
});