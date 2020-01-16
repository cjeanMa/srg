<?php 
	require('../config/conexion.php');
	require('../clases/matricula.class.php');
	$con = new conexion();

	$s_academico = $_POST['s_academico'];
	$idunidad = $_POST['idunidad'];
	$idestudiante = $_POST['idestudiante'];
	$matricula = new matricula();

	$indicador = $matricula->verificar($idunidad, $idestudiante, $s_academico);

	if ($indicador == true) {
		$query = "INSERT INTO matricula (semestreacademico, unidaddidactica_idunidaddidactica, estudiante_idestudiante)
				VALUES ('$s_academico','$idunidad','$idestudiante')";
		$val=mysqli_query($con->conectar(), $query);
	}
	else{
		$val = 0;
	}
	echo $val;	
 ?>