<h2 class="text-center"><b>Lista de Docentes</b></h2>

<div class="row">
	<div class="pull-right">
		<a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

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
            <a href="<?php echo site_url('docente/edit/'.$d['idDocente']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i> </a> 
            <a href="<?php echo site_url('docente/remove/'.$d['idDocente']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
