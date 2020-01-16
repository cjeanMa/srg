<?php 
	require('../config/conexion.php');
	$con = new conexion();
	$idcapacidad = $_POST['idcapacidad'];
	$query = "DELETE FROM m_capacidades WHERE idm_capacidades ='$idcapacidad'";
	echo $val=mysqli_query($con->conectar(),$query);
 ?>