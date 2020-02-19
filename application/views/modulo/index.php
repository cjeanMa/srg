<div class="pull-right">
	<a href="<?php echo site_url('modulo/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdModulo</th>
		<th>NombreModulo</th>
		<th>HorasModulo</th>
		<th>IdEscuelaProfesional</th>
		<th>Actions</th>
    </tr>
	<?php foreach($modulo as $m){ ?>
    <tr>
		<td><?php echo $m['idModulo']; ?></td>
		<td><?php echo $m['nombreModulo']; ?></td>
		<td><?php echo $m['horasModulo']; ?></td>
		<td><?php echo $m['idEscuelaProfesional']; ?></td>
		<td>
            <a href="<?php echo site_url('modulo/edit/'.$m['idModulo']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('modulo/remove/'.$m['idModulo']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
