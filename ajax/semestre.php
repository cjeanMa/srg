<?php 
	session_start();
	require ('../config/conexion.php');
	$x = new conexion();

	$idestudiante = $_POST['idestudiante'];
	echo "<option value='null'>--Seleccione--</option>";
	if ($_SESSION['permiso'] == '1') {
		$query_semestre = "SELECT idsemestre, nombre FROM SEMESTRE";
				$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
				while ($lista_sem = mysqli_fetch_row($aux_semestre)) {
					echo "<option value=".$lista_sem[0].">".$lista_sem[1]."</option>";
				}
	}//para que muestre solo los semestres que deberia llevar el estudiante
	else{
		$query_semestre = "SELECT s.idsemestre, s.nombre
						FROM semestre s INNER JOIN unidaddidactica ud ON s.idsemestre = ud.semestre
						INNER JOIN matricula m ON ud.idunidaddidactica = m.unidaddidactica_idunidaddidactica 
						WHERE m.estudiante_idestudiante = '$idestudiante' AND estadomodular <> '2'
						GROUP BY s.idsemestre";
		$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
		$consulta = mysqli_num_rows($aux_semestre);
		if ($consulta == 0) {
			echo "<option value=1>PRIMERO</option>";	
		}
		else{
			$semestre_mas_uno = 0;
		while ($lista_sem = mysqli_fetch_row($aux_semestre)) {
				echo "<option value=".$lista_sem[0].">".$lista_sem[1]."</option>";
				$semestre_mas_uno = $lista_sem[0];
			}
		//para agregar un semestre
		$semestre_mas_uno++;
		$query_semestre_mas_uno = "SELECT idsemestre, nombre FROM semestre WHERE idsemestre = '$semestre_mas_uno'";
		$aux_semestre_mas_uno = mysqli_query($x->conectar(), $query_semestre_mas_uno);
		$num_semestre_mas_uno = mysqli_num_rows($aux_semestre_mas_uno);
		if ($num_semestre_mas_uno != 0) {
			$lista_semestre_mas_uno = mysqli_fetch_row($aux_semestre_mas_uno);
			echo "<option value=".$lista_semestre_mas_uno[0].">".$lista_semestre_mas_uno[1]."</option>";
			}
			}
	}
 ?>