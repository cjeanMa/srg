<h1 class="h3 mb-4 text-gray-800">Editar Permiso de Usuario</h1>

<?php echo form_open('habilitacion/edit/'.$habilitacion['idHabilitacion'],array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="nombreHabilitacion" class="col-md-4 control-label">nombre Habilitacion</label>
		<div class="col-md-8">
			<input type="text" name="nombreHabilitacion" value="<?php echo ($this->input->post('nombreHabilitacion') ? $this->input->post('nombreHabilitacion') : $habilitacion['nombreHabilitacion']); ?>" class="form-control" id="nombreHabilitacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label">Descripción</label>
		<div class="col-md-8">
			<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $habilitacion['descripcion']); ?>" class="form-control" id="descripcion" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>