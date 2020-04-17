
<thead class="table-dark">
		<tr class="text-center">
			<th>DNI</th>
			<th>Modulo</th>
			<th>Institucion</th>
			<th>Encargado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
        
		<?php foreach($practicas as $p){ ?>
		<tr>
			<td class="text-center"><?php echo $p['idPersona']; ?></td>
			<td><?php echo $p['nombreModulo']; ?></td>
			<td><?php echo $p['institucion']; ?></td>
			<td><?php echo $p['encargado']; ?></td>
			<td class="text-center">
				<a href="<?php echo site_url('practica/edit/'.$p['idPracticas']); ?>"><i class="fa fa-edit"></i> </a> 
				<a href="<?php echo site_url('practica/remove/'.$p['idPracticas']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>