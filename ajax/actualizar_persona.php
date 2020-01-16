<?php 
	require('../config/conexion.php');
	$con = new conexion();

	$id = $_POST['dni'];
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidop = $_POST['apellidop'];
	$apellidom = $_POST['apellidom'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$sexo = $_POST['sexo'];
	$fnacimiento = $_POST['fnacimiento'];
	$discapacidad = $_POST['discapacidad'];
	$conadis = $_POST['conadis'];

	$query = "UPDATE persona SET idpersona = '$dni', nombres = '$nombre', apellidoPaterno = '$apellidop', 
	apellidoMaterno = '$apellidom', direccion = '$direccion', email = '$email', numCelular= '$telefono',
	sexo = '$sexo', fechanacimiento = '$fnacimiento', discapacidad = '$discapacidad', conadis = '$conadis'
	WHERE idpersona = '$id'";
	
	$aux = mysqli_query($con->conectar(), $query);	
	echo $aux;
 ?>