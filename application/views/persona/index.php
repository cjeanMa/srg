<div class="pull-right">
	<a href="<?php echo site_url('persona/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdPersona</th>
		<th>ApellidoPaterno</th>
		<th>ApellidoMaterno</th>
		<th>Nombres</th>
		<th>IdSexo</th>
		<th>FechaNacimiento</th>
		<th>Direccion</th>
		<th>Email</th>
		<th>NumCelular</th>
		<th>IdDiscapacidad</th>
		<th>Actions</th>
    </tr>
	<?php foreach($persona as $p){ ?>
    <tr>
		<td><?php echo $p['idPersona']; ?></td>
		<td><?php echo $p['apellidoPaterno']; ?></td>
		<td><?php echo $p['apellidoMaterno']; ?></td>
		<td><?php echo $p['nombres']; ?></td>
		<td><?php echo $p['idSexo']; ?></td>
		<td><?php echo $p['fechaNacimiento']; ?></td>
		<td><?php echo $p['direccion']; ?></td>
		<td><?php echo $p['email']; ?></td>
		<td><?php echo $p['numCelular']; ?></td>
		<td><?php echo $p['idDiscapacidad']; ?></td>
		<td>
            <a href="<?php echo site_url('persona/edit/'.$p['idPersona']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('persona/remove/'.$p['idPersona']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
