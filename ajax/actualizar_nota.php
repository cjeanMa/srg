<?php 
	require('../config/conexion.php');
	$con = new conexion();
	

	$idmatricula = $_POST['id_mat'];
	$nota = $_POST['nota'];

	if ($nota == 11) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'ONCE', estado = '2' WHERE idmatricula ='$idmatricula'";
		}	

	elseif ($nota == 12) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DOCE', estado = '2' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 13) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'TRECE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 14) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'CATORCE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 15) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'QUINCE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 16) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DIECISEIS', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 17) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DIECISIETE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 18) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DIECIOCHO', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 19) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DIECINUEVE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}

	elseif ($nota == 20) {
			$query = "UPDATE matricula SET nota = '$nota', notaletra = 'VEINTE', estado = '1' WHERE idmatricula ='$idmatricula'";
		}
	elseif($nota <= 10 && $nota >= 0){
		$query = "UPDATE matricula SET nota = '$nota', notaletra = 'DESAPROBADO', estado = '2' WHERE idmatricula ='$idmatricula'";
	}
	else{
		$query = "";
	}
	echo $val=mysqli_query($con->conectar(),$query);

 ?>