<?php 
	session_start();
	require('../config/conexion.php');
	$con = new conexion();
	
	$usuario = $_POST['user'];
	$contraseña = $_POST['password'];

	$query = "SELECT u.idusuario,p.nombres, p.apellidoPaterno, p.apellidomaterno, p.idpersona, u.permiso
				FROM usuario u INNER JOIN (Select apellidomaterno, apellidopaterno, nombres, idpersona FROM persona) p ON u.idpersona = p.idpersona
				WHERE usuario = '$usuario' AND contraseña = SHA('$contraseña')";
	$val = mysqli_query($con->conectar(), $query);	
	if (mysqli_num_rows($val)>0) {
		$list = mysqli_fetch_row($val);

		$_SESSION['idusuario'] = $list[0];
		$_SESSION['nombre']=$list[1]." ". $list[2] ." ". $list[3];
		$_SESSION['dni']=$list[4];
		$_SESSION['permiso']=$list[5];
		echo 1;
	}
	else{
		echo 0;
	}
 ?>