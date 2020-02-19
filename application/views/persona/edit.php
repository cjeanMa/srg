<?php echo form_open('persona/edit/'.$persona['idPersona'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="apellidoPaterno" class="col-md-4 control-label">ApellidoPaterno</label>
		<div class="col-md-8">
			<input type="text" name="apellidoPaterno" value="<?php echo ($this->input->post('apellidoPaterno') ? $this->input->post('apellidoPaterno') : $persona['apellidoPaterno']); ?>" class="form-control" id="apellidoPaterno" />
		</div>
	</div>
	<div class="form-group">
		<label for="apellidoMaterno" class="col-md-4 control-label">ApellidoMaterno</label>
		<div class="col-md-8">
			<input type="text" name="apellidoMaterno" value="<?php echo ($this->input->post('apellidoMaterno') ? $this->input->post('apellidoMaterno') : $persona['apellidoMaterno']); ?>" class="form-control" id="apellidoMaterno" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombres" class="col-md-4 control-label">Nombres</label>
		<div class="col-md-8">
			<input type="text" name="nombres" value="<?php echo ($this->input->post('nombres') ? $this->input->post('nombres') : $persona['nombres']); ?>" class="form-control" id="nombres" />
		</div>
	</div>
	<div class="form-group">
		<label for="idSexo" class="col-md-4 control-label">IdSexo</label>
		<div class="col-md-8">
			<input type="text" name="idSexo" value="<?php echo ($this->input->post('idSexo') ? $this->input->post('idSexo') : $persona['idSexo']); ?>" class="form-control" id="idSexo" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaNacimiento" class="col-md-4 control-label">FechaNacimiento</label>
		<div class="col-md-8">
			<input type="text" name="fechaNacimiento" value="<?php echo ($this->input->post('fechaNacimiento') ? $this->input->post('fechaNacimiento') : $persona['fechaNacimiento']); ?>" class="form-control" id="fechaNacimiento" />
		</div>
	</div>
	<div class="form-group">
		<label for="direccion" class="col-md-4 control-label">Direccion</label>
		<div class="col-md-8">
			<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $persona['direccion']); ?>" class="form-control" id="direccion" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $persona['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="numCelular" class="col-md-4 control-label">NumCelular</label>
		<div class="col-md-8">
			<input type="text" name="numCelular" value="<?php echo ($this->input->post('numCelular') ? $this->input->post('numCelular') : $persona['numCelular']); ?>" class="form-control" id="numCelular" />
		</div>
	</div>
	<div class="form-group">
		<label for="idDiscapacidad" class="col-md-4 control-label">IdDiscapacidad</label>
		<div class="col-md-8">
			<input type="text" name="idDiscapacidad" value="<?php echo ($this->input->post('idDiscapacidad') ? $this->input->post('idDiscapacidad') : $persona['idDiscapacidad']); ?>" class="form-control" id="idDiscapacidad" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>