<?php 
	session_start();
	if (isset($_SESSION['idusuario'])) {
	?>
<!DOCTYPE html>
<?php require('config/conexion.php') ?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>
  <script src = "js/funciones.js"></script>

	<meta charset="utf-8">
	<title>. : : Ver Notas : : .</title>
</head>
<body>
<!--RECURSO NAVBAR-->
<?php 
	include('componentes/navbar.php');
	$x = new conexion();
	$x->conectar();
?>
<div class="container">
	<div>
	<h1 class="text-center">VER NOTAS</h1>
	</div>
</div>

	<div class="container">
		<div class="form-group col-md-10 col-md-offset-1">
				<label class="col-md-2">DNI DEL ESTUDIANTE:</label>
				<div class="col-md-3">
				<input type="text" id="dni_est" class="form-control" maxlength="8" required>
				</div>
				<button class="btn btn-primary" id="buscar_notas"><span class="glyphicon glyphicon-search"></span></button>
			
			<label class="col-md-2">	CARRERAS DEL ESTUDIANTE:</label>	
				<div class="col-md-3">
				<select name="carrera" id="carrera" class="form-control">
					
				</select>
				</div>
			</div>
	</div>
	<div class="container">
		<div id="tabla_notas_est">
		</div>
	</div>
	
	<footer id="footer"></footer>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('#footer').load('componentes/footer.php');
	});
	//filtrar carreras
	$(document).ready(function(){
		$('#dni_est').change(function(){
			var dni = $('#dni_est').val();
			$.post('ajax/estudiante_carrera.php', {dni: dni}).done(function(respuesta){
				$('#carrera').html(respuesta)})
		})
	});

	//iniciar la busqueda
	$(document).ready(function(){
		$('#buscar_notas').click(function(){
			if ($('#dni_est').val()=="") {
				alertify.error("INGRESE NUMERO DE DNI DEL ESTUDIANTE");
			}
			else if (!$('#carrera').val()) {
				alertify.error("EL DNI INGRESADO ES INCORRECTO");
			}
			else{
				var dni = $('#carrera').val();
							$.post('ajax/tabla_notas.php', {dni: dni}).done(function(respuesta){			
								$('#tabla_notas_est').html(respuesta);
							});
			}
			
		});
	});
</script>


<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>