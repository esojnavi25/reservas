funtion updateSeats(){

  /*
  *  TODO Añadir toda la logica de actualizacion de asientos
  */

  setTimeout(function(){
    updateSeats(),
    3000
  });
}

window.onload = updateSeats();
