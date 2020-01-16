<?php 
	require('../config/conexion.php');
	$x = new conexion();
 ?>
<div class="row">
	<div class="col-md-12">
				<div class=" col-md-7">
					<h2 class="text-center"><u>LISTA DE ESTUDIANTES</u></h2>	
				</div>
				<div class="col-md-3">
						<input type="text" id="busqueda" class="form-control" placeholder="DNI DE ESTUDIANTE" maxlength = "8">
				</div>
				<div class="col-md-2">
						<button id="buscar_estudiante" class="btn btn-success form-control"><span class="glyphicon glyphicon-search"></span>Buscar</button>
				</div>
				</div>
	</div>
			<form action="ajax/reporte_estudiantes" method="POST" name="form-est">
			<div class="row form-group">
				<div class="col-md-3">
				<label>Fecha de Ingreso</label>
				<select id="fecha_ingreso" class="form-control" name="fecha_ingreso">
					<option value=" ">--Seleccionar--</option>
					<?php  
					$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO 
										ORDER BY idsemestreacademico desc";
							$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
							while($lista_semestre = mysqli_fetch_row($aux_semestre)){
								echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
					}
					?>
				</select>
				</div>
				<div class="col-md-6">
					<label>Escuela Profesional</label>
					<select id="escuela_profesional" class="form-control" name="escuela_profesional">
					<option value=" ">--Seleccionar--</option>
					<?php 
						$query_esc = "SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional";
						//$query_esc = "SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional WHERE disponibilidad = 1";
					 	$aux_esc = mysqli_query($x->conectar(), $query_esc);
					 	while ($lista_esc = mysqli_fetch_row($aux_esc)) {
					 		if ($lista_esc[0] != 0) {
					 			echo "<option value='".$lista_esc[0]."'>".$lista_esc[1]."</option>";
					 		}
					 	}
					 ?>
					</select>
				</div>
				<div class="col-md-3">
					<label></label>
					<input type="submit" name="enviar" value="GENERAR EXCEL" class="btn btn-primary form-control">
				</div>

			</div>
			</form>
				

		<!--<table class="table table-hover table-condensed table-bordered">-->
		<table class="table table-striped table-bordered table-hover" id="td_estudiantes">
		<tr class="text-center">
				<td><b>DNI</b></td>
				<td><b>Apellido Paterno</b></td>
				<td><b>Apellido Materno</b></td>
				<td><b>Nombre</b></td>
				<td><b>Carrera Profesional</b></td>
				<td><b>Ver Todo</b></td>
				<td><b>Editar</b></td>
				<td><b>Eliminar</b></td>
		</tr>
			<?php 
				// query para obtener todos los datos de un estudiante
				$query="SELECT x.idPersona, x.nombres, x.apellidoPaterno, x.apellidoMaterno, y.nombre, x.direccion, x.email, x.numcelular, x.sexo, x.fechanacimiento,
						 x.discapacidad, x.conadis, x.fechaingreso, concat(x.apellidoPaterno,x.apellidoMaterno,x.nombres) ord
						FROM (SELECT idPersona, nombres, apellidoPaterno, apellidoMaterno, EscuelaProfesional_idEscuelaProfesional, direccion, email, numcelular, sexo, fechanacimiento, discapacidad, conadis, fechaingreso 
							FROM Persona inner join Estudiante on idPersona = Persona_idPersona) x inner join escuelaprofesional y on x.EscuelaProfesional_idEscuelaProfesional = y.idEscuelaProfesional 
						ORDER BY ord LIMIT 0, 15";
				$aux = mysqli_query($x->conectar(), $query);
				while ($lista=mysqli_fetch_row($aux)) {	
					$dato = $lista[0]."||".$lista[1]."||".$lista[2]."||".$lista[3]."||".$lista[5]."||".$lista[6]."||".$lista[7]."||".$lista[8]."||".$lista[9]."||".$lista[10]."||".$lista[11]."||".$lista[4]."||".$lista[12];
			 ?>
		<tr class="text-center">
				<td><?php echo $lista[0] ?></td>
				<td><?php echo $lista[2] ?></td>
				<td><?php echo $lista[3] ?></td>
				<td><?php echo $lista[1] ?></td>
				<td><?php echo $lista[4] ?></td>
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
