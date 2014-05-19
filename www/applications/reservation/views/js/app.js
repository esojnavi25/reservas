
var reservation = {
  seats:0
};

$(document).ready(function () {
  //Inicializar toda la tabla de Asientos
  // $('#myModal').modal('show');

  $('.seat').removeClass('btn-default');
  $('.seat').addClass('btn-success');
  $('.seat').data('status', 'free');


  // Listener del boton de reservacion de asientos

  $('#btn-reserv').on('click', function() {
    BootstrapDialog.confirm('¿Desea confirmar su reserva?', function(result){
      if(result) {
        alert('Yup.');
      }else {
        alert('Nope.');
      }
    });
  });


  //Listener de acciones del click de cada Asiento
  //En esta section se debe hacer las llamadas al servidor y actualizar el color del asiento
  //
  $('.seat').each(function(){
    $( this ).on('click', function(){

      switch($(this).data('status')){ //Iterar en el estado del asiento
      case 'free':
        if(reservation.seats < 5){
          $( this ).removeClass('btn-success');
          $( this ).addClass('btn-default');
          $(this).data('status', 'mine');
          reservation.seats++;
          $('#my-seats-list').append("<li id=\"list-" + $(this).data('position') + "\">" + $(this).data('position') + "</li>");
        }else{
          BootstrapDialog.alert({
            type: BootstrapDialog.TYPE_WARNING,
            title: 'Alerta!!!',
            message: 'Solo se tiene un maximo de 5 asientos por reservación.'
          });
        }
        break;

      case 'reserved':
        BootstrapDialog.alert({
          type: BootstrapDialog.TYPE_WARNING,
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra reservado'
        });
        break;

      case 'aparted':
        BootstrapDialog.alert({
          type: BootstrapDialog.TYPE_WARNING,
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra apartado por otro usuario.'
        });
        break;

      case 'mine':
        $( this ).removeClass('btn-default');
        $( this ).addClass('btn-success');
        $(this).data('status', 'free');
        reservation.seats--;
        var pos = "#list-" + $(this).data('position');
        $(pos).remove();
        break;

      default:
        break;
      }
    });
  });

  // $(window).bind('beforeunload', function(){
  //   return 'Al salir de la pagina se perdera su reserva y sus asientos apartados';
  // });

});
