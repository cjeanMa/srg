<div class="pull-right">
	<a href="<?php echo site_url('discapacidad/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdDiscapacidad</th>
		<th>NombreDiscapacidad</th>
		<th>Actions</th>
    </tr>
	<?php foreach($discapacidad as $d){ ?>
    <tr>
		<td><?php echo $d['idDiscapacidad']; ?></td>
		<td><?php echo $d['nombreDiscapacidad']; ?></td>
		<td>
            <a href="<?php echo site_url('discapacidad/edit/'.$d['idDiscapacidad']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('discapacidad/remove/'.$d['idDiscapacidad']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
