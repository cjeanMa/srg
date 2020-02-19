<div class="pull-right">
	<a href="<?php echo site_url('sexo/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdSexo</th>
		<th>NombreSexo</th>
		<th>LetraSexo</th>
		<th>Actions</th>
    </tr>
	<?php foreach($sexo as $s){ ?>
    <tr>
		<td><?php echo $s['idSexo']; ?></td>
		<td><?php echo $s['nombreSexo']; ?></td>
		<td><?php echo $s['letraSexo']; ?></td>
		<td>
            <a href="<?php echo site_url('sexo/edit/'.$s['idSexo']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('sexo/remove/'.$s['idSexo']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
