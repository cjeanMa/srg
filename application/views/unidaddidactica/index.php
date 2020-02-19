<div class="pull-right">
	<a href="<?php echo site_url('unidaddidactica/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdUnidadDidactica</th>
		<th>NombreUnidadDidactica</th>
		<th>Creditos</th>
		<th>Horasunidad</th>
		<th>IdSemestre</th>
		<th>IdModulo</th>
		<th>Actions</th>
    </tr>
	<?php foreach($unidaddidactica as $u){ ?>
    <tr>
		<td><?php echo $u['idUnidadDidactica']; ?></td>
		<td><?php echo $u['nombreUnidadDidactica']; ?></td>
		<td><?php echo $u['creditos']; ?></td>
		<td><?php echo $u['horasunidad']; ?></td>
		<td><?php echo $u['idSemestre']; ?></td>
		<td><?php echo $u['idModulo']; ?></td>
		<td>
            <a href="<?php echo site_url('unidaddidactica/edit/'.$u['idUnidadDidactica']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('unidaddidactica/remove/'.$u['idUnidadDidactica']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
