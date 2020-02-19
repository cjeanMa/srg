<div class="pull-right">
	<a href="<?php echo site_url('semestreacademico/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdSemestreAcademico</th>
		<th>Anio</th>
		<th>Periodo</th>
		<th>Actions</th>
    </tr>
	<?php foreach($semestreacademico as $s){ ?>
    <tr>
		<td><?php echo $s['idSemestreAcademico']; ?></td>
		<td><?php echo $s['anio']; ?></td>
		<td><?php echo $s['periodo']; ?></td>
		<td>
            <a href="<?php echo site_url('semestreacademico/edit/'.$s['idSemestreAcademico']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('semestreacademico/remove/'.$s['idSemestreAcademico']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
