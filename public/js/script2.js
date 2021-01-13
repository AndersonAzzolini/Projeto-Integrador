$(document).ready(function () {

  $(".checkbox").click(function () {
    alert('te')
    let $nome = $(this).parent().closest("tr").children('td:eq(1)').text().trim();
    let $id = $(this).parent().closest("tr").children('td:eq(3)').text().trim();
    $ArrayIdAtivos= []; 
    $ArrayIdAtivos.push($id);
   

    if ($nome == "Ativo") {
      alert($nome);
      $nome = 'Desativado';
      $('#' + $id).html('Desativado')
      //  ($(this).attr('idFuncionario').remove())
      //$ArrayIdAtivos.splice($ArrayIdAtivos.indexOf($id));
      alert($ArrayIdAtivos);

    } else if ($nome == "Desativado") {

      alert('caiu no desativado');
      $nome = 'Ativo';
      alert($nome);

    }
  })

});