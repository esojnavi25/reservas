
var reservation = {
  seats:0
};

$(document).ready(function () {
  //Inicializar toda la tabla de Asientos
  // $('#myModal').modal('show');

  $('.seat').removeClass('btn-default');
  $('.seat').addClass('btn-success');
  $('.seat').data('state', 'free');



  //Listener de acciones del click de cada Asiento
  //En esta section se debe hacer las llamadas al servidor y actualizar el color del asiento
  //
  $('.seat').each(function(){
    $( this ).on('click', function(){

      switch($(this).data('state')){ //Iterar en el estado del asiento
      case 'free':
        if(reservation.seats < 5){
          $( this ).removeClass('btn-success');
          $( this ).addClass('btn-default');
          $(this).data('state', 'mine');
          reservation.seats++;
        }else{
          alert('Usted solo puede reservar hasta 5 asientos');
        }
        break;

      case 'reserved':
        alert('Este lugar ya está reservado');
        break;

      case 'aparted':
        alert('Este lugar ya está ocupado por otro usuario');
        break;

      case 'mine':
        $( this ).removeClass('btn-default');
        $( this ).addClass('btn-success');
        $(this).data('state', 'free');
        reservation.seats--;
        break;

      default:
        break;
      }
    });
  });

  $(window).unload(data, function(event) {
    event.preventDefault();
    alert( "Bye now!" );
  });

  // $(window).bind('beforeunload', function(){
  //   return 'Al salir de la pagina se perdera su session y sus asientos apartados';
  // });
});
