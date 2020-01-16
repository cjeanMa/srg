<?php 
	//require('../config/conexion.php');
	//$x = new conexion();
	//$x->conectar();
 ?>
<div class="row">
	<div class="col-md-12">
			<h2 class="text-center">CURSOS</h2>
		<table class="table table-hover table-condensed table-bordered">

		<tr class="text-center">
				<td>Unidad Didactica</td>
				<td>Creditos</td>
				<td>Horas Teoricas</td>
				<td>Horas Practicas</td>
				<td>Editar</td>
				<td>Eliminar</td>
		</tr>
			<?php 
				$query="SELECT b.idMatricula, a.nombre, a.creditos, a.horasTeoricas, a.horasPracticas 
						FROM unidadDidactica a 
						inner join (SELECT  a.idMatricula, a.UnidadDidactica_idUnidadDidactica 
							FROM matricula a 
							inner join(SELECT idEstudiante FROM estudiante WHERE Persona_idPersona='72514057') b 
							ON a.estudiante_idEstudiante = b.idEstudiante) b 
						ON a.idUnidadDidactica = b.UnidadDidactica_idUnidadDidactica";

				$aux = mysqli_query($x->conectar(), $query);
				while ($lista = mysqli_fetch_row($aux)){
				
			 ?>
		<tr class="text-center">
				<td><?php echo $lista[0] ?></td>
				<td><?php echo $lista[2] ?></td>
				<td><?php echo $lista[3] ?></td>
				<td><?php echo $lista[4] ?></td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove"></button>
				</td>
		</tr>	
			<?php }; ?>
		</table>
	</div>
</div>