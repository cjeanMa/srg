<div class="container">
	<div class="row justify-content-center text-center">
	<?php
		if (!empty($only_escuelaProfesional['idEscuelaProfesional'])) {
	?>
			<h2 class='col-md-12'><b>Nuevo Modulo del programa de Estudios</b></h2>
			<h2 class='col-md-12'><b><?php echo $only_escuelaProfesional['nombreEscuelaProfesional'];?></b></h2>

	<?php }
		else{
	?>
			<h2><b>Nuevo Modulo</b></h2>
	<?php	}
	?>
	</div>
	
	<div class="row">
		<div class="col-md">
	<?php
		if (!empty($only_escuelaProfesional['idEscuelaProfesional'])) {
	?>
		<a href="<?php echo site_url('modulo/modulosByEp/').$only_escuelaProfesional['idEscuelaProfesional']; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Atras</a>
	<?php
		}
		else{ 
	?>
		<a href="<?php echo site_url('modulo'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Atras</a>
	<?php 
		}
	?>	
	</div>
	</div>
</div>

<hr>
<?php 
if (!empty($only_escuelaProfesional['idEscuelaProfesional'])) {
	echo form_open('modulo/add_modulo_by_ep/'.$only_escuelaProfesional['idEscuelaProfesional'],array("class"=>"form-horizontal"));}
else{
	echo form_open('modulo/add',array("class"=>"form-horizontal"));} 
?>

<div class="container">
	<div class="row form-group">
		<div class="col-md">
			<label for="nombreModulo" class="col-md-4 control-label">Nombre del Modulo:</label>
			<input type="text" name="nombreModulo" class="form-control" id="nombreModulo" placeholder="Nombre de modulo"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="horasModulo" class="col-md-4 control-label">Horas del Modulo:</label>
		<input type="number" name="horasModulo" class="form-control" id="horasModulo" placeholder="Horas de modulo"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="idEscuelaProfesional" class="col-md-4 control-label">Escuela Profesional</label>
		<select name="idEscuelaProfesional" id="idEscuelaProfesional" class="form-control">
		<?php 
			if (!empty($only_escuelaProfesional['idEscuelaProfesional'])) {?>
			<option value=<?php echo $only_escuelaProfesional['idEscuelaProfesional']; ?>><?php echo $only_escuelaProfesional['nombreEscuelaProfesional'];?></option>
		
		<?php }
		else{
			echo "<option value='0'>--Seleccione--</option>";
			foreach($escuelaProfesional as $ep){
			echo "<option value=".$ep['idEscuelaProfesional'].">".$ep['nombreEscuelaProfesional']."</option>";
			}
		?>
		<?php
		}
		?>	
		</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md text-center">
		<button type="submit" class="btn btn-success">Aceptar</button>
		</div>
	</div>
</div>

<?php echo form_close(); ?>