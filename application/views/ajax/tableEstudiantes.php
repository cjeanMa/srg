<thead class="text-center table-dark">
		<tr>
		<th>Dni</th>
		<th>Apellidos y Nombres</th>
		<th>Programa de Estudios</th>
		<th>Ingreso</th>
		<th>Acciones</th>
		</tr>
	</thead>

    <tbody>
	<?php foreach($estudiante as $e){ ?>
		<tr>
		<td class="text-center"><?php echo $e['idPersona']; ?></td>
		<?php $nombre = explode(" ", $e['nombres']); //auxiliar para desglosar los nombres del campo nombre ?> 
		<td><?php echo ucfirst($e['apellidoPaterno'])." ". ucfirst($e['apellidoMaterno']) .", "; foreach($nombre as $n){echo ucfirst($n)." ";}?></td>
		<td><?php echo $e['nombreEscuelaProfesional']; ?></td>
		<td class="text-center"><?php echo $e['anio']."-".$e['periodo']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('estudiante/edit/'.$e['idEstudiante']); ?>"><i class="fa fa-edit"></i> </a> 
            <a href="<?php echo site_url('estudiante/remove/'.$e['idEstudiante']); ?>"><i class="fa fa-trash"></i> </a>
        </td>
		</tr>
	<?php } ?>
	</tbody>