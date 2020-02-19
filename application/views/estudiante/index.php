<div class="pull-right">
	<a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdEstudiante</th>
		<th>IdSemestreAcademico</th>
		<th>IdEscuelaProfesional</th>
		<th>IdPersona</th>
		<th>Actions</th>
    </tr>
	<?php foreach($estudiante as $e){ ?>
    <tr>
		<td><?php echo $e['idEstudiante']; ?></td>
		<td><?php echo $e['idSemestreAcademico']; ?></td>
		<td><?php echo $e['idEscuelaProfesional']; ?></td>
		<td><?php echo $e['idPersona']; ?></td>
		<td>
            <a href="<?php echo site_url('estudiante/edit/'.$e['idEstudiante']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('estudiante/remove/'.$e['idEstudiante']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
