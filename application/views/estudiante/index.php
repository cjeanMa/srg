<h2 class="text-center"><b>Lista de Estudiantes</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>  Regresar</a>
		<a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>Dni</th>
		<th>Apellidos y Nombres</th>
		<th>Programa de Estudios</th>
		<th>Ingreso</th>
		<th>Acciones</th>
	</tr>
	<?php foreach($estudiante as $e){ ?>
    <tr>
		<td class="text-center"><?php echo $e['idPersona']; ?></td>
		<?php $nombre = explode(" ", $e['nombres']); //auxiliar para desgosar los nombres del campo nombre ?> 
		<td><?php echo ucfirst($e['apellidoPaterno'])." ". ucfirst($e['apellidoMaterno']) .", "; foreach($nombre as $n){echo ucfirst($n)." ";}?></td>
		<td><?php echo $e['nombreEscuelaProfesional']; ?></td>
		<td class="text-center"><?php echo $e['anio']."-".$e['periodo']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('estudiante/edit/'.$e['idEstudiante']); ?>"><i class="fa fa-edit"></i> </a> 
            <a href="<?php echo site_url('estudiante/remove/'.$e['idEstudiante']); ?>"><i class="fa fa-trash"></i> </a>
        </td>
    </tr>
	<?php } ?>
</table>
