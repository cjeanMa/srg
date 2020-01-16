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
	
	<script>
  function validar_datos(){
      var verificar = true;
      if(!document.matricula_dni.dni.value || document.matricula_dni.dni.value.length!=8){
        alertify.alert("NO INGRESO DNI O EL INGRESO DEL DNI ES INCORRECTO").setting('modal', false);
        document.matricula_dni.dni.focus();
        verificar=false;
      }
      return verificar;
    }
    window.onload = function(){
      document.getElementById("mat_datos").onclick = validar_datos;
    }
</script>

	<title>. : : Matriculas : : .</title>
</head>
<body>
	<?php include('componentes/navbar.php') ?>
	<div class="text-center">
	<h1>MATRICULA DE ESTUDIANTE</h1>
	</div>
	</br>
	</br>
	</br>
	<div class="container">
	 	<div class="row">
		<form action="matricula_semestre" method="GET" class="form" name="matricula_dni">

			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	DNI DEL ESTUDIANTE:</label>	
				<div class="col-md-6">
				<input id="dni" type="text" class="form-control" placeholder ="DNI" name = "dni" maxlength="8">
				</div>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-4">
				</br>
				<div class="col-md-2">
				<input id="mat_datos" type="Submit" name="enviar" class = "btn btn-primary" value = "Buscar">
				</div>
				<div class="col-md-2">
				<a href="index.php" class="btn btn-warning">Cancelar</a>
				</div>
		</div>
	</div>
	
</body>
<footer id="footer"></footer>
</html>
<script>
	$(document).ready(function(){
		$('#footer').load('componentes/footer.php');
	})
</script>
<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>
