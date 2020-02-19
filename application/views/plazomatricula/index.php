<div class="pull-right">
	<a href="<?php echo site_url('plazomatricula/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdPlazoMatricula</th>
		<th>FechaInicio</th>
		<th>FechaLimite</th>
		<th>FechaCreacion</th>
		<th>FechaModificacion</th>
		<th>IdSemestreAcademico</th>
		<th>Actions</th>
    </tr>
	<?php foreach($plazomatricula as $p){ ?>
    <tr>
		<td><?php echo $p['idPlazoMatricula']; ?></td>
		<td><?php echo $p['fechaInicio']; ?></td>
		<td><?php echo $p['fechaLimite']; ?></td>
		<td><?php echo $p['fechaCreacion']; ?></td>
		<td><?php echo $p['fechaModificacion']; ?></td>
		<td><?php echo $p['idSemestreAcademico']; ?></td>
		<td>
            <a href="<?php echo site_url('plazomatricula/edit/'.$p['idPlazoMatricula']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('plazomatricula/remove/'.$p['idPlazoMatricula']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
