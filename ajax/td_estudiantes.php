<?php 
	require('../config/conexion.php');
	$x = new conexion();
?>
	<table class="table table-striped table-bordered table-hover">
				<tr class='text-center'>
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
	//PARA CASO DE FECHA DE INGRESO	
		if ($_POST['fecha_ingreso']=="") {
			$f_ing = "";
		}
		else
			$f_ing = $_POST['fecha_ingreso'];

		//PARA CASO DE ESCUELAS PROFESIONALES
		if ($_POST['escuela']=="") {
			$escuela = "";
		}
		else
			$escuela = $_POST['escuela'];
		
			
		?>
		
			<?php
				// query para obtener todos los datos de un estudiante segun fecha de ingreso y escuela profesional
				$query="SELECT x.idPersona, x.nombres, x.apellidoPaterno, x.apellidoMaterno, y.nombre,
						 x.direccion, x.email, x.numcelular, x.sexo, x.fechanacimiento, x.discapacidad,
						 x.conadis, x.fechaingreso, concat(x.apellidoPaterno, x.apellidoMaterno, x.nombres) ord
						FROM (SELECT idPersona, nombres, apellidoPaterno, apellidoMaterno, EscuelaProfesional_idEscuelaProfesional, direccion, email, numcelular, sexo, fechanacimiento, discapacidad, conadis, fechaingreso 
						FROM Persona inner join Estudiante on idPersona = Persona_idPersona WHERE fechaIngreso = '$f_ing' AND escuelaProfesional_idEscuelaProfesional = '$escuela') x 
						inner join escuelaprofesional y on x.EscuelaProfesional_idEscuelaProfesional = y.idEscuelaProfesional
						ORDER BY ord";
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
			};
 ?>