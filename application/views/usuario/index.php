<div class="row">
	<div class="col-md text-center">
	<h2><b>Lista de Usuarios</b></h2>
	</div>
</div> 
<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		<a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>
<table class="table table-striped table-bordered">
    <tr>
		<th>#</th>
		<th>Persona</th>
		<!-- <th>Usuario</th> -->
		<!-- <th>Contrase</th> -->
		<th>Ultima Sesión</th>
		<th>Permiso</th>
		<th>Habilitacion</th>
		<th>Operación</th>
    </tr>
	<?php 
	$temp=1;
	// var_dump($usuario);
	foreach($usuario as $u){ ?>
    <tr>
		<td><?$temp++?></td>
		<td><?php echo $u['persona']; ?></td>
		<!-- <td><?php echo $u['usuario']; ?></td> -->
		<!-- <td><?php echo $u['contrase']; ?></td> -->
		<td><?php echo $u['ultimaSesion']; ?></td>
		<td><?php echo $u['permiso']; ?></td>
		<td><?php echo $u['habilitacion']; ?></td>
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['idUsuario']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('usuario/remove/'.$u['idPersona']); ?>" class="btn btn-danger btn-xs">Borrar</a>
        </td>
    </tr>
	<?php } ?>
</table>
