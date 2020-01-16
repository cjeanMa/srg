<?php 
	require "../config/conexion.php";
	$x = new conexion();
	$id = $_POST['idcapacidad'];
	$nombre = $_POST['nombre'];
	
	$query = "UPDATE m_capacidades set  nombre = '$nombre' WHERE idm_capacidades='$id'";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>