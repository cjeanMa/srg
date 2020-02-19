<div class="pull-right">
	<a href="<?php echo site_url('semestre/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdSemestre</th>
		<th>Romanos</th>
		<th>Nombre</th>
		<th>Prenombre</th>
		<th>Actions</th>
    </tr>
	<?php foreach($semestre as $s){ ?>
    <tr>
		<td><?php echo $s['idSemestre']; ?></td>
		<td><?php echo $s['romanos']; ?></td>
		<td><?php echo $s['nombre']; ?></td>
		<td><?php echo $s['prenombre']; ?></td>
		<td>
            <a href="<?php echo site_url('semestre/edit/'.$s['idSemestre']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('semestre/remove/'.$s['idSemestre']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
