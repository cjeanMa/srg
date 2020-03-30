<h2 class="text-center"><b>Lista de Practicas</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>  Regresar</a>
		<a href="<?php echo site_url('practica/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>DNI</th>
		<th>Modulo</th>
		<th>Institucion</th>
		<th>Encargado</th>
		<th>Acciones</th>
    </tr>
	<?php foreach($practicas as $p){ ?>
    <tr>
		<td class="text-center"><?php echo $p['idPersona']; ?></td>
		<td><?php echo $p['nombreModulo']; ?></td>
		<td><?php echo $p['institucion']; ?></td>
		<td><?php echo $p['encargado']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('practica/edit/'.$p['idPracticas']); ?>"><i class="fa fa-edit"></i> </a> 
            <a href="<?php echo site_url('practica/remove/'.$p['idPracticas']); ?>"><i class="fa fa-trash"></i> </a>
        </td>
    </tr>
	<?php } ?>
</table>
