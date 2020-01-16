<?php require('../config/conexion.php');

	$x = new conexion();

	$dni = $_POST['dni'];
	$query = "SELECT idEstudiante FROM estudiante 
			WHERE persona_idpersona = $dni";
	$aux = mysqli_query($x->conectar(), $query);
	while ($lista = mysql_fetch_row($aux)) {
		echo "<h2>Codigo de Estudiante: </h2>
		<h2 class='id_est'>$lista[0]</h2>";
	}
?>