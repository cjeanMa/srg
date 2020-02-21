<?php echo form_open('modulo/add',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="idEscuelaProfesional" class="col-md-4 control-label">Escuela Profesional</label>
		<div class="col-md-8">
			<select name="idEscuelaProfesional" class="form-control">
				<option value="">select escuelaprofesional</option>
				<?php 
				echo var_dump($all_escuelaprofesional);
				foreach($all_escuelaprofesional as $escuelaprofesional)
				{
					$selected = ($escuelaprofesional['idEscuelaProfesional'] == $this->input->post('idEscuelaProfesional')) ? ' selected="selected"' : "";

					echo '<option value="'.$escuelaprofesional['idEscuelaProfesional'].'" '.$selected.'>'.$escuelaprofesional['nombreEscuelaProfesional'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nombreModulo" class="col-md-4 control-label">Nombre Modulo</label>
		<div class="col-md-8">
			<input type="text" name="nombreModulo" value="<?php echo $this->input->post('nombreModulo'); ?>" class="form-control" id="nombreModulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="horasModulo" class="col-md-4 control-label">Horas Modulo</label>
		<div class="col-md-8">
			<input type="text" name="horasModulo" value="<?php echo $this->input->post('horasModulo'); ?>" class="form-control" id="horasModulo" />
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="<?=base_url();?>modulo" class="btn btn-danger">Atras</a>
        </div>
	</div>

<?php echo form_close(); ?>