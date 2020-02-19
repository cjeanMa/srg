<div class="pull-right">
	<a href="<?php echo site_url('permiso/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdPermiso</th>
		<th>NombrePermiso</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($permisos as $p){ ?>
    <tr>
		<td><?php echo $p['idPermiso']; ?></td>
		<td><?php echo $p['nombrePermiso']; ?></td>
		<td><?php echo $p['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('permiso/edit/'.$p['idPermiso']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('permiso/remove/'.$p['idPermiso']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
