<?php 
	require('../config/conexion.php');
	$con = new conexion();
	$idcurso = $_POST['idcurso'];
	$query = "DELETE FROM unidaddidactica WHERE idunidaddidactica ='$idcurso'";
	echo $val=mysqli_query($con->conectar(),$query);
 ?>