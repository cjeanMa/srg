<?php echo form_open('mcapacidade/edit/'.$mcapacidade['idMcapacidades'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nombreMcapacidades" class="col-md-4 control-label">NombreMcapacidades</label>
		<div class="col-md-8">
			<input type="text" name="nombreMcapacidades" value="<?php echo ($this->input->post('nombreMcapacidades') ? $this->input->post('nombreMcapacidades') : $mcapacidade['nombreMcapacidades']); ?>" class="form-control" id="nombreMcapacidades" />
		</div>
	</div>
	<div class="form-group">
		<label for="idModulo" class="col-md-4 control-label">IdModulo</label>
		<div class="col-md-8">
			<input type="text" name="idModulo" value="<?php echo ($this->input->post('idModulo') ? $this->input->post('idModulo') : $mcapacidade['idModulo']); ?>" class="form-control" id="idModulo" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>