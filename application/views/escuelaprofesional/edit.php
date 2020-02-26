	<div class="container">
	<div class="row text-center">
		<div class="col-md"><h2><b>Actualizar Programa de Estudios</b></h2></div>
	</div>
	<div class="row push-right">
		<a href="<?php echo site_url('escuelaprofesional');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	</div>
	<hr>
<?php echo form_open('escuelaprofesional/edit/'.$escuelaprofesional['idEscuelaProfesional'],array("class"=>"form-horizontal")); ?>

	<div class="container">

		<div class="row form-group">
		<div class="col-md-9">
			<label for="nombreEscuelaProfesional" class="control-label">Nombre de la escuela profesional:</label>
			<input type="text" name="nombreEscuelaProfesional" value="<?php echo ($this->input->post('nombreEscuelaProfesional') ? $this->input->post('nombreEscuelaProfesional') : $escuelaprofesional['nombreEscuelaProfesional']); ?>" class="form-control" id="nombreEscuelaProfesional"/>
		</div>
		<div class="col-md-3">
			<label for="fechaCreacion" class="control-label">Fecha de Creacion:</label>
			<input type="date" name="fechaCreacion" value="<?php echo ($this->input->post('fechaCreacion') ? $this->input->post('fechaCreacion') : $escuelaprofesional['fechaCreacion']); ?>" class="form-control" id="fechaCreacion" />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="res_autorizacion" class="control-label">Resolucion de Autorizacion.</label>
		<input type="text" name="res_autorizacion" value="<?php echo ($this->input->post('res_autorizacion') ? $this->input->post('res_autorizacion') : $escuelaprofesional['res_autorizacion']); ?>" class="form-control" id="res_autorizacion" class="form-control" id="res_autorizacion"/>
		</div>
		<div class="col-md">
		<label for="fecha_autorizacion" class="control-label">Fecha de Autorizacion:</label>
		<input type="date" name="fecha_autorizacion" value="<?php echo ($this->input->post('fecha_autorizacion') ? $this->input->post('fecha_autorizacion') : $escuelaprofesional['fecha_autorizacion']); ?>" class="form-control" id="fecha_autorizacion" />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="res_revalidacion" class="control-label">Resolucion de Revalidacion:</label>
		<input type="text" name="res_revalidacion" value="<?php echo ($this->input->post('res_revalidacion') ? $this->input->post('res_revalidacion') : $escuelaprofesional['res_revalidacion']); ?>" class="form-control" id="res_revalidacion"/>
		</div>
		<div class="col-md">
		<label for="fecha_revalidacion" class="control-label">Fecha de Revalidacion:</label>
		<input type="date" name="fecha_revalidacion" value="<?php echo ($this->input->post('fecha_revalidacion') ? $this->input->post('fecha_revalidacion') : $escuelaprofesional['fecha_revalidacion']); ?>" class="form-control" id="fecha_revalidacion" />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="disponibilidad" class="col-md-4 control-label">Disponibilidad</label>
		<select name="disponibilidad" id="disponibilidad" class="form-control">
			<?php for($i = 0; $i<sizeof($this->disponibilidad); $i++){
				//en el controlador de escuela profesional cre un array para identificar la disponibilidad de la misma
				$escuelaprofesional['disponibilidad']==$i?$aux="selected='selected'":$aux='';
				echo "<option value='".$i."' class='form-control' $aux>".$this->disponibilidad[$i]."</option>";		
			}
			?>
		</select>
		</div>
		
	</div>
	<div class="row justify-content-center form-group">
		<div class="col-md text-center">
			<button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>
	</div>

	</div>


	
	
	
<?php echo form_close(); ?>