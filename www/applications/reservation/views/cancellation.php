<div clas="col-md-offset-4 col-md-4">
  <div class="page-header">
    <h1>Cancelaciones:</h1>
  </div>
  <div>
    <h2>Nombre: <?php echo $reservation_data['Name']; ?></h2>
    <h2>Numero de reservación: <?php echo $reservation_data['ID_Reservation']; ?></h2>
    <h3>Sus asientos:</h3>
      <?php if($seats_data){
        foreach ($seats_data as $seat) { ?>
          <div class="row">
            <div class="col-md-1"><?php echo $seat['Position']; ?></div>
            <div class="col-md-1">
              <a class="btn btn-sm btn-danger" href="<?php echo path("reservation/cancel_seat/" . $seat['ID_Seat'] . "/" . $reservation_data['ID_Reservation']); ?>">Cancelar</a>
            </div>
            <div class="col-md-6"></div>
          </div>
        <?php }
            }else{
                echo getAlert('No hay asientos para esta reservación', 'error');
            }?>
    </div>
    <div>
      <a class="btn btn-info" href="<?php echo path(''); ?>">&laquo; Inicio</a>
    </div>
  </div>
