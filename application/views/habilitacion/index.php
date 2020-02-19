<div class="pull-right">
	<a href="<?php echo site_url('habilitacion/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdHabilitacion</th>
		<th>Descripcion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($habilitacion as $h){ ?>
    <tr>
		<td><?php echo $h['idHabilitacion']; ?></td>
		<td><?php echo $h['descripcion']; ?></td>
		<td>
            <a href="<?php echo site_url('habilitacion/edit/'.$h['idHabilitacion']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('habilitacion/remove/'.$h['idHabilitacion']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
