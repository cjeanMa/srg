<?php echo form_open('discapacidad/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreDiscapacidad" class="col-md-4 control-label">NombreDiscapacidad</label>
		<div class="col-md-8">
			<input type="text" name="nombreDiscapacidad" value="<?php echo $this->input->post('nombreDiscapacidad'); ?>" class="form-control" id="nombreDiscapacidad" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>