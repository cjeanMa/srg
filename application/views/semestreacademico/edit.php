<?php echo form_open('semestreacademico/edit/'.$semestreacademico['idSemestreAcademico'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="anio" class="col-md-4 control-label">Anio</label>
		<div class="col-md-8">
			<input type="text" name="anio" value="<?php echo ($this->input->post('anio') ? $this->input->post('anio') : $semestreacademico['anio']); ?>" class="form-control" id="anio" />
		</div>
	</div>
	<div class="form-group">
		<label for="periodo" class="col-md-4 control-label">Periodo</label>
		<div class="col-md-8">
			<input type="text" name="periodo" value="<?php echo ($this->input->post('periodo') ? $this->input->post('periodo') : $semestreacademico['periodo']); ?>" class="form-control" id="periodo" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>