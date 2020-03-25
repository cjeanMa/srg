<h2 class="text-center"><b>Lista de Docentes</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url(); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a> 
		<a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>DNI</th>
		<th>Apellidos y Nombres</th>
		<th>Programa de Estudios</th>
		<th>Acciones</th>
    </tr>
	<?php foreach($docente as $d){ ?>
    <tr>
		<td class="text-center"><?php echo $d['idPersona']; ?></td>
		<?php $nombre = explode(" ", $d['nombres']); //auxiliar para desgosar los nombres del campo nombre ?> 
		<td><?php echo ucfirst($d['apellidoPaterno'])." ". ucfirst($d['apellidoMaterno']) .", "; foreach($nombre as $n){echo ucfirst($n)." ";}?></td>
		<td><?php echo $d['nombreEscuelaProfesional']; ?></td>
		<td class ="text-center">
            <a href="<?php echo site_url('docente/edit/'.$d['idDocente']); ?>"> <i class="fa fa-edit"></i> </a> 
            <a href="<?php echo site_url('docente/remove/'.$d['idDocente']); ?>"><i class="fa fa-trash"></i> </a>
        </td>
    </tr>
	<?php } ?>
</table>
