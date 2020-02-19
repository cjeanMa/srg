<?php echo form_open('permiso/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombrePermiso" class="col-md-4 control-label">NombrePermiso</label>
		<div class="col-md-8">
			<input type="text" name="nombrePermiso" value="<?php echo $this->input->post('nombrePermiso'); ?>" class="form-control" id="nombrePermiso" />
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
		<div class="col-md-8">
			<input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>