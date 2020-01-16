<?php 
	require '../config/conexion.php';
	$x = new Conexion();

	$pa = $_POST['pa'];

	$query_ep = "SELECT ep.idescuelaprofesional, ep.nombre FROM 
	escuelaprofesional ep INNER JOIN
	(SELECT e.escuelaprofesional_idescuelaprofesional esc_pro
		FROM estudiante e INNER JOIN 
		(SELECT estudiante_idestudiante est FROM matricula WHERE semestreAcademico = '$pa' GROUP BY estudiante_idestudiante) m
		WHERE e.idestudiante = m.est GROUP BY esc_pro) esc 
	ON ep.idescuelaprofesional = esc.esc_pro";
	$aux_ep = mysqli_query($x->conectar(), $query_ep);
	//empezamos a dibujar la tabla
	echo "<table class='table table-hover table-condensed table-bordered'><tr><td><b>PERIODO ACADEMICO</b></td>
			<td colspan='2'>I</td>
			<td colspan='2'>II</td>
			<td colspan='2'>III</td>
			<td colspan='2'>IV</td>
			<td colspan='2'>V</td>
			<td colspan='2'>VI</td>
			</tr>
			<tr><td><b>ESCUELA PROFESIONAL</b></td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			<td>M</td><td>F</td>
			</tr>
			";
			$masculino=0;
			$femenino=0;
	while($lista_ep = mysqli_fetch_row($aux_ep)) {
		echo "<tr><td>".$lista_ep[1]."</td>";
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
			WHERE m.semestreAcademico = '$pa' AND e.EscuelaProfesional_idEscuelaProfesional = '$lista_ep[0]' AND ud.semestre = '$lista_sa[0]' GROUP BY p.idpersona";
		
		$aux_sex = mysqli_query($x->conectar(), $query_sex);
		$v_consulta = mysqli_num_rows($aux_sex);
		if ($v_consulta>1) {
			while ($lista_sex = mysqli_fetch_row($aux_sex)) {
				
				$query_max_semestre = "SELECT ud.semestre, e.idestudiante FROM estudiante e LEFT JOIN matricula m 
								ON e.idEstudiante = m.estudiante_idEstudiante LEFT JOIN unidaddidactica ud 
								ON m.unidaddidactica_idUnidadDidactica = ud.idUnidadDidactica WHERE m.semestreAcademico = '$pa' 
								AND e.EscuelaProfesional_idEscuelaProfesional = '$lista_ep[0]' AND e.idestudiante = '$lista_sex[0]' GROUP BY ud.semestre ORDER BY ud.semestre DESC LIMIT 0,1";
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
