<?php 
	require "../config/conexion.php";
	$x = new conexion();
	$id = $_POST['idmodulo'];
	$horas = $_POST['horas'];
	$nombre = $_POST['nombre'];
	
	$query = "UPDATE modulo set horas = '$horas', nombre = '$nombre' WHERE idmodulo='$id'";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>