<?php 
	require('../config/conexion.php');
	$x = new conexion();
 ?>
<div class="row">
	<div class="col-md-12">
			<h2 class="text-center">LISTA DE USUARIOS</h2>

		<!--<table class="table table-hover table-condensed table-bordered">-->
		<table class="table table-striped table-bordered table-hover" id="td_usuarios">
		<tr class="text-center">
				<td><b>Apellido Paterno</b></td>
				<td><b>Apellido Materno</b></td>
				<td><b>Nombre</b></td>
				<td><b>Usuario</b></td>
				<td><b>Permisos</b></td>
				<td><b>Ver Todo</b></td>
				<td><b>Editar</b></td>
				<td><b>Habilitar</b></td>
		</tr>
			<?php 
				// query para obtener todos los datos de un estudiante
				$query_usuarios="SELECT p.idPersona, p.nombres, p.apellidoPaterno, p.apellidoMaterno, per.nombre, p.direccion, p.email, p.numcelular, p.sexo, p.conadis, p.discapacidad, u.idusuario, u.usuario, u.contraseña
					FROM usuario u INNER JOIN persona p ON u.idpersona = p.idPersona
					INNER JOIN permisos per ON u.permiso = per.idpermiso
						ORDER BY p.apellidoPaterno";
				$aux_usuarios = mysqli_query($x->conectar(), $query_usuarios);
				while ($lista=mysqli_fetch_assoc($aux_usuarios)) {	
					$dato = $lista['idPersona']."||".$lista['nombres']."||".$lista['apellidoPaterno']."||".$lista['apellidoMaterno']."||".$lista['direccion']."||".$lista['email']."||".$lista['numcelular']."||".$lista['sexo']."||".$lista['conadis']."||".$lista['discapacidad']."||".$lista['usuario']."||".$lista['contraseña'];
			 ?>
		<tr class="text-center">
				<td><?php echo $lista['apellidoPaterno'] ?></td>
				<td><?php echo $lista['apellidoMaterno'] ?></td>
				<td><?php echo $lista['nombres'] ?></td>
				<td><?php echo $lista['usuario'] ?></td>
				<td><?php echo $lista['nombre'] ?></td>
				<td>
					<button class="btn btn-primary glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modalVisualizar" onclick="datos_estudiante('<?php echo $dato; ?>')"></button>
				</td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="datos_estudiante_up('<?php echo $dato; ?>')"></button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove"></button>
				</td>
		</tr>
		<?php 
		} 
		?>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#fecha_ingreso').change(function(){
			var fecha_ingreso = $('#fecha_ingreso').val();
			var escuela = $('#escuela_profesional').val();
			$.post('ajax/td_estudiantes.php',{fecha_ingreso:fecha_ingreso, escuela:escuela}).done(function(respuesta){
				$('#td_estudiantes').html(respuesta);
			});
			
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#escuela_profesional').change(function(){
			var fecha_ingreso = $('#fecha_ingreso').val();
			var escuela = $('#escuela_profesional').val();
			$.post('ajax/td_estudiantes.php',{fecha_ingreso:fecha_ingreso, escuela:escuela}).done(function(respuesta){
				$('#td_estudiantes').html(respuesta);
			});
			
		});
	});

	$(document).ready(function(){
		$('#buscar_estudiante').click(function(){
			dni = $('#busqueda').val();
			$.post('ajax/buscar_persona.php',{dni:dni}).done(function(respuesta){
				$('#td_estudiantes').html(respuesta);
			});
		})
	})

</script>
