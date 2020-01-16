<?php 
	require "../config/conexion.php";
	$x = new conexion();
	$idcurso = $_POST['id'];
	$nombre = $_POST['nombre'];
	$creditos = $_POST['creditos'];
	$horas = $_POST['horas'];
	$semestre = $_POST['semestre'];
	
	$query = "UPDATE unidaddidactica set nombre = '$nombre', creditos = '$creditos', horasunidad = '$horas', semestre = '$semestre' WHERE idunidaddidactica='$idcurso'";
	$aux = mysqli_query($x->conectar(), $query);
	echo $aux;

 ?>