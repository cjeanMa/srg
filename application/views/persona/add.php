<h1 class="h3 mb-4 text-gray-800">Registrar Persona</h1>
<?php echo form_open('persona/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="apellidoPaterno" class="col-md-4 control-label">Apellido Paterno</label>
		<div class="col-md-8">
			<input type="text" name="apellidoPaterno" value="<?php echo $this->input->post('apellidoPaterno'); ?>" class="form-control" id="apellidoPaterno" />
		</div>
	</div>
	<div class="form-group">
		<label for="apellidoMaterno" class="col-md-4 control-label">Apellido Materno</label>
		<div class="col-md-8">
			<input type="text" name="apellidoMaterno" value="<?php echo $this->input->post('apellidoMaterno'); ?>" class="form-control" id="apellidoMaterno" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombres" class="col-md-4 control-label">Nombres</label>
		<div class="col-md-8">
			<input type="text" name="nombres" value="<?php echo $this->input->post('nombres'); ?>" class="form-control" id="nombres" />
		</div>
	</div>
	<div class="form-group">
		<label for="idSexo" class="col-md-4 control-label">Sexo</label>
		<div class="col-md-8">
			<!-- <input type="text" name="idSexo" value="<?php echo $this->input->post('idSexo'); ?>" class="form-control" id="idSexo" /> -->
			<select name="idSexo" class="form-control">
				<?php
				echo (empty($all_sexo)?'<option value="">Sin datos, agrege datos en tabla Sexo</option>':'<option value="">Seleccione Sexo</option>');
				foreach($all_sexo as $sexo)
				{
					$selected = ($sexo['idSexo'] == $this->input->post('idSexo')) ? ' selected="selected"' : "";

					echo '<option value="'.$sexo['idSexo'].'" '.$selected.'>'.$sexo['nombreSexo'].'</option>';
				} 
				?>
			</select>

		</div>
	</div>
	<div class="form-group">
		<label for="fechaNacimiento" class="col-md-4 control-label">Fecha Nacimiento</label>
		<div class="col-md-8">
			<input type="text" name="fechaNacimiento" value="<?php echo $this->input->post('fechaNacimiento'); ?>" class="form-control" id="fechaNacimiento" />
		</div>
	</div>
	<div class="form-group">
		<label for="direccion" class="col-md-4 control-label">Dirección</label>
		<div class="col-md-8">
			<input type="text" name="direccion" value="<?php echo $this->input->post('direccion'); ?>" class="form-control" id="direccion" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="numCelular" class="col-md-4 control-label">Número de Celular</label>
		<div class="col-md-8">
			<input type="text" name="numCelular" value="<?php echo $this->input->post('numCelular'); ?>" class="form-control" id="numCelular" />
		</div>
	</div>
	<div class="form-group">
		<label for="idDiscapacidad" class="col-md-4 control-label">Discapacidad</label>
		<div class="col-md-8">
			<!-- <input type="text" name="idDiscapacidad" value="<?php echo $this->input->post('idDiscapacidad'); ?>" class="form-control" id="idDiscapacidad" /> -->
			<select name="idDiscapacidad" class="form-control">
				<?php
				echo (empty($all_discapacidad)?'<option value="">Sin datos, agrege datos en tabla Discapacidad</option>':'<option value="">Seleccine Discapacidad</option>');
				foreach($all_discapacidad as $discapacidad)
				{
					$selected = ($discapacidad['idDiscapacidad'] == $this->input->post('idDiscapacidad')) ? ' selected="selected"' : "";

					echo '<option value="'.$discapacidad['idDiscapacidad'].'" '.$selected.'>'.$discapacidad['nombreDiscapacidad'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
        </div>
	</div>

<?php echo form_close(); ?>