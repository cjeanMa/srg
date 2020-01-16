<?php 
	session_start();

	require ('../config/conexion.php');
	$x = new conexion();

	$idestudiante = $_POST['idestudiante'];

	$query_estudiante = "SELECT fechaingreso FROM estudiante WHERE idestudiante = '$idestudiante'";
	$aux_estudiante = mysqli_query($x->conectar(), $query_estudiante);

	$fechaingreso = mysqli_fetch_row($aux_estudiante);

	if ($_SESSION['permiso'] == '2'){
		$query_anio_actual = "SELECT s.idsemestreacademico, s.anio, s.periodo
						FROM semestreacademico s ORDER BY s.idsemestreacademico DESC LIMIT 0, 1";
		$aux_anio_actual = mysqli_query($x->conectar(), $query_anio_actual);
		$lista_anio_actual = mysqli_fetch_row($aux_anio_actual);
		$anio_actual = $lista_anio_actual[0];
		echo "<option value='".$lista_anio_actual[0]."'>".$lista_anio_actual[1]."-".$lista_anio_actual[2]."</option>";
		
		
		$query_anios_matriculado = "SELECT s.idsemestreacademico, s.anio, s.periodo 
						FROM semestreacademico s INNER JOIN matricula m ON s.idsemestreacademico = m.SEMESTREACADEMICO
						WHERE m.estudiante_idestudiante = '$idestudiante'
						GROUP BY s.idsemestreacademico DESC";
	
		$aux_anios_matriculado = mysqli_query($x->conectar(), $query_anios_matriculado);
		while($lista_anios_matriculado = mysqli_fetch_row($aux_anios_matriculado)){
			if ($lista_anios_matriculado[0]!=$anio_actual) {
				echo "<option value='".$lista_anios_matriculado[0]."'>".$lista_anios_matriculado[1]."-".$lista_anios_matriculado[2]."</option>";
			}
		}
	}
	else{
		$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO 
					WHERE idsemestreacademico >= '$fechaingreso[0]' ORDER BY idsemestreacademico DESC";
	$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
	while($lista_semestre = mysqli_fetch_row($aux_semestre)){
	echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
	}
	}

	

 ?>