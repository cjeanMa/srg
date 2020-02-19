<?php echo form_open('practica/edit/'.$practica['idPracticas'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idModulo" class="col-md-4 control-label">IdModulo</label>
		<div class="col-md-8">
			<input type="text" name="idModulo" value="<?php echo ($this->input->post('idModulo') ? $this->input->post('idModulo') : $practica['idModulo']); ?>" class="form-control" id="idModulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="institucion" class="col-md-4 control-label">Institucion</label>
		<div class="col-md-8">
			<input type="text" name="institucion" value="<?php echo ($this->input->post('institucion') ? $this->input->post('institucion') : $practica['institucion']); ?>" class="form-control" id="institucion" />
		</div>
	</div>
	<div class="form-group">
		<label for="encargado" class="col-md-4 control-label">Encargado</label>
		<div class="col-md-8">
			<input type="text" name="encargado" value="<?php echo ($this->input->post('encargado') ? $this->input->post('encargado') : $practica['encargado']); ?>" class="form-control" id="encargado" />
		</div>
	</div>
	<div class="form-group">
		<label for="direccion" class="col-md-4 control-label">Direccion</label>
		<div class="col-md-8">
			<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $practica['direccion']); ?>" class="form-control" id="direccion" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstudiante" class="col-md-4 control-label">IdEstudiante</label>
		<div class="col-md-8">
			<input type="text" name="idEstudiante" value="<?php echo ($this->input->post('idEstudiante') ? $this->input->post('idEstudiante') : $practica['idEstudiante']); ?>" class="form-control" id="idEstudiante" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>