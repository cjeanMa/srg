<?php 
	require('../config/conexion.php');
	$con = new conexion();

	$id_estudiante = $_POST['idestudiante'];

	$query = "SELECT a.idEstudiante, a.escuelaProfesional_idEscuelaProfesional, b.nombre 
	FROM Estudiante a INNER JOIN 
	(SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional) b
	ON a.escuelaProfesional_idEscuelaProfesional = b.idEscuelaProfesional
	WHERE a.idEstudiante = $id_estudiante";


	$val=mysqli_query($con->conectar(), $query);
	$val_car = mysqli_fetch_row($val);
	echo "<input hidden id='esc_pro' type='text' value='$val_car[1]'>";

 ?>