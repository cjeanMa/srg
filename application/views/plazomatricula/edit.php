<?php echo form_open('plazomatricula/edit/'.$plazomatricula['idPlazoMatricula'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="fechaInicio" class="col-md-4 control-label">FechaInicio</label>
		<div class="col-md-8">
			<input type="text" name="fechaInicio" value="<?php echo ($this->input->post('fechaInicio') ? $this->input->post('fechaInicio') : $plazomatricula['fechaInicio']); ?>" class="form-control" id="fechaInicio" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaLimite" class="col-md-4 control-label">FechaLimite</label>
		<div class="col-md-8">
			<input type="text" name="fechaLimite" value="<?php echo ($this->input->post('fechaLimite') ? $this->input->post('fechaLimite') : $plazomatricula['fechaLimite']); ?>" class="form-control" id="fechaLimite" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaCreacion" class="col-md-4 control-label">FechaCreacion</label>
		<div class="col-md-8">
			<input type="text" name="fechaCreacion" value="<?php echo ($this->input->post('fechaCreacion') ? $this->input->post('fechaCreacion') : $plazomatricula['fechaCreacion']); ?>" class="form-control" id="fechaCreacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaModificacion" class="col-md-4 control-label">FechaModificacion</label>
		<div class="col-md-8">
			<input type="text" name="fechaModificacion" value="<?php echo ($this->input->post('fechaModificacion') ? $this->input->post('fechaModificacion') : $plazomatricula['fechaModificacion']); ?>" class="form-control" id="fechaModificacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="idSemestreAcademico" class="col-md-4 control-label">IdSemestreAcademico</label>
		<div class="col-md-8">
			<input type="text" name="idSemestreAcademico" value="<?php echo ($this->input->post('idSemestreAcademico') ? $this->input->post('idSemestreAcademico') : $plazomatricula['idSemestreAcademico']); ?>" class="form-control" id="idSemestreAcademico" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>