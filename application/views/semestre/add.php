<?php echo form_open('semestre/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="romanos" class="col-md-4 control-label">Romanos</label>
		<div class="col-md-8">
			<input type="text" name="romanos" value="<?php echo $this->input->post('romanos'); ?>" class="form-control" id="romanos" />
		</div>
	</div>
	<div class="form-group">
		<label for="nombre" class="col-md-4 control-label">Nombre</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
		</div>
	</div>
	<div class="form-group">
		<label for="prenombre" class="col-md-4 control-label">Prenombre</label>
		<div class="col-md-8">
			<input type="text" name="prenombre" value="<?php echo $this->input->post('prenombre'); ?>" class="form-control" id="prenombre" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>