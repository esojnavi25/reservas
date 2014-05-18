
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
          BootstrapDialog.show({
            title: 'Alerta!!!',
            message: 'Solo se tiene un maximo de 5 asientos por reservación.',
            buttons:[{
              id: 'btn-ok-warning-5-seats',
              label: 'OK',
              autospin: false,
              action: function(ref) {
                ref.close();
              }
            }]
          });
        }
        break;

      case 'reserved':
        BootstrapDialog.show({
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra reservado',
          buttons:[{
            id: 'btn-ok-warning-reserved-seats',
            label: 'OK',
            autospin: false,
            action: function(ref) {
              ref.close();
            }
          }]
        });
        break;

      case 'aparted':
        BootstrapDialog.show({
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra apartado por otro usuario.',
          buttons:[{
            id: 'btn-ok-warning-aparted-seats',
            label: 'OK',
            autospin: false,
            action: function(ref){ref.close();}
          }]
        });
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

  $(window).unload(function(event) {
    event.preventDefault();
    alert( "Bye now!" );
  });

  // $(window).bind('beforeunload', function(){
  //   return 'Al salir de la pagina se perdera su session y sus asientos apartados';
  // });
});
