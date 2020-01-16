<?php 
	require '../config/conexion.php';
	$x = new Conexion();

	$query = "SELECT idsemestreacademico, anio, periodo FROM semestreacademico ORDER BY idsemestreacademico desc";
	$aux_query = mysqli_query($x->conectar(),$query);
	?>
	<br>
	<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered">
		<tr class="text-center">
			<td><b>ID</b></td>
			<td><b>Año</b></td>
			<td><b>Periodo</b></td>
		</tr>
	<?php 
	while ($lista_query = mysqli_fetch_row($aux_query)) {
		?>
	<tr class="text-center">
		<td> <?php echo $lista_query[0];?> </td>
		<td> <?php echo $lista_query[1];?> </td>
		<td> <?php echo $lista_query[2];?> </td>
	</tr>
		<?php 
	}
 ?></table></div>