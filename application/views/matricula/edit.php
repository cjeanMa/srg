<?php echo form_open('matricula/edit/'.$matricula['idMatricula'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idSemestreAcademico" class="col-md-4 control-label">IdSemestreAcademico</label>
		<div class="col-md-8">
			<input type="text" name="idSemestreAcademico" value="<?php echo ($this->input->post('idSemestreAcademico') ? $this->input->post('idSemestreAcademico') : $matricula['idSemestreAcademico']); ?>" class="form-control" id="idSemestreAcademico" />
		</div>
	</div>
	<div class="form-group">
		<label for="nota" class="col-md-4 control-label">Nota</label>
		<div class="col-md-8">
			<input type="text" name="nota" value="<?php echo ($this->input->post('nota') ? $this->input->post('nota') : $matricula['nota']); ?>" class="form-control" id="nota" />
		</div>
	</div>
	<div class="form-group">
		<label for="notaLetra" class="col-md-4 control-label">NotaLetra</label>
		<div class="col-md-8">
			<input type="text" name="notaLetra" value="<?php echo ($this->input->post('notaLetra') ? $this->input->post('notaLetra') : $matricula['notaLetra']); ?>" class="form-control" id="notaLetra" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaMatricula" class="col-md-4 control-label">FechaMatricula</label>
		<div class="col-md-8">
			<input type="text" name="fechaMatricula" value="<?php echo ($this->input->post('fechaMatricula') ? $this->input->post('fechaMatricula') : $matricula['fechaMatricula']); ?>" class="form-control" id="fechaMatricula" />
		</div>
	</div>
	<div class="form-group">
		<label for="observacion" class="col-md-4 control-label">Observacion</label>
		<div class="col-md-8">
			<input type="text" name="observacion" value="<?php echo ($this->input->post('observacion') ? $this->input->post('observacion') : $matricula['observacion']); ?>" class="form-control" id="observacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstudiante" class="col-md-4 control-label">IdEstudiante</label>
		<div class="col-md-8">
			<input type="text" name="idEstudiante" value="<?php echo ($this->input->post('idEstudiante') ? $this->input->post('idEstudiante') : $matricula['idEstudiante']); ?>" class="form-control" id="idEstudiante" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstado" class="col-md-4 control-label">IdEstado</label>
		<div class="col-md-8">
			<input type="text" name="idEstado" value="<?php echo ($this->input->post('idEstado') ? $this->input->post('idEstado') : $matricula['idEstado']); ?>" class="form-control" id="idEstado" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstadoModular" class="col-md-4 control-label">IdEstadoModular</label>
		<div class="col-md-8">
			<input type="text" name="idEstadoModular" value="<?php echo ($this->input->post('idEstadoModular') ? $this->input->post('idEstadoModular') : $matricula['idEstadoModular']); ?>" class="form-control" id="idEstadoModular" />
		</div>
	</div>
	<div class="form-group">
		<label for="tipo_Matricula_idTipo_Matricula" class="col-md-4 control-label">Tipo Matricula IdTipo Matricula</label>
		<div class="col-md-8">
			<input type="text" name="tipo_Matricula_idTipo_Matricula" value="<?php echo ($this->input->post('tipo_Matricula_idTipo_Matricula') ? $this->input->post('tipo_Matricula_idTipo_Matricula') : $matricula['tipo_Matricula_idTipo_Matricula']); ?>" class="form-control" id="tipo_Matricula_idTipo_Matricula" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>