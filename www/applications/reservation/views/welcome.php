<div clas="col-md-offset-4 col-md-4">
	<div class="page-header">
		<h1>Sistema de Reservaciones <small>Bienvenido</small></h1>
	</div>
	<div class="col-md-offset-4 col-md-4">
		<form method="post" role="form" action="<?php echo path('reservation/'); ?>">
			<div class="form-group">
				<label>
					<p class="lead">Para hacer una reservación ingrese su nombre:</p>
					<?php echo (isset($alert)) ? $alert : null ; ?>
					<input type="name" name="name" class="form-control" required />
				</label>
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Hacer una reservación &raquo;" />
			</div>
		</form>
			<div class="form-group">
				<label>
					<p class="lead">O bien, ingrese su numero de reservación para hacer una cancelación</p>
					<input id="cancellationNumber" type="name" class="form-control" required/>
				</label>
			</div>
			<div class="form-group">
				<button id="makeCancellationBtn" class="btn btn-danger btn-block btn-lg">Hacer una Cancelacíon &raquo;</button>
			</div>
	</div>
</div>
