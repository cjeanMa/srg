<?php 
	require '../config/conexion.php';
	$x = new Conexion();

	$query = "SELECT idescuelaprofesional, nombre, fechaCreacion, res_autorizacion, fecha_autorizacion, res_revalidacion, fecha_revalidacion, disponibilidad FROM escuelaprofesional";
	$aux_query = mysqli_query($x->conectar(),$query);
	?>
	<br>
	<table class="table table-hover table-condensed table-bordered">
		<tr class="text-center">
			<td><b>ID</b></td>
			<td><b>Nombre</b></td>
			<td><b>Fecha de Creacion</b></td>
			<td><b>Res. Autorización</b></td>
			<td><b>Res. Revalidación</b></td>
			<td><b>Accion</b></td>
			<td><b>Habilitar</b></td>
		</tr>
	<?php 
	while ($lista_query = mysqli_fetch_row($aux_query)) {
		?>
	<tr class="text-center">
		<td width="60"> <?php echo $lista_query[0];?> </td>
		<td class="text-left"> <a href="admi_carrera?ep=<?php  echo $lista_query[0];?>"><?php echo $lista_query[1];?></a></td>
		<td> <?php echo $lista_query[2];?> </td>
		<td> <?php echo $lista_query[3];?></br><?php echo $lista_query[4]; ?></td>
		<td> <?php echo $lista_query[5];?></br><?php echo $lista_query[6]; ?></td>
		<?php $datos = $lista_query[0]."||".$lista_query[1]."||".$lista_query[2]."||".$lista_query[3]."||".$lista_query[4]."||".$lista_query[5]."||".$lista_query[6]; ?>
		<td><button class="btn btn-warning" title="Modificar" id="modificar" onclick="datos_carrera('<?php echo $datos; ?>')" data-toggle="modal" data-target="#modal_modificar_carrera"><span class="glyphicon glyphicon-pencil"></span></button></td>
		<?php if ($lista_query[7]==1) {
			//la funcion esta en js/funciones.js
			echo "<td><button id='chk_disponibilidad$lista_query[0]' value='1' onclick='cambiarDisponibilidad($lista_query[0])' class='btn btn-primary'><span class='glyphicon glyphicon-ok'></span></button></td>";
		}
		else{
			echo "<td><button id='chk_disponibilidad$lista_query[0]' value='0' onclick='cambiarDisponibilidad($lista_query[0])' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>";
		 }?>
		
	</tr>
		<?php 
	}
 ?></table>