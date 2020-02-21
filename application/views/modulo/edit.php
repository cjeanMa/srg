<?php echo form_open('modulo/edit/'.$modulo['idModulo'],array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="idEscuelaProfesional" class="col-md-4 control-label">Escuela Profesional</label>
		<div class="col-md-8">
		<select name="idEscuelaProfesional" class="form-control">
				<option value="">select escuelaprofesional</option>
				<?php 
				foreach($all_escuelaprofesional as $escuelaprofesional)
				{
					$selected = ($escuelaprofesional['idEscuelaProfesional'] == $modulo['idEscuelaProfesional']) ? ' selected="selected"' : "";

					echo '<option value="'.$escuelaprofesional['idEscuelaProfesional'].'" '.$selected.'>'.$escuelaprofesional['nombreEscuelaProfesional'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nombreModulo" class="col-md-4 control-label">NombreModulo</label>
		<div class="col-md-8">
			<input type="text" name="nombreModulo" value="<?php echo ($this->input->post('nombreModulo') ? $this->input->post('nombreModulo') : $modulo['nombreModulo']); ?>" class="form-control" id="nombreModulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="horasModulo" class="col-md-4 control-label">HorasModulo</label>
		<div class="col-md-8">
			<input type="text" name="horasModulo" value="<?php echo ($this->input->post('horasModulo') ? $this->input->post('horasModulo') : $modulo['horasModulo']); ?>" class="form-control" id="horasModulo" />
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="<?=base_url();?>modulo" class="btn btn-danger">Atras</a>
        </div>
	</div>
	
<?php echo form_close(); ?>