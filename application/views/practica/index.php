<h2 class="text-center"><b>Lista de Practicas</b></h2>

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>  Regresar</a>
		<a href="<?php echo site_url('practica/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
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
			<label for="modulo">Modulo:</label>
			<select name="modulo" id="modulo" class="form-control" disabled>
				<option value="">--Seleccione--</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<button class="btn btn-primary btn-block" id="buscar_practicas"><i class="fa fa-search"></i> Buscar</button>
		</div>
	</div>

	<hr>

<table class="table table-striped table-bordered" id="table_practica">
	<thead class="table-dark">
		<tr class="text-center">
			<th>DNI</th>
			<th>Modulo</th>
			<th>Institucion</th>
			<th>Encargado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>
