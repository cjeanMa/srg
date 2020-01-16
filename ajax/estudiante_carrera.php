<?php 
	require('../config/conexion.php');
	$x = new conexion();

	$dni = $_POST['dni'];

	$query="SELECT a.idEstudiante, a.escuelaProfesional_idEscuelaProfesional, b.nombre 
	FROM Estudiante a INNER JOIN 
	(SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional) b
	ON a.escuelaProfesional_idEscuelaProfesional = b.idEscuelaProfesional
	WHERE a.persona_idPersona =". $dni;

	$val = mysqli_query($x->conectar(),$query);
		echo "<option value='0'>--Seleccione--</option>";
	while ($lista = mysqli_fetch_row($val)) {
		echo "<option value='$lista[0]'>$lista[2]</option>";
	}

 ?>