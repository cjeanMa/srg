<?php echo form_open('asignacion/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idDocente" class="col-md-4 control-label">IdDocente</label>
		<div class="col-md-8">
			<input type="text" name="idDocente" value="<?php echo $this->input->post('idDocente'); ?>" class="form-control" id="idDocente" />
		</div>
	</div>
	<div class="form-group">
		<label for="idSemestreAcademico" class="col-md-4 control-label">IdSemestreAcademico</label>
		<div class="col-md-8">
			<input type="text" name="idSemestreAcademico" value="<?php echo $this->input->post('idSemestreAcademico'); ?>" class="form-control" id="idSemestreAcademico" />
		</div>
	</div>
	<div class="form-group">
		<label for="idUnidadDidactica" class="col-md-4 control-label">IdUnidadDidactica</label>
		<div class="col-md-8">
			<input type="text" name="idUnidadDidactica" value="<?php echo $this->input->post('idUnidadDidactica'); ?>" class="form-control" id="idUnidadDidactica" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>