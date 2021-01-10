$(document).ready(function () {
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
          dataType: 'json'
        }).done(function (retorno) { // Retorno após requisição ser concluida com sucesso.
          alert("teste")

          if (retorno['result'] === 'cadastrado') {
            alert("caiu no if")
          } else {
            alert("não caiu no if")
          }
        });
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

          if (retorno['result'] === 'cadastrado') {
            alert("caiu no if")
          } else {
            alert("não caiu no if")
          }
        });
      }
    });
  });

  AOS.init();
});