<?php 	
	require('../config/conexion.php');
	$x = new conexion();

	$idestudiante = $_POST['idestudiante'];
	$p_academico = $_POST['p_academico'];

	$query_ii = "SELECT fechaingreso FROM estudiante WHERE idestudiante ='$idestudiante'";
	$aux_ii = mysqli_query($x->conectar(), $query_ii);
	$lista_ii = mysqli_fetch_row($aux_ii); // para obtener la fecha de ingreso del estudiante
	
	//para determinar su ultimo semestre cursado
	$query = "SELECT x.idmatricula, x.semestreacademico, x.estado, x.estudiante_idestudiante, y.nombre
			FROM MATRICULA x 
			INNER JOIN 
			(SELECT a.idunidaddidactica, a.nombre as nom_ud, b.idsemestre, b.romanos ,b.nombre FROM unidaddidactica a INNER JOIN SEMESTRE b ON a.semestre = b.idsemestre) y 
			ON x.unidaddidactica_idunidaddidactica = y.idunidaddidactica
			WHERE x.estudiante_idestudiante = '$idestudiante' AND x.semestreacademico >= '$lista_ii[0]'
			GROUP BY y.idsemestre ORDER BY y.idsemestre DESC LIMIT 0,1";
	
	$aux = mysqli_query($x->conectar(), $query);
	//para identificar los cursos que desaprobo
	$query_ud = "SELECT x.idmatricula, x.semestreacademico, x.nota, x.estado, y.nombre, y.sem 
				FROM matricula x 
				INNER JOIN 
				(SELECT a.idunidaddidactica, a.nombre, b.nombre sem FROM unidaddidactica a INNER JOIN semestre b ON a.semestre = b.idsemestre) y 
				ON x.unidaddidactica_idunidaddidactica = y.idunidaddidactica
				WHERE estudiante_idestudiante = '$idestudiante' AND nota < 13";
	$aux_ud = mysqli_query($x->conectar(), $query_ud);
	$num_ud = mysqli_num_rows($aux_ud);
	//condicionales para mostrar mensajes
	if ($num_ud!=0) {
		echo "<div class='alert alert-success' role='alert'>no aprobó los cursos: ";
		while ($lista_ud = mysqli_fetch_row($aux_ud)){
		echo "<br> - ".$lista_ud[4]." del ".$lista_ud[5]." semestre";
		}
		echo "</div>";
	}

	$columnas = mysqli_num_rows($aux);
	if ($columnas==0){
		echo "<div class='alert alert-success' role='alert'>ESTUDIANTE NUEVO QUE DEBE PASAR AL PRIMER SEMESTRE</div>";
		}
	
	else{
		while ($lista = mysqli_fetch_row($aux)) {
		echo "<div id='actual_semestre' class='alert alert-warning' role='alert'><h4>Actualmente cursa el ".$lista[4]." semestre</h4></div>";	
		}
	}	

 ?>