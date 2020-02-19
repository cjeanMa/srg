<?php echo form_open('escuelaprofesional/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreEscuelaProfesional" class="col-md-4 control-label">NombreEscuelaProfesional</label>
		<div class="col-md-8">
			<input type="text" name="nombreEscuelaProfesional" value="<?php echo $this->input->post('nombreEscuelaProfesional'); ?>" class="form-control" id="nombreEscuelaProfesional" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaCreacion" class="col-md-4 control-label">FechaCreacion</label>
		<div class="col-md-8">
			<input type="text" name="fechaCreacion" value="<?php echo $this->input->post('fechaCreacion'); ?>" class="form-control" id="fechaCreacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="res_autorizacion" class="col-md-4 control-label">Res Autorizacion</label>
		<div class="col-md-8">
			<input type="text" name="res_autorizacion" value="<?php echo $this->input->post('res_autorizacion'); ?>" class="form-control" id="res_autorizacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="fecha_autorizacion" class="col-md-4 control-label">Fecha Autorizacion</label>
		<div class="col-md-8">
			<input type="text" name="fecha_autorizacion" value="<?php echo $this->input->post('fecha_autorizacion'); ?>" class="form-control" id="fecha_autorizacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="res_revalidacion" class="col-md-4 control-label">Res Revalidacion</label>
		<div class="col-md-8">
			<input type="text" name="res_revalidacion" value="<?php echo $this->input->post('res_revalidacion'); ?>" class="form-control" id="res_revalidacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="fecha_revalidacion" class="col-md-4 control-label">Fecha Revalidacion</label>
		<div class="col-md-8">
			<input type="text" name="fecha_revalidacion" value="<?php echo $this->input->post('fecha_revalidacion'); ?>" class="form-control" id="fecha_revalidacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="disponibilidad" class="col-md-4 control-label">Disponibilidad</label>
		<div class="col-md-8">
			<input type="text" name="disponibilidad" value="<?php echo $this->input->post('disponibilidad'); ?>" class="form-control" id="disponibilidad" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>