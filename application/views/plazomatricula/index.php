
	<div class="row">
		<div class="col-md">
		<h3 class="text-center"><b>Lista de Plazos de Matricula</b></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md pull-right">
			<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('plazomatricula/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
		</div>
	</div>
	<hr>

<table class="table table-striped table-bordered" id="table_plazoMatricula">
	<thead class="table-dark">
		<tr class="text-center">
			<th>Semestre Academico</th>
			<th>Fecha de Inicio</th>
			<th>Fecha al Limite</th>
			<th>Inicio de Rezagados</th>
			<th>Limite de Rezagados</th>
			<th>Inicio de Extemp.</th>
			<th>Limite de Extemp.</th>
			<th>Fecha Modificacion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($plazomatricula as $p){ ?>
		<tr class="text-center">
			<td class="text-center"><?php echo $p['anio']."-".$p['periodo']; ?></td>
			<td><?php echo $p['fechaInicio']; ?></td>
			<td><?php echo $p['fechaLimite']; ?></td>
			<td><?php echo $p['fechaInicioRezagado']?></td>
			<td><?php echo $p['fechaLimiteRezagado']?></td>
			<td><?php echo $p['fechaInicioExtemporaneo']?></td>
			<td><?php echo $p['fechaLimiteExtemporaneo']?></td>
			<td><?php echo $p['fechaModificacion']; ?></td>
			<td class="text-center">
				<a href="<?php echo site_url('plazomatricula/edit/'.$p['idPlazoMatricula']); ?>" ><i class="fa fa-edit"></i> </a> 
				<a href="<?php echo site_url('plazomatricula/remove/'.$p['idPlazoMatricula']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
