<h1 class="h3 mb-4 text-gray-800">Lista de Discapacidad</h1>
<div class="pull-right">
	<a href="<?php echo site_url('discapacidad/add'); ?>" class="btn btn-success">Agregar Discapacidad</a> 
</div>

<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>#</th>
		<th>Nombre de Discapacidad</th>
		<th >Opciones</th>
    </tr>
	<?php 
	$temp=1;
	foreach($discapacidad as $d){ ?>
    <tr>
		<td class="text-center"><?php echo $temp++; ?></td>
		<td><?php echo $d['nombreDiscapacidad']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('discapacidad/edit/'.$d['idDiscapacidad']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('discapacidad/remove/'.$d['idDiscapacidad']); ?>" class="btn btn-danger btn-xs">Borrar</a>
        </td>
    </tr>
	<?php } ?>
</table>
