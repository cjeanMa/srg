<h1 class="h3 mb-4 text-gray-800">Editar Nombre de Discapacidad</h1>
<?php echo form_open('discapacidad/edit/'.$discapacidad['idDiscapacidad'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreDiscapacidad" class="col-md-4 control-label">Nombre de Discapacidad</label>
		<div class="col-md-8">
			<input type="text" name="nombreDiscapacidad" value="<?php echo ($this->input->post('nombreDiscapacidad') ? $this->input->post('nombreDiscapacidad') : $discapacidad['nombreDiscapacidad']); ?>" class="form-control" id="nombreDiscapacidad" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>