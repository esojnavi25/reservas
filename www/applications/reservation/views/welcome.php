<div clas="col-md-offset-4 col-md-4">
	<div class="page-header">
		<h1>Bienvenido <small>Sistema de Reservaciones</small></h1>
	</div>
	<div class="col-md-offset-4 col-md-4">
		<form method="post" role="form" action="<?php echo path('reservation/'); ?>">
			<div class="form-group">
				<label>
					<p class="lead">Para hacer una reservacion ingrese su nombre:</p>
					<input type="name" name="name" class="form-control" required />
				</label>
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-lg btn-block" type="submit" value="Hacer una reservación &raquo;" />
			</div>
		</form>
		<form method="get" role="form" action="<?php echo path('reservation/cancel/'); ?>">
			<div class="form-group">
				<label>
					<p class="lead">O bien, ingrese su numero de reservación para hacer una cancelación</p>
					<input type="name" name="cancelNumber" class="form-control" />
				</label>
			</div>
			<div class="form-group">
				<input class="btn btn-danger btn-lg btn-block" type="submit" value="Hacer una cancelación &raquo;" required />
			</div>
		</form>
	</div>
</div>
