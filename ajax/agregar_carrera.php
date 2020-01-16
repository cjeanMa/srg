<?php 
	require('../config/conexion.php');
	$x = new conexion();

	$id = $_POST['id_carrera'];
	$carrera = $_POST['nom_carrera'];
	$creacion = $_POST['f_creacion'];
	$autorizacion = $_POST['autorizacion'];
	$f_autorizacion = $_POST['f_autorizacion'];
	$revalidacion = $_POST['revalidacion'];
	$f_revalidacion = $_POST['f_revalidacion'];

	$query = "INSERT INTO escuelaprofesional (idescuelaprofesional, nombre, fechaCreacion, res_autorizacion, fecha_autorizacion, res_revalidacion, fecha_revalidacion) 
	VALUES ('$id','$carrera','$creacion','$autorizacion','$f_autorizacion', '$revalidacion', '$f_revalidacion')";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>
