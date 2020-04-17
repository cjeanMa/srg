<h2 class="text-center"><b>Lista de Estudiantes</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>  Regresar</a>
		<a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>
	<div class="row">
		<div class="form-group col-md">
			<label for="dni">Documento de Identidad:</label>
			<input type="text" name="dni" id="dni" placeholder="Documento de Identidad" class="form-control" maxlength="8">
		</div>
		<div class="form-group col-md">
			<label for="pEstudio">Programa de Estudio:</label>
			<select name="pEstudio" id="pEstudio" class="form-control">
				<option value="">--Seleccione--</option>
				<?php foreach($escuelaProfesional as $ep){?>
					<option value="<?=$ep['idEscuelaProfesional']?>"><?=$ep['nombreEscuelaProfesional']?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group col-md">
			<label for="pIngreso">Periodo de Ingreso:</label>
			<select name="pIngreso" id="pIngreso" class="form-control">
				<option value="">--Seleccione--</option>
				<?php foreach($semestreAcademico as $sa){?>
					<option value="<?=$sa['idSemestreAcademico']?>"><?=$sa['anio']."-".$sa['periodo']?></option>
				<?php }?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md">
			<label for="aPaterno">Apellido Paterno:</label>
			<input type="text" name="aPaterno" id="aPaterno" placeholder="Ingrese Apellido Paterno" class="form-control">
		</div>
		<div class="form-group col-md">
			<label for="aMaterno">Apellido Materno:</label>
			<input type="text" name="aMaterno" id="aMaterno" placeholder="Ingrese Apellido Materno" class="form-control">
		</div>
		<div class="form-group col-md">
			<label for="nombres">Nombres:</label>
			<input type="text" name="nombres" id="nombres" placeholder="Ingrese El Nombre" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<button class="btn btn-primary btn-block" id="buscar_estudiantes"><i class="fa fa-search"></i> Buscar</button>
		</div>
	</div>

<hr>

<table class="table table-striped table-bordered display" id="table_estudiantes">
    <thead class="text-center table-dark">
		<tr>
		<th>Dni</th>
		<th>Apellidos y Nombres</th>
		<th>Programa de Estudios</th>
		<th>Ingreso</th>
		<th>Acciones</th>
		</tr>
	</thead>

    <tbody>
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
	</tbody>
	
</table>
