<?php 
	require ('../config/conexion.php');
	$x = new conexion();

	$pa = $_POST['periodo_academico'];
	$query_cp = "SELECT ep.idescuelaprofesional, ep.nombre FROM 
	escuelaprofesional ep INNER JOIN
	(SELECT e.escuelaprofesional_idescuelaprofesional esc_pro
		FROM estudiante e INNER JOIN 
		(SELECT estudiante_idestudiante est FROM matricula WHERE semestreAcademico = '$pa' GROUP BY estudiante_idestudiante) m
		WHERE e.idestudiante = m.est GROUP BY esc_pro) esc 
	ON ep.idescuelaprofesional = esc.esc_pro";

	$aux_cp = mysqli_query($x->conectar(), $query_cp);
	echo "<option value='null'>--Seleccione--</option>";
	while ($lista_cp = mysqli_fetch_row($aux_cp)) {
		echo "<option value='$lista_cp[0]'>".$lista_cp[1]."</option>";
	}
 ?>