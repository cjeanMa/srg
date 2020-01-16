<?php 
	require ('../config/conexion.php');
	$x = new conexion();
	$creditos = $_POST['creditos'];
	$horas = $_POST['horas'];
	$nombre = $_POST['nombre'];
	$semestre = $_POST['semestre'];
	$idmodulo = $_POST['idmodulo'];
	
	$query = "INSERT INTO unidaddidactica(nombre, creditos, horasunidad, semestre,modulo_idmodulo) VALUES ('$nombre', '$creditos', '$horas', '$semestre', '$idmodulo')";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;
 ?>