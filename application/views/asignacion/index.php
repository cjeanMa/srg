<div class="pull-right">
	<a href="<?php echo site_url('asignacion/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdAsignacion</th>
		<th>IdDocente</th>
		<th>IdSemestreAcademico</th>
		<th>IdUnidadDidactica</th>
		<th>Actions</th>
    </tr>
	<?php foreach($asignacion as $a){ ?>
    <tr>
		<td><?php echo $a['idAsignacion']; ?></td>
		<td><?php echo $a['idDocente']; ?></td>
		<td><?php echo $a['idSemestreAcademico']; ?></td>
		<td><?php echo $a['idUnidadDidactica']; ?></td>
		<td>
            <a href="<?php echo site_url('asignacion/edit/'.$a['idAsignacion']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('asignacion/remove/'.$a['idAsignacion']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
