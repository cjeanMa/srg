<div class="pull-right">
	<a href="<?php echo site_url('mcapacidade/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdMcapacidades</th>
		<th>NombreMcapacidades</th>
		<th>IdModulo</th>
		<th>Actions</th>
    </tr>
	<?php foreach($mcapacidades as $m){ ?>
    <tr>
		<td><?php echo $m['idMcapacidades']; ?></td>
		<td><?php echo $m['nombreMcapacidades']; ?></td>
		<td><?php echo $m['idModulo']; ?></td>
		<td>
            <a href="<?php echo site_url('mcapacidade/edit/'.$m['idMcapacidades']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('mcapacidade/remove/'.$m['idMcapacidades']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
