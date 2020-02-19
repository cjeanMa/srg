<div class="pull-right">
	<a href="<?php echo site_url('matricula/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdMatricula</th>
		<th>IdSemestreAcademico</th>
		<th>Nota</th>
		<th>NotaLetra</th>
		<th>FechaMatricula</th>
		<th>Observacion</th>
		<th>IdEstudiante</th>
		<th>IdEstado</th>
		<th>IdEstadoModular</th>
		<th>Tipo Matricula IdTipo Matricula</th>
		<th>Actions</th>
    </tr>
	<?php foreach($matricula as $m){ ?>
    <tr>
		<td><?php echo $m['idMatricula']; ?></td>
		<td><?php echo $m['idSemestreAcademico']; ?></td>
		<td><?php echo $m['nota']; ?></td>
		<td><?php echo $m['notaLetra']; ?></td>
		<td><?php echo $m['fechaMatricula']; ?></td>
		<td><?php echo $m['observacion']; ?></td>
		<td><?php echo $m['idEstudiante']; ?></td>
		<td><?php echo $m['idEstado']; ?></td>
		<td><?php echo $m['idEstadoModular']; ?></td>
		<td><?php echo $m['tipo_Matricula_idTipo_Matricula']; ?></td>
		<td>
            <a href="<?php echo site_url('matricula/edit/'.$m['idMatricula']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('matricula/remove/'.$m['idMatricula']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
