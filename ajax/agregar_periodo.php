<?php 
	require '../config/conexion.php';
	$x = new conexion();

	$idsa =$_POST['idsa'];
	$anio = $_POST['anio'];
	$periodo = $_POST['periodo'];

	$query = "INSERT INTO semestreacademico VALUES ('$idsa','$anio','$periodo')";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>