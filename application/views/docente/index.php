<div class="pull-right">
	<a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdDocente</th>
		<th>IdPersona</th>
		<th>IdEscuelaProfesional</th>
		<th>Actions</th>
    </tr>
	<?php foreach($docente as $d){ ?>
    <tr>
		<td><?php echo $d['idDocente']; ?></td>
		<td><?php echo $d['idPersona']; ?></td>
		<td><?php echo $d['idEscuelaProfesional']; ?></td>
		<td>
            <a href="<?php echo site_url('docente/edit/'.$d['idDocente']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('docente/remove/'.$d['idDocente']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
