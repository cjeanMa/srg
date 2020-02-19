<div class="pull-right">
	<a href="<?php echo site_url('tipomatricula/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdtipoMatricula</th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tipomatricula as $t){ ?>
    <tr>
		<td><?php echo $t['idtipoMatricula']; ?></td>
		<td><?php echo $t['nombre']; ?></td>
		<td><?php echo $t['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('tipomatricula/edit/'.$t['idtipoMatricula']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('tipomatricula/remove/'.$t['idtipoMatricula']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
