var baseUrl = window.location.protocol + "//" + window.location.host;
var reservation = {
  id:0,
  name:'',
  seats:0
};

function success_reserveSeats() {
  // body...
  window.location.href = baseUrl;
}

function reserveSeats() {
  // body...
  ajax.post(
    'reservation/make_reservation',
    {id:reservation.id},
    success_reserveSeats,
    error_fun
  );
}

function success_getReservationData(data) {
  // body...
  reservation.id = data.ID_Reservation;
  reservation.name = data.Name;
  reservation.seats = data.Seats;

  $('#resv-name').html(reservation.name);
  $('#resv-id').html(reservation.id);

}

function getReservationData() {

  ajax.get(
    'reservation/get_reservation_data',
    success_getReservationData,
    error_fun
  );
}

function error_fun() {
  BootstrapDialog.alert({
    type: BootstrapDialog.TYPE_WARNING,
    title: 'Operacion no disponible',
    message: 'La operación deseada no puede llevarse a cabo, intente más tarde o reporte este error al administrador del sistema.'
  });
}

function success_updateSeats(data) {

  var list = data;
  $('.seat').each(function() {
    var currentSeat = $(this);
    $.each(list, function(index, seatObject) {
      if( currentSeat.data('position') == seatObject.Position ){
        currentSeat.data('status', seatObject.Status);
        currentSeat.data('reservation', seatObject.Reservation);
      }
    });
    $(this).removeClass('btn-default btn-success btn-warning btn-primary');
    switch ($(this).data('status')) {
    case 'free':
      $(this).addClass('btn-success');
      break;
    case 'aparted':
      if( $(this).data('reservation') == reservation.id ){
        $(this).data('status', 'mine');
        $(this).addClass('btn-default');
      }else{
        $(this).addClass('btn-primary');
      }
      break;
    case 'reserved':
      $(this).addClass('btn-warning');
      break;
    default:
      break;

    }
  });
}

function success_apartSeat(data) {
  // getReservationData();
  $('.seat').each(function() {
    if( $(this).data('position') == data.position ){
      var element = '<li id="list-' + $(this).data('position') + '">' + $(this).data('position') + "</li>";
      $('#my-seats-list').append(element);
      reservation.seats++;
    }
  });
}

function success_freeSeat(data) {
  // getReservationData();
  $('.seat').each(function() {
    if( $(this).data('position') = data.position ){
      var pos = "#list-" + $(this).data('position');
      $(pos).remove();
      reservation.seats--;
    }
  });
}

function freeSeat(seat) {
  // body...
  var data = seat;
  ajax.post(
    'reservation/free_seat',
    data,
    success_freeSeat,
    error_fun
  );
}

function apartSeat(seat) {
  // body...
  var data = seat;
  ajax.post(
    'reservation/apart_seat',
    data,
    success_apartSeat,
    error_fun
  );
}

function updateSeats() {
  ajax.get(
    'reservation/get_seats',
    success_updateSeats,
    error_fun
  );
  setTimeout(updateSeats, 500);
}

/******************************************************************************
* Document Ready of Jquery
*******************************************************************************
*/
$(document).ready(function () {
  //Inicializar toda la tabla de Asientos
  getReservationData();
  updateSeats();

  // Listener del boton de reservacion de asientos
  $('#btn-reserv').on('click', function() {
    BootstrapDialog.confirm('¿Desea confirmar su reserva?', function(result){
      if(result) {
        //Implement the reservation function
        reserveSeats();
      }
    });
  });


  //Listener de acciones del click de cada Asiento
  //En esta section se debe hacer las llamadas al servidor y actualizar el color del asiento
  //
  $('.seat').each(function(){
    $(this).on('click', function(){

      switch($(this).data('status')){ //Iterar en el estado del asiento
      case 'free':
        if(reservation.seats < 5){
          var mySeat = {
            Position: $(this).data('position'),
            Status: 'aparted'
          };
          //implement apart function
          apartSeat(mySeat);
        }else{
          BootstrapDialog.alert({
            type: BootstrapDialog.TYPE_WARNING,
            title: 'Alerta!!!',
            message: 'Solo se tiene un maximo de 5 asientos por reservación.'
          });
        }
        break;

      case 'reserved':
        //It's aparted ando you can't change that
        BootstrapDialog.alert({
          type: BootstrapDialog.TYPE_WARNING,
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra reservado'
        });
        break;

      case 'aparted':
        //It's aparted ando you can't change that
        BootstrapDialog.alert({
          type: BootstrapDialog.TYPE_WARNING,
          title: 'Alerta!!!',
          message: 'Este lugar ya se encuentra apartado por otro usuario.'
        });
        break;

      case 'mine':
        var mySeat = {
          Position: $(this).data('position'),
          Status: 'free'
        };
        //implement free function
        freeSeat(mySeat);
        break;

      default:
        break;
      }
    });
  });

  // $(window).bind('beforeunload', function(){
  //   return 'Aún no ha finalizado su reservación.\n¿Está seguro que desea salir de esta página?';
  // });

});
