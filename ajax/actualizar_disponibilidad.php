<?php 
	require('../config/conexion.php');
	$con = new conexion();

	$idCarrera = $_POST['idcarrera'];
	$disponibilidad = $_POST['disponibilidad'];

	$query = "UPDATE escuelaprofesional SET disponibilidad = '$disponibilidad'
	WHERE idescuelaprofesional = '$idCarrera'";
	
	$aux = mysqli_query($con->conectar(), $query);	
	echo $aux;
; ?>