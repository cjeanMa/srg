<?php 
	session_start();
	if (isset($_SESSION['idusuario'])) {
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>

	<title>.::Certificado de Estudios::.</title>
</head>
<body>
	<?php include('componentes/navbar.php') ?>
	<div class="text-center">
	<h1>GENERAR CERTIFICADO DE ESTUDIOS</h1>
	</div>
	</br>
	</br>
	</br>
	<div class="container">
	 	<div class="row">
		<form action="c_estudios_excel.php" method="GET" class="form">
			<!--target="_blank"-->
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	INGRESE DNI:</label>	
				<div class="col-md-6">
				<input id="dni" type="text" class="form-control" placeholder ="DNI" name = "dni" maxlength="8">
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	CARRERAS DEL ESTUDIANTE:</label>	
				<div class="col-md-6">
				<select name="carrera" id="carrera" class="form-control">
					
				</select>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-4">
				</br>
				<div class="col-md-2">
				<input type="Submit" name="enviar" class = "btn btn-primary" value = "Generar">
				</div>
				<div class="col-md-2">
				<a href="index.php" class="btn btn-warning">Cancelar</a>
				</div>
		</div>
	</div>
	<?php include('componentes/footer.php') ?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
		//$('#navbar').load('componentes/navbar.php');
		$('#footer').load('componentes/footer.php');
	});
	$(document).ready(function(){
		$('#dni').change(function(){
			var dni = $('#dni').val();
				$.post('ajax/estudiante_carrera.php', {dni: dni}).done(function(respuesta){
				$('#carrera').html(respuesta)})
		})
	});
</script>

<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>