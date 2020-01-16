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

	$query = "UPDATE escuelaprofesional set nombre = '$carrera', fechaCreacion = '$creacion', res_autorizacion = '$autorizacion',fecha_autorizacion = '$f_autorizacion', res_revalidacion = '$revalidacion', fecha_revalidacion = '$f_revalidacion' WHERE idescuelaprofesional = '$id'";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>
