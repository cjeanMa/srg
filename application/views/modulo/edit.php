<div class="container">
	<div class="row">
	<div class="col-md text-center">
		<h2><b>Modificar Modulo</b></h2>
	</div>
</div>	
<div class="row">
		<div class="col-md">
			<a href="<?php echo site_url('modulo/modulosByEp/').$modulo['idEscuelaProfesional'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Atras</a>
		</div>
	</div>
<hr>
</div>
	
<?php echo form_open('modulo/edit/'.$modulo['idModulo'],array("class"=>"form-horizontal")); ?>

<div class="container">

	<div class="row form-group">
		<div class="col-md">
			<label for="nombreModulo" class="col-md-4 control-label">Nombre del Modulo:</label>
			<input type="text" name="nombreModulo" class="form-control" id="nombreModulo" value="<?php echo $modulo['nombreModulo'];?>"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="horasModulo" class="col-md-4 control-label">Horas del Modulo:</label>
		<input type="number" name="horasModulo" class="form-control" id="horasModulo" value="<?php echo $modulo['horasModulo'];?>"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="idEscuelaProfesional" class="col-md-4 control-label">Escuela Profesional</label>
		<select name="idEscuelaProfesional" id="idEscuelaProfesional" class="form-control">
		<option value="<?php echo $modulo['idEscuelaProfesional'];?>"><?php echo $modulo['nombreEscuelaProfesional']; ?></option>
		</select>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md text-center">
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
		</div>
	</div>
	
	
</div>
	
<?php echo form_close(); ?>