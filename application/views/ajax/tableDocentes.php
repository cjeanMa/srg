<thead class="table-dark">
		<tr class="text-center">
			<th>DNI</th>
			<th>Apellidos y Nombres</th>
			<th>Programa de Estudios</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($docente as $d){ ?>
		<tr>
			<td class="text-center"><?php echo $d['idPersona']; ?></td>
			<?php $nombre = explode(" ", $d['nombres']); //auxiliar para desgosar los nombres del campo nombre ?> 
			<td><?php echo ucfirst($d['apellidoPaterno'])." ". ucfirst($d['apellidoMaterno']) .", "; foreach($nombre as $n){echo ucfirst($n)." ";}?></td>
			<td><?php echo $d['nombreEscuelaProfesional']; ?></td>
			<td class ="text-center">
				<a href="<?php echo site_url('docente/edit/'.$d['idDocente']); ?>"> <i class="fa fa-edit"></i> </a> 
				<a href="<?php echo site_url('docente/remove/'.$d['idDocente']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>