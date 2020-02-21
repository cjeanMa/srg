<h2 class="text-center"><b>Lista de Programas de Estudio</b></h2>

<div class="row">
	<div class="col-md pull-right">
	<a href="<?php echo site_url('escuelaprofesional/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdEscuelaProfesional</th>
		<th>NombreEscuelaProfesional</th>
		<th>FechaCreacion</th>
		<th>Res Autorizacion</th>
		<th>Fecha Autorizacion</th>
		<th>Res Revalidacion</th>
		<th>Fecha Revalidacion</th>
		<th>Disponibilidad</th>
		<th>Actions</th>
    </tr>
	<?php foreach($escuelaprofesional as $e){ ?>
    <tr>
		<td><?php echo $e['idEscuelaProfesional']; ?></td>
		<td><?php echo $e['nombreEscuelaProfesional']; ?></td>
		<td><?php echo $e['fechaCreacion']; ?></td>
		<td><?php echo $e['res_autorizacion']; ?></td>
		<td><?php echo $e['fecha_autorizacion']; ?></td>
		<td><?php echo $e['res_revalidacion']; ?></td>
		<td><?php echo $e['fecha_revalidacion']; ?></td>
		<td><?php echo $e['disponibilidad']; ?></td>
		<td>
            <a href="<?php echo site_url('escuelaprofesional/edit/'.$e['idEscuelaProfesional']); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pen"></i> </a> 
            <a href="<?php echo site_url('escuelaprofesional/remove/'.$e['idEscuelaProfesional']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-window-close"></i> </a>
        </td>
    </tr>
	<?php } ?>
</table>
