<?php echo form_open('modulo/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreModulo" class="col-md-4 control-label">NombreModulo</label>
		<div class="col-md-8">
			<input type="text" name="nombreModulo" value="<?php echo $this->input->post('nombreModulo'); ?>" class="form-control" id="nombreModulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="horasModulo" class="col-md-4 control-label">HorasModulo</label>
		<div class="col-md-8">
			<input type="text" name="horasModulo" value="<?php echo $this->input->post('horasModulo'); ?>" class="form-control" id="horasModulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEscuelaProfesional" class="col-md-4 control-label">IdEscuelaProfesional</label>
		<div class="col-md-8">
			<input type="text" name="idEscuelaProfesional" value="<?php echo $this->input->post('idEscuelaProfesional'); ?>" class="form-control" id="idEscuelaProfesional" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>