<?php 
	require('../config/conexion.php');
	require('../clases/matricula.class.php');
	$con = new conexion();

	$esc_pro = $_POST['esc_pro'];
	$semestre = $_POST['semestre'];
	$s_academico = $_POST['s_academico'];
	$idestudiante = $_POST['idestudiante'];
	$matricula = new matricula();
	//echo $esc_pro."-".$semestre."-".$s_academico."-".$idestudiante;
	//Para obtener los cursos de un
	$query = "SELECT ud.idunidaddidactica, m.idmodulo
			FROM unidaddidactica ud
			RIGHT JOIN (SELECT a.idmodulo, ep.idescuelaprofesional 
			FROM modulo a 
			INNER JOIN escuelaprofesional ep
			ON a.EscuelaProfesional_idEscuelaProfesional = ep.idescuelaProfesional 
			WHERE ep.idescuelaprofesional = '$esc_pro') m
			ON ud.modulo_idModulo = m.idmodulo
			WHERE ud.semestre = '$semestre'
			ORDER BY ud.idUnidadDidactica ASC"; 
			
	$uni_aca=mysqli_query($con->conectar(), $query);
	
	while ($val_ua = mysqli_fetch_row($uni_aca)) {
		$indicador = $matricula->verificar($val_ua[0], $idestudiante, $s_academico);
		if ($indicador == 1) {
		$query_ins = "INSERT INTO matricula (semestreacademico, unidaddidactica_idunidaddidactica, estudiante_idestudiante)
				VALUES ('$s_academico','$val_ua[0]','$idestudiante')";
			$aux=mysqli_query($con->conectar(), $query_ins);
		}
		else{
			$aux = 0;
		}
	};

	echo $aux;
 ?>