<?php 
	require ('../config/conexion.php');
	$x = new conexion();
	$horas = $_POST['horas'];
	$nombre = $_POST['nombre'];
	$idcarrera = $_POST['idcarrera'];
	
	$query = "INSERT INTO modulo(horas,nombre,escuelaprofesional_idescuelaprofesional) VALUES ('$horas','$nombre','$idcarrera')";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;
 ?>