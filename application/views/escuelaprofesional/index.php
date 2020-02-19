<div class="pull-right">
	<a href="<?php echo site_url('escuelaprofesional/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdEscuelaProfesional</th>
		<th>NombreEscuelaProfesional</th>
		<th>FechaCreacion</th>
		<th>Res Autorizacion</th>
		<th>Fecha Autorizacion</th>
		<th>Res Revalidacion</th>
		<th>Fecha Revalidacion</th>
		<th>Disponibilidad</th>
		<th>Actions</th>
    </tr>
	<?php foreach($escuelaprofesional as $e){ ?>
    <tr>
		<td><?php echo $e['idEscuelaProfesional']; ?></td>
		<td><?php echo $e['nombreEscuelaProfesional']; ?></td>
		<td><?php echo $e['fechaCreacion']; ?></td>
		<td><?php echo $e['res_autorizacion']; ?></td>
		<td><?php echo $e['fecha_autorizacion']; ?></td>
		<td><?php echo $e['res_revalidacion']; ?></td>
		<td><?php echo $e['fecha_revalidacion']; ?></td>
		<td><?php echo $e['disponibilidad']; ?></td>
		<td>
            <a href="<?php echo site_url('escuelaprofesional/edit/'.$e['idEscuelaProfesional']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('escuelaprofesional/remove/'.$e['idEscuelaProfesional']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
