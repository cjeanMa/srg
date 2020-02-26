<h1 class="h3 mb-4 text-gray-800">Permiso de Usuario</h1>

<div class="pull-right">
	<a href="<?php echo site_url('habilitacion/add'); ?>" class="btn btn-success">Agregar</a> 
</div>
<table class="table  table-striped table-bordered">
    <tr class="bg-gradient-primary text-white text-center">
		<!-- <th>IdHabilitacion</th> -->
		<th>Descripción</th>
		<th>Operación</th>
    </tr>

	<?php 
	// var_dump($habilitacion);
	foreach($habilitacion as $h){ ?>
    <tr>
		<!-- <td><?php echo $h['idHabilitacion']; ?></td> -->
		<td><?php echo $h['descripcion']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('habilitacion/edit/'.$h['idHabilitacion']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('habilitacion/remove/'.$h['idHabilitacion']); ?>" class="btn btn-danger btn-xs">Borrar</a>
        </td>
    </tr>
	<?php } ?>
</table>
