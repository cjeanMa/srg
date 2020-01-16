<?php 
	require('../config/conexion.php');

	$x = new conexion();

	$ep = $_POST['esc_pro'];

	$query = "SELECT idmodulo, nombre from modulo where escuelaprofesional_idescuelaprofesional = $ep";
	$aux = mysqli_query($x->conectar(), $query);
	echo "<option value='0'>--Seleccione--</option>";
	while ($lista = mysqli_fetch_row($aux)) {
		echo "<option value=$lista[0]>$lista[1]</option></br>";
	}
 ?>