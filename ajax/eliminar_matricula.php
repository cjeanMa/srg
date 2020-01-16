<?php 
	require('../config/conexion.php');
	$con = new conexion();

	$idmatricula = $_POST['idmatricula'];


	$query = "DELETE FROM matricula WHERE idmatricula ='$idmatricula'";
	echo $val=mysqli_query($con->conectar(),$query);

 ?>