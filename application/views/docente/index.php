<h2 class="text-center"><b>Lista de Docentes</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url(); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a> 
		<a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>
<div class="row">
		<div class="form-group col-md-4">
			<label for="dni">Documento de Identidad:</label>
			<input type="text" name="dni" id="dni" placeholder="Documento de Identidad" class="form-control" maxlength="8">
		</div>
		<div class="form-group col-md-8">
			<label for="pEstudio">Programa de Estudio:</label>
			<select name="pEstudio" id="pEstudio" class="form-control">
				<option value="">--Seleccione--</option>
				<?php foreach($escuelaProfesional as $ep){?>
					<option value="<?=$ep['idEscuelaProfesional']?>"><?=$ep['nombreEscuelaProfesional']?></option>
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
			<button class="btn btn-primary btn-block" id="buscar_docentes"><i class="fa fa-search"></i> Buscar</button>
		</div>
	</div>
	<hr>

<table class="table table-striped table-bordered" id="table_docente">
	<thead class="table-dark">
		<tr class="text-center">
			<th>DNI</th>
			<th>Apellidos y Nombres</th>
			<th>Programa de Estudios</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>
