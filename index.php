<?php 
	session_start();
	if (isset($_SESSION['idusuario'])) {
	?>
 <!DOCTYPE html>
 <html lang="es">

 <head>
 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>

	<meta charset="UTF-8">
	<title>. : : INICIO : : .</title>
 </head>
 <body>
	
	<?php require("componentes/navbar.php");?>

 	<div class="container text-center">
 		<h2><b>SISTEMA DE REGISTRO ACADEMICO</b></h2>
 		<img src="img/logo.png" alt="IESTP-ILAVE" style="width:290px; weigth:350px">
 		<div>
 			<h3>INSTITUTO DE EDUCACION SUPERIOR</h3>
 		</div>
 		<div>
 			<h3>TECNOLOGICO PUBLICO ILAVE</h3>
 		</div>
 	</div>
 
	<?php  require("componentes/footer.php");?>

 </body>
 </html>



	<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>