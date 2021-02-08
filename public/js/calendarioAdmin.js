$(document).ready(function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        events: 'cardapio/list_refeicao',
        dayMaxEventRows: 3,
        moreLinkContent: '+ Ver mais',
        height: 'auto',
        eventClick: function (info) {
            let $idEvento = info.event.id;
            $.ajax({
                method: "POST",
                url: "cardapio/consultaData",
                data: {
                    'id': $idEvento
                },
                timeout: 15000,
                dataType: 'json',
                success: function (retorno) {
                    let $idEvento = info.event.id;
                    let $titulo = info.event.title;
                    let $color = info.event.backgroundColor
                    let $cardapio = retorno['descricao'];
                    let $dataInicial = retorno['start'];
                    let $dataFim = retorno['end'];
                    $("#modalEventos").modal();
                    $("#idEvento").val($idEvento);
                    $("#inicioEvento").val($dataInicial);
                    $("#fimEvento").val($dataFim);
                    $("#tituloEvento").val($titulo);
                    $("#cardapioRefeicao").val($cardapio);
                    $("#favcolor").val($color);
                }
            })

        }
    });
    calendar.render();
});