<?php 
	require('../config/conexion.php');

	$x = new conexion();
	$id = $_POST['idestudiante'];
	$ep = "";

	$query_idep = "SELECT escuelaprofesional_idescuelaprofesional FROM estudiante WHERE idestudiante = $id";
	$aux_idep = mysqli_query($x->conectar(), $query_idep);
	while ($idep = mysqli_fetch_row($aux_idep)) {
		$ep=$idep[0];
	}

	$query = "SELECT idmodulo, nombre from modulo where escuelaprofesional_idescuelaprofesional = '$ep'";
	$aux = mysqli_query($x->conectar(), $query);
	echo "<option value='0'>--Seleccione--</option>";
	$num = 1;
	while ($lista = mysqli_fetch_row($aux)) {
		echo "<option value=$lista[0]>$num .- $lista[1]</option></br>";
		$num++;
	}
 ?>