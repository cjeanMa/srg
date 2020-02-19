<div class="pull-right">
	<a href="<?php echo site_url('practica/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdPracticas</th>
		<th>IdModulo</th>
		<th>Institucion</th>
		<th>Encargado</th>
		<th>Direccion</th>
		<th>IdEstudiante</th>
		<th>Actions</th>
    </tr>
	<?php foreach($practicas as $p){ ?>
    <tr>
		<td><?php echo $p['idPracticas']; ?></td>
		<td><?php echo $p['idModulo']; ?></td>
		<td><?php echo $p['institucion']; ?></td>
		<td><?php echo $p['encargado']; ?></td>
		<td><?php echo $p['direccion']; ?></td>
		<td><?php echo $p['idEstudiante']; ?></td>
		<td>
            <a href="<?php echo site_url('practica/edit/'.$p['idPracticas']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('practica/remove/'.$p['idPracticas']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
