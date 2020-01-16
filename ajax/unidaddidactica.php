<?php 
	require('../config/conexion.php');

	$x = new conexion();

	$modulo = $_POST['uni_didactica'];

	$query = "SELECT idunidaddidactica, nombre from unidaddidactica where  modulo_idmodulo= $modulo";
	$aux = mysqli_query($x->conectar(), $query);
	echo "<option value='0'>--Seleccione--</option>";
	while ($lista = mysqli_fetch_row($aux)) {
		echo "<option value=$lista[0]>$lista[1]</option></br>";
	}
 ?>