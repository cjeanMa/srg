<?php 
	require '../config/conexion.php';
	$x = new Conexion();

	$pa = $_POST['pa'];

	$array_fechas= array("2003-04-01||2004-03-31",
						"2002-04-01||2003-03-31",
						"2001-04-01||2002-03-31",
						"2000-04-01||2001-03-31",
						"1999-04-01||2000-03-31",
						"1998-04-01||1999-03-31",
						"1997-04-01||1998-03-31",
						"1996-04-01||1997-03-31",
						"1995-04-01||1996-03-31",
						"1994-04-01||1995-03-31",
						"1989-04-01||1994-03-31",
						"1984-04-01||1989-03-31",
						"1979-04-01||1984-03-31",
						"1974-04-01||1979-03-31",
						"1969-04-01||1974-03-31",
						"1964-04-01||1969-03-31",
						"1959-04-01||1964-03-31",);
	//empezamos a dibujar la tabla
	echo "<table class='table table-hover table-condensed table-bordered'><tr><td><b>PERIODO ACADEMICO</b></td>
			<td colspan='2'>I</td>
			<td colspan='2'>II</td>
			<td colspan='2'>III</td>
			<td colspan='2'>IV</td>
			<td colspan='2'>V</td>
			<td colspan='2'>VI</td>
			</tr>
			<tr><td><b>FECHAS</b></td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			</tr>
			";
					$masculino = 0;
		$femenino = 0;
	foreach ($array_fechas as $fechanacimiento) {
		$fechas= explode("||",$fechanacimiento);
		$f_inicio = $fechas[0];
		$f_fin = $fechas[1];
		echo "<tr><td>".$f_inicio." HASTA ".$f_fin."</td>";

		//query para obtener los semestres existentes
	$query_sa = "SELECT idsemestre, nombre FROM semestre";
	$aux_sa = mysqli_query($x->conectar(), $query_sa);
	while ($lista_sa = mysqli_fetch_row($aux_sa)) {
		//query para obtener toda la lista de estudiantes que 
		$query_sex = "SELECT e.idestudiante, p.idpersona, p.sexo sexo, p.fechanacimiento
			FROM estudiante e
			INNER JOIN persona p
			ON e.persona_idpersona = p.idPersona
			INNER JOIN matricula m
			ON e.idestudiante = m.Estudiante_idEstudiante
			INNER JOIN unidaddidactica ud
			ON m.UnidadDidactica_idUnidadDidactica = ud.idUnidadDidactica
			WHERE m.semestreAcademico = '$pa' AND ud.semestre = '$lista_sa[0]' AND p.fechanacimiento BETWEEN '$f_inicio' AND '$f_fin' GROUP BY p.idpersona";

		$aux_sex = mysqli_query($x->conectar(), $query_sex);
		$v_consulta = mysqli_num_rows($aux_sex);
		if ($v_consulta>1) {
			while ($lista_sex = mysqli_fetch_row($aux_sex)) {
				$query_max_semestre = "SELECT ud.semestre FROM estudiante e LEFT JOIN matricula m 
								ON e.idEstudiante = m.estudiante_idEstudiante LEFT JOIN unidaddidactica ud 
								ON m.unidaddidactica_idUnidadDidactica = ud.idUnidadDidactica WHERE m.semestreAcademico = '$pa' AND e.idestudiante = '$lista_sex[0]' GROUP BY ud.semestre ORDER BY ud.semestre DESC LIMIT 0,1";
				$aux_max_semestre = mysqli_query($x->conectar(),$query_max_semestre);
				while ($lista_max_semestre = mysqli_fetch_row($aux_max_semestre)) {
					if ($lista_sa[0] == $lista_max_semestre[0]) {
						if ($lista_sex[2]==="M") {
							$masculino++;
						}
						else{
							$femenino++;
						}
					}
				}

			}
			echo "<td>".$masculino."</td><td>".$femenino."</td>";
			$masculino = 0;
			$femenino = 0;
		}
		
		else{
			echo "<td>--</td><td>--</td>";
			}
		}
		echo "</tr>";
	}
	
?>
