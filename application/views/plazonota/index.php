
	<div class="row">
		<div class="col-md">
		<h3 class="text-center"><b>Lista de Plazos de Subida de Notas</b></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md pull-right">
			<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('plazonota/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
		</div>
	</div>
	<hr>

<table class="table table-striped table-bordered" id="table_plazoNota">
	<thead class="table-dark">
		<tr class="text-center">
			<th>Semestre Academico</th>
			<th>Fecha Inicio</th>
			<th>Fecha Limite</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Modificacion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($plazonotas as $p){ ?>
		<tr class="text-center">
			<td class="text-center"><?php echo $p['anio']."-".$p['periodo']; ?></td>
			<td><?php echo $p['fechaInicio']; ?></td>
			<td><?php echo $p['fechaLimite']; ?></td>
			<td><?php echo $p['fechaCreacion']; ?></td>
			<td><?php echo $p['fechaModificacion']; ?></td>
			<td class="text-center">
				<a href="<?php echo site_url('plazonota/edit/'.$p['idPlazoNotas']); ?>"><i class="fa fa-edit"></i> </a> 
				<a href="<?php echo site_url('plazonota/remove/'.$p['idPlazoNotas']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
