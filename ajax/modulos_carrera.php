<?php
	require('../config/conexion.php');
	$x = new conexion();
	$ep = $_GET['idcarrera'];

 ?>
 <div class="container">
<button class="btn btn-danger" id="regresar"><span class="glyphicon glyphicon-menu-left"></span>Regresar</button>
<button class="btn btn-success" data-toggle="modal" data-target="#modal_agregar_modulo"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
</div>
<br>
 <table class="table-hover table-condensed table-bordered text-center">
				<tr><td width="200"><b>ID</b></td>
				<td width="800"><b>NOMBRE</b></td>
				<td><b>HORAS TOTAL</b></td>
				<td><b>MODIFICAR</b></td>
				<td><b>VER CURSOS</b></td>
				<td><b>VER CAPACIDADES</b></td>
			</tr>
			<?php 
					$query_modulos = "SELECT idmodulo, nombre,horas FROM modulo WHERE escuelaProfesional_idescuelaprofesional = '$ep'";
					$aux_modulos = mysqli_query($x->conectar(), $query_modulos);
					while ($lista_modulos = mysqli_fetch_row($aux_modulos)) {
					?>
			<tr>
				<td><?php  echo $lista_modulos[0];?></td>
				<td class="text-left"><?php  echo $lista_modulos[1];?></td>
				<td><?php echo $lista_modulos[2]; ?></td>
				<?php $datos = $lista_modulos[0]."||".$lista_modulos[1]."||".$lista_modulos[2]; ?>
				<td><button class="btn btn-warning" onclick="datos_modulos('<?php echo $datos; ?>')" data-toggle="modal" data-target="#modal_modificar_modulo"><span class="glyphicon glyphicon-pencil"></span></button></td>
				<td><button class="btn btn-primary" onclick="modulo_cursos(<?php echo $lista_modulos[0]; ?>)"><span class="glyphicon glyphicon-book"></span></button></td>
				<td><button class="btn" onclick="modulo_capacidades(<?php echo $lista_modulos[0]; ?>)"><span class="glyphicon glyphicon-list"></span></button></td>
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