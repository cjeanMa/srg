<div class="pull-right">
	<a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdUsuario</th>
		<th>Usuario</th>
		<th>Contrase</th>
		<th>UltimaSesion</th>
		<th>IdPermiso</th>
		<th>IdPersona</th>
		<th>IdHabilitacion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($usuario as $u){ ?>
    <tr>
		<td><?php echo $u['idUsuario']; ?></td>
		<td><?php echo $u['usuario']; ?></td>
		<td><?php echo $u['contrase']; ?></td>
		<td><?php echo $u['ultimaSesion']; ?></td>
		<td><?php echo $u['idPermiso']; ?></td>
		<td><?php echo $u['idPersona']; ?></td>
		<td><?php echo $u['idHabilitacion']; ?></td>
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['idUsuario']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('usuario/remove/'.$u['idUsuario']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
