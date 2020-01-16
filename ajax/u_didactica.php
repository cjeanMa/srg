<?php 
	require('../config/conexion.php');

	$x = new conexion();

	$esc_profesional = $_POST['esc_profesional'];
	$semestre = $_POST['semestre'];

	$query01 = "SELECT idModulo FROM modulo WHERE escuelaprofesional_idescuelaprofesional = '$esc_profesional'";
	$val01 = mysqli_query($x->conectar(), $query01);
		echo "<option value='0'>--Seleccione--</option>";
	while ($modulo=mysqli_fetch_row($val01)) {
		$query02 = "SELECT idunidaddidactica, nombre FROM unidaddidactica WHERE modulo_idmodulo = '$modulo[0]' AND semestre = '$semestre'";
		$val02 = mysqli_query($x->conectar(), $query02);
		
		while ($ud = mysqli_fetch_row($val02)) {
		echo "<option value=$ud[0]>$ud[1]</option></br>";
	}
	};

	/*$query = "SELECT idunidaddidactica, nombre from unidaddidactica where  modulo_idmodulo= $modulo";
	$aux = mysql_query($query);
	echo "<option value='0'>--Seleccione--</option>";
	while ($lista = mysql_fetch_row($aux)) {
		echo "<option value=$lista[0]>$lista[1]</option></br>";
	}*/
 ?>