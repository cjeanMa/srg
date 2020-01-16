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
	<script src = "js/jquery-3.2.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>

	<title>. : : Constancias : : .</title>
</head>
<body>
	<?php include('componentes/navbar.php') ?>
	<div class="text-center">
	<h1>GENERADOR DE CONSTANCIAS</h1>
	</div>
	</br>
	</br>
	</br>
	<div class="container">
	 	<div class="row">
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
		<div class="row">
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	CONSTANCIAS:</label>
					<div class="col-md-6">
						<select name="constancia" id="constancia" class="form-control">
							<option value="0">--Seleccione--</option>
							<option value="1">CONSTANCIA DE NOTAS</option>
							<option value="2">CONSTANCIA DE EGRESADO</option>
						</select>
					</div>
			</div>
			<div id="div_modulos" class="form-group col-md-9 col-md-offset-2" hidden="true">
				<label class="col-md-3">	MODULOS:</label>
					<div class="col-md-6">
						<select name="modulos" id="modulos" class="form-control">
							<option value="0">--Seleccione--</option>
						</select>
					</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-1">
				<button id="mandar_constancia" class="btn btn-success form-control" target="__blank">GENERAR CONSTANCIA</button>
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
		//FUNCION PARA DNI
		$('#dni').change(function(){
			var dni = $('#dni').val();
				$.post('ajax/estudiante_carrera.php', {dni: dni}).done(function(respuesta){
				$('#carrera').html(respuesta)})
			})

		function cambiar(){

		}

		$('#constancia').change(function(){
			if ($(this).val()==1) {
				var carrera = $('#carrera').val();
				el = document.getElementById(modulos);
				//$("#div_modulos").style.display = 'block;
				//el.style.display = (el.style.display == 'none') ? 'block' : 'none';
				$('#div_modulos').removeAttr("hidden");
				$.post('ajax/modulos_constancia.php',{idestudiante: carrera}). done(function(a){
					$('#modulos').html(a);
				})
			}
			else{
				$('#div_modulos').attr("hidden","true");
				$('#modulos').html();
			}
		})

		$('#carrera').change(function(){
			var carrera = $('#carrera').val();
				//$("#div_modulos").style.display = 'block;
			$.post('ajax/modulos_constancia.php',{idestudiante: carrera}). done(function(a){
				$('#modulos').html(a);
			})
		})

		$('#mandar_constancia').click(function(){
			var dni = $('#dni').val();
			var carrera = $('#carrera').val();
			var constancia = $('#constancia').val();
			if (dni == "" || carrera == null) {
				alertify.error("INGRESE UN DNI CORRECTO");
			}
			else{
				switch(constancia){
					case "1":
					var modulo = $('#modulos').val();
					var datos = "idestudiante="+carrera+"&modulo="+modulo;
					window.open('constancia_notas?'+datos,'__blank');
					break;
					case "2":
					window.location = "constancia_egresado.php";
					break;
				}
			}
			})
	});

</script>

<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>