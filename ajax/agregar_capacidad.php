<?php 
	require ('../config/conexion.php');
	$x = new conexion();
	$nombre = $_POST['nombre'];
	$idmodulo = $_POST['idmodulo'];
	
	$query = "INSERT INTO m_capacidades(nombre, idmodulo) VALUES ('$nombre','$idmodulo')";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;
 ?>