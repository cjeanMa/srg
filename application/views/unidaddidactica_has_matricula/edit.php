<?php echo form_open('unidaddidactica_has_matricula/edit/'.$unidaddidactica_has_matricula['unidadDidactica_idunidadDidactica'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nota" class="col-md-4 control-label">Nota</label>
		<div class="col-md-8">
			<input type="text" name="nota" value="<?php echo ($this->input->post('nota') ? $this->input->post('nota') : $unidaddidactica_has_matricula['nota']); ?>" class="form-control" id="nota" />
		</div>
	</div>
	<div class="form-group">
		<label for="notaLetras" class="col-md-4 control-label">NotaLetras</label>
		<div class="col-md-8">
			<input type="text" name="notaLetras" value="<?php echo ($this->input->post('notaLetras') ? $this->input->post('notaLetras') : $unidaddidactica_has_matricula['notaLetras']); ?>" class="form-control" id="notaLetras" />
		</div>
	</div>
	<div class="form-group">
		<label for="observacion" class="col-md-4 control-label">Observacion</label>
		<div class="col-md-8">
			<input type="text" name="observacion" value="<?php echo ($this->input->post('observacion') ? $this->input->post('observacion') : $unidaddidactica_has_matricula['observacion']); ?>" class="form-control" id="observacion" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>