<?php echo form_open('tipomatricula/edit/'.$tipomatricula['idtipoMatricula'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombre" class="col-md-4 control-label">Nombre</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $tipomatricula['nombre']); ?>" class="form-control" id="nombre" />
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
		<div class="col-md-8">
			<input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $tipomatricula['descripcion']); ?>" class="form-control" id="descripcion" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>