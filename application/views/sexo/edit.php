<?php echo form_open('sexo/edit/'.$sexo['idSexo'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreSexo" class="col-md-4 control-label">NombreSexo</label>
		<div class="col-md-8">
			<input type="text" name="nombreSexo" value="<?php echo ($this->input->post('nombreSexo') ? $this->input->post('nombreSexo') : $sexo['nombreSexo']); ?>" class="form-control" id="nombreSexo" />
		</div>
	</div>
	<div class="form-group">
		<label for="letraSexo" class="col-md-4 control-label">LetraSexo</label>
		<div class="col-md-8">
			<input type="text" name="letraSexo" value="<?php echo ($this->input->post('letraSexo') ? $this->input->post('letraSexo') : $sexo['letraSexo']); ?>" class="form-control" id="letraSexo" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>