$(document).ready(function () {

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

  $("#btnCadastraRefeicao").click(function () {
    $("#modalCadastroCardapio").modal();
    $("#btnEnviaRefeição").click(function () {
      $("#form-refeicao").validate({
        rules: {
          nomeRefeicao: "required",
        },
        messages: {
          nomeRefeicao: "Campo obrigatório",
        },
        errorPlacement: function (error, element) {
          error.insertAfter(element).addClass("text-danger");
        },
        errorClass: "is-invalid",
        submitHandler: function (form) {
          $.ajax({
            method: "POST",
            url: "admin/cardapio/cadastro_refeicao",
            data: $('#form-refeicao').serialize(),
            timeout: 15000,
            dataType: 'json',
            success: function (retorno) {
              alert(retorno);
            }
          })
        }
      });
    })
  })


  $("#btn-cadastro-funcionario").click(function () {
    $("#form-cadastro-funcionario").validate({
      rules: {
        nomeFuncionario: "required",
        senhaFuncionario: "required",
        sobrenomeFuncionario: "required",
        emailFuncionario: {
          required: true,
          email: true
        }
      },
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
        error.insertAfter(element).addClass("text-danger");
      },
      errorClass: "is-invalid",
      submitHandler: function (form) {
        $.ajax({ 
          method: "POST",
          url: "cadastro_funcionario/registerFuncionario",  
          data: $('#form-cadastro-funcionario').serialize(),
          timeout: 15000,
          dataType: 'json',
          success: function (retorno) { 
            if (retorno['result'] == "cadastrado") {
              Swal.fire({
                title: 'Email já cadastrado!',
                icon: 'error',
              })
            } else {
              Swal.fire({
                title: 'Funcionário cadastrado com sucesso!',
                icon: 'success',
              })
              $('#form-cadastro-funcionario')[0].reset();
            }
          }
        })
      }
    });
  });

  $("#btn-cadastro-empresa").click(function () {
    $("#form-cadastro-empresa").validate({
      rules: {
        nome: "required",
        senha: "required",
        nomeEmpresa: "required",
        email: {
          required: true,
          email: true
        }
      },
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
        error.insertAfter(element).addClass("text-danger");
      },
      errorClass: "is-invalid",
      submitHandler: function (form) {
        $.ajax({
          method: "POST",
          url: "cadastro/index",
          data: $('#form-cadastro-empresa').serialize(),
          timeout: 15000,
          dataType: 'json'
        }).done(function (retorno) {
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


  $("#btnCadastraRefeicao").click(function () {
    $("#modalCadastroCardapio").modal();
    $("#btnEnviaRefeição").click(function () {
      $.ajax({
        method: "POST",
        url: "cardapio/cadastro_refeicao",
        data: $('#form-refeicao').serialize(),
        timeout: 15000,
        dataType: 'json',
        success: function (retorno) {
          alert(retorno);
        }
      })

    })
  })



  $('.dataTable').DataTable({
    "language": {
      "lengthMenu": "_MENU_ registros por página",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros)",
      "search": "Pesquisar:",
      "paginate": {
        "first": "Primeira",
        "last": "Última",
        "next": "Próxima",
        "previous": "Anterior"
      }
    },
    "lengthMenu": [[150, 300, 500, -1], [150, 300, 500, "Todos"]],
  });
  $('[data-toggle="tooltip"]').tooltip()

});