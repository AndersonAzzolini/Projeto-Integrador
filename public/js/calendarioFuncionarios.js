$(document).ready(function () {
    var calendarE2 = document.getElementById('calendarioFuncionarios');
    var calendario = new FullCalendar.Calendar(calendarE2, {
      events: 'cardapio/list_refeicao',
      dayMaxEventRows: 3,
      moreLinkContent: '+ Ver mais',
      height: 'auto',
    
    });
    calendario.render();
  

});