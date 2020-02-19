<?php echo form_open('unidaddidactica/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreUnidadDidactica" class="col-md-4 control-label">NombreUnidadDidactica</label>
		<div class="col-md-8">
			<input type="text" name="nombreUnidadDidactica" value="<?php echo $this->input->post('nombreUnidadDidactica'); ?>" class="form-control" id="nombreUnidadDidactica" />
		</div>
	</div>
	<div class="form-group">
		<label for="creditos" class="col-md-4 control-label">Creditos</label>
		<div class="col-md-8">
			<input type="text" name="creditos" value="<?php echo $this->input->post('creditos'); ?>" class="form-control" id="creditos" />
		</div>
	</div>
	<div class="form-group">
		<label for="horasunidad" class="col-md-4 control-label">Horasunidad</label>
		<div class="col-md-8">
			<input type="text" name="horasunidad" value="<?php echo $this->input->post('horasunidad'); ?>" class="form-control" id="horasunidad" />
		</div>
	</div>
	<div class="form-group">
		<label for="idSemestre" class="col-md-4 control-label">IdSemestre</label>
		<div class="col-md-8">
			<input type="text" name="idSemestre" value="<?php echo $this->input->post('idSemestre'); ?>" class="form-control" id="idSemestre" />
		</div>
	</div>
	<div class="form-group">
		<label for="idModulo" class="col-md-4 control-label">IdModulo</label>
		<div class="col-md-8">
			<input type="text" name="idModulo" value="<?php echo $this->input->post('idModulo'); ?>" class="form-control" id="idModulo" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>