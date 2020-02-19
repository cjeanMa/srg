<?php echo form_open('docente/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idPersona" class="col-md-4 control-label">IdPersona</label>
		<div class="col-md-8">
			<input type="text" name="idPersona" value="<?php echo $this->input->post('idPersona'); ?>" class="form-control" id="idPersona" />
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