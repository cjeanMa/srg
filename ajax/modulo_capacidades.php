<?php
	require('../config/conexion.php');
	$x = new conexion();
	$modulo = $_POST['idmodulo'];
	$query_modulo = "SELECT nombre FROM modulo WHERE idmodulo = '$modulo'";
	$aux_modulo = mysqli_query($x->conectar(), $query_modulo);
	while($lista_modulo = mysqli_fetch_row($aux_modulo)){
 ?>
 <hr style="color: #ffffff;" />
 <div class="container text-center">
 	<h3><b>CAPACIDADES-MODULO</b></h3>
 	<h3><b><u><?php echo $lista_modulo[0];} ?></u></b></h3>
 	<input type="text" id="idmodulo" value="<?php echo $modulo; ?>" hidden>
 </div>
 <div class="container">
<button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregar_capacidad"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
</div>
<br>
 <table class="table-hover table-condensed table-bordered text-center">
				<tr><td width="200"><b>ID</b></td>
				<td width="900"><b>NOMBRE</b></td>
				<td><b>MODIFICAR</b></td>
				<td><b>ELIMINAR</b></td>

			</tr>
			<?php 
					$query = "SELECT idm_capacidades, nombre FROM m_capacidades WHERE idmodulo = '$modulo' ORDER BY idm_capacidades ASC";
					$aux = mysqli_query($x->conectar(), $query);
					while ($lista = mysqli_fetch_row($aux)) {
					?>
			<tr>
				<td><?php  echo $lista[0];?></td>
				<td class="text-left"><?php  echo $lista[1];?></td>
				<?php $datos = $lista[0]."||".$lista[1];?>
				<td><button class="btn btn-warning" onclick="datos_capacidad('<?php echo $datos; ?>')" data-toggle="modal" data-target="#modal_modificar_capacidad"><span class="glyphicon glyphicon-pencil"></span></button></td>
				<td><button class="btn btn-danger" onclick="eliminar_capacidad('<?php echo $lista[0];?>')"><span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
			<?php
					}
			?>
</table>

<script>
	$('#regresar').click(function(){
		//window.location='administracion.php';
		location.href="administracion";
	});
</script>