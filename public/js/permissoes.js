$(document).ready(function () {

  $(".btn-permissoes-user").click(function () {
    $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();
    if ($nome == 'Desativado') {
      Swal.fire({
        title: 'Não é possível alterar permissão de usúario desativado.',
        icon: 'error',
      })
    } else {
      $.ajax({
        method: "POST",
        url: "../permissoes/buscaPermissao",
        data: {
          'id': $id,
        },
        timeout: 15000,
        dataType: 'json',
        success: function (retorno) {
          $("#modal-permissao-usuarios").modal();
          if (retorno['permissaoCadastro'] == 0) {
            $("#primeiroOptionCadastro").html('Não permitido');
            $("#primeiroOptionCadastro").val('0');
            $("#segundoOptionCadastro").html('Ativar Permissão');
            $("#segundoOptionCadastro").val('1');
          } else {
            $("#primeiroOptionCadastro").html('Permitido');
            $("#primeiroOptionCadastro").val('1');
            $("#segundoOptionCadastro").html('Desativar Permissão');
            $("#segundoOptionCadastro").val('0');
          }
          if (retorno['permissaoRefeicao'] == 0) {
            $("#primeiroOptionRefeicao").html('Não permitido');
            $("#primeiroOptionRefeicao").val('0');
            $("#segundoOptionRefeicao").html('Ativar Permissão');
            $("#segundoOptionRefeicao").val('1');
          } else {
            $("#primeiroOptionRefeicao").html('Permitido');
            $("#primeiroOptionRefeicao").val('1');
            $("#segundoOptionRefeicao").html('Desativar Permissão');
            $("#segundoOptionRefeicao").val('0');
          }
        }
      })
    }
  })

  $("#btnAtualzaPermissao").click(function () {
    $selectPermissaoCadastro = $("#selectPermissaoCadastro").val()
    $selectPermissaoRefeicao = $("#selectPermissaoRefeicao").val()
    $.ajax({
      method: "POST",
      url: "../permissoes/AtualizaPermissao",
      data: {
        'permissaoCadastrar': $selectPermissaoCadastro,
        'permissaoRefeissoes': $selectPermissaoRefeicao,
        'id': $id
      },
      timeout: 15000,
      dataType: 'json',
      success: function (retornoPermissoes) {
        if (retornoPermissoes == true) {
          Swal.fire({
            title: 'Permissões alteradas com sucesso!',
            icon: 'success',
          })
        } else {
          Swal.fire({
            title: 'Nenhuma alteração realizada!',
            icon: 'error',
          })
        }
      }
    })
  })

  $("#btnFechaModalPermissoes").click(function () {
    $('#form-permissoes')[0].reset();
  })

  $(".btn-edita-user").click(function () {
    $("#modal-edita-usuarios").modal();
    $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();
    alert($nome + ' ' + $id)
    $.ajax({
      method: "POST",
      url: "consulta_funcionario/teste",
      data: {
        'id': $id,
        'situacao': 0
      },
      timeout: 15000,
      dataType: 'json',
    })
  })
});