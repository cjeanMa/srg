<div class="pull-right">
	<a href="<?php echo site_url('unidaddidactica_has_matricula/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>UnidadDidactica IdunidadDidactica</th>
		<th>Matricula IdMatricula</th>
		<th>Nota</th>
		<th>NotaLetras</th>
		<th>Observacion</th>
		<th>Actions</th>
    </tr>
	<?php foreach($unidaddidactica_has_matricula as $u){ ?>
    <tr>
		<td><?php echo $u['unidadDidactica_idunidadDidactica']; ?></td>
		<td><?php echo $u['matricula_idMatricula']; ?></td>
		<td><?php echo $u['nota']; ?></td>
		<td><?php echo $u['notaLetras']; ?></td>
		<td><?php echo $u['observacion']; ?></td>
		<td>
            <a href="<?php echo site_url('unidaddidactica_has_matricula/edit/'.$u['unidadDidactica_idunidadDidactica']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('unidaddidactica_has_matricula/remove/'.$u['unidadDidactica_idunidadDidactica']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
