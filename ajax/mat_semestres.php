<?php 
	require('../config/conexion.php');
	$x = new conexion();

	$pa = $_POST['pa'];
	$carrera = $_POST['carrera'];

	$semestres = "SELECT s.idsemestre, s.romanos 
	FROM unidaddidactica u
	INNER JOIN semestre s 
	ON u.semestre = s.idsemestre
	INNER JOIN 
		(SELECT m.unidaddidactica_idunidaddidactica ud, m.semestreacademico FROM matricula m 
			INNER JOIN (SELECT idestudiante FROM estudiante WHERE escuelaprofesional_idescuelaprofesional = '$carrera') e
		ON m.estudiante_idestudiante = e.idestudiante) ma
	ON u.idunidaddidactica = ma.ud
	WHERE ma.semestreacademico = '$pa' GROUP BY s.romanos";

	$aux_sem = mysqli_query($x->conectar(), $semestres);
	while ($lista_sem = mysqli_fetch_row($aux_sem)) {
		echo "<option value= $lista_sem[0]>".$lista_sem[1]."</option>";
	}
	
 ?>