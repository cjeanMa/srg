<?php echo form_open('usuario/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="usuario" class="col-md-4 control-label">Usuario</label>
		<div class="col-md-8">
			<input type="text" name="usuario" value="<?php echo $this->input->post('usuario'); ?>" class="form-control" id="usuario" />
		</div>
	</div>
	<div class="form-group">
		<label for="contrase" class="col-md-4 control-label">Contrase</label>
		<div class="col-md-8">
			<input type="text" name="contrase" value="<?php echo $this->input->post('contrase'); ?>" class="form-control" id="contrase" />
		</div>
	</div>
	<div class="form-group">
		<label for="ultimaSesion" class="col-md-4 control-label">UltimaSesion</label>
		<div class="col-md-8">
			<input type="text" name="ultimaSesion" value="<?php echo $this->input->post('ultimaSesion'); ?>" class="form-control" id="ultimaSesion" />
		</div>
	</div>
	<div class="form-group">
		<label for="idPermiso" class="col-md-4 control-label">IdPermiso</label>
		<div class="col-md-8">
			<input type="text" name="idPermiso" value="<?php echo $this->input->post('idPermiso'); ?>" class="form-control" id="idPermiso" />
		</div>
	</div>
	<div class="form-group">
		<label for="idPersona" class="col-md-4 control-label">IdPersona</label>
		<div class="col-md-8">
			<input type="text" name="idPersona" value="<?php echo $this->input->post('idPersona'); ?>" class="form-control" id="idPersona" />
		</div>
	</div>
	<div class="form-group">
		<label for="idHabilitacion" class="col-md-4 control-label">IdHabilitacion</label>
		<div class="col-md-8">
			<input type="text" name="idHabilitacion" value="<?php echo $this->input->post('idHabilitacion'); ?>" class="form-control" id="idHabilitacion" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>