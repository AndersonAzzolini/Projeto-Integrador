$(document).ready(function () {

  $("#btn-update-usuario").click(function () {
    $.ajax({
      method: "POST",
      url: "cadastro_funcionario/updateFuncionario",
      data: $('#form-update-usuario').serialize(),
      timeout: 15000,
      dataType: 'json',
      success: function (retorno) {
        if (retorno == true) {
          Swal.fire({
            title: 'Informações alteradas com sucesso',
            icon: 'success',
          })
        } else {
          Swal.fire({
            title: 'Nenhuma alteração realizada',
            icon: 'error',
          })

        }
      }
    })
  })

  $('.form-check-input').click(function () {
    $ArrayIdAtivos = [];
    $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();

    if ($nome == "Ativo") {
      $nome = 'Desativado';
      $.ajax({
        method: "POST",
        url: "consulta_funcionario/AlteraSituacao",
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
      $.ajax({
        method: "POST",
        url: "consulta_funcionario/AlteraSituacao",
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

  $("#btnEditaRefeicao").click(function () {
    let $dataInicio = $("#inicioEvento").val()
    let $dataFinal = $("#fimEvento").val()
    $.ajax({
      method: "POST",
      url: "cardapio/buscadata",
      data: $("#form-edita-refeicao").serialize(),
      timeout: 15000,
      dataType: 'json',
      success: function (retorno) {
        if (retorno['result'] == 'dateFalse') {
          Swal.fire({
            title: 'Hora inicial não pode ser maior que a final!!',
            icon: 'error',
          })
        } else if (retorno == false) {
          Swal.fire({
            title: 'Hora inicial não pode ser igual data final!!',
            icon: 'error',
          })
        } else if (retorno == true) {
          Swal.fire({
            title: 'Cardapio atualizado com sucesso!!',
            icon: 'success',
          })
        } else {
          Swal.fire({
            title: 'Nenhuma alteração realizada!!',
            icon: 'error',
          })
        }
      }
    })
  })


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
        senha: "Campo Obrigatório",
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
          url: "cadastro/cadastroEmpresa",
          data: $('#form-cadastro-empresa').serialize(),
          timeout: 15000,
          dataType: 'json'
        }).done(function (retorno) {
          if (retorno['result'] == 'cadastrado') {
            Swal.fire({
              title: 'Email já cadastrado no sistema!',
              icon: 'error',
            })
          } else {
            Swal.fire({
              title: 'Cadastro realizado com sucesso!!',
              icon: 'success',
            })
            $("#form-cadastro-empresa")[0].reset();
          }
        });
      }
    });
  });

  $("#btnCadastraRefeicao").click(function () {
    $("#modalCadastroCardapio").modal();
  })

  $("#btnEnviaRefeição").click(function () {
    $.ajax({
      method: "POST",
      url: "cardapio/cadastro_refeicao",
      data: $('#form-refeicao').serialize(),
      timeout: 15000,
      dataType: 'json',
      success: function (retorno) {
        if (retorno == null) {
          Swal.fire({
            title: 'Preenhca todos os campos por favor!!',
            icon: 'error',
          })
        } else if (retorno['result'] == 'dateFalse') {
          Swal.fire({
            title: 'Hora inicial não pode ser maior que a final!!',
            icon: 'error',
          })
        } else if (retorno == false) {
          Swal.fire({
            title: 'Hora inicial não pode ser igual data final!!',
            icon: 'error',
          })
        } else if (retorno == true) {
          Swal.fire({
            title: 'Refeição inserida com sucesso!!',
            icon: 'success',
          })
        } else {
          wal.fire({
            title: 'Erro ao cadastrar Refeição!!',
            icon: 'error',
          })
        }
      }
    })
  })

  $(".btn-edita-user").click(function () {
    $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();
    $.ajax({
      method: "POST",
      url: "consulta_funcionario/buscaDadosFuncionario",
      data: {
        'id': $id,
      },
      timeout: 15000,
      dataType: 'json',
      success: function (retorno) {
        $("#modal-edita-usuarios").modal();
        $("#nomeFuncionario").val(retorno['nome']);
        $("#sobrenomeFuncionario").val(retorno['sobrenome']);
        $("#emailFuncionario").val(retorno['email']);
        $("#senhaFuncionario").val(retorno['senha']);
        $("#idFuncionario").val(retorno['id']);
      }
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