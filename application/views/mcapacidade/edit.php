<div class="container">
	<div class="row text-center">
		<div class="col-md-12">
			<h2><b>Modificar Capacidad Modular</b></h2> 
		</div>
	</div>
	<div class="pull-right">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	<hr>
</div>


<?php 	if(!empty($modulo['idModulo'])){ echo form_open('mcapacidade/editByModulo/'.$mcapacidade['idMcapacidades']."/".$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional'],array("class"=>"form-horizontal"));}
		else{
			echo form_open('mcapacidade/edit/'.$mcapacidade['idMcapacidades'],array("class"=>"form-horizontal"));
		}?>

	<div class="container">
		<div class="row form-group">
			<div class="col-md-12">
				<label for="nombreMcapacidades" class="col-md-4 control-label">Capacidad Modular:</label>
				<input type="text" name="nombreMcapacidades" value="<?php echo ($this->input->post('nombreMcapacidades') ? $this->input->post('nombreMcapacidades') : $mcapacidade['nombreMcapacidades']); ?>" class="form-control" id="nombreMcapacidades" />
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
			<label for="idModulo" class="col-md-4 control-label">Modulo: </label>
			<select name="idModulo" id="idModulo" class="form-control">
			<?php if(!empty($modulo['idModulo'])){?>
		 		<option value="<?php echo $modulo['idModulo'];?>"><?php echo $modulo['nombreModulo'];?></option>	
			<?php } else {	foreach($modulos as $m){
				if($m['idModulo'] == $mcapacidade['idModulo']){?>
				<option value="<?php echo $m['idModulo']; ?>" selected = "selected"><?php echo $m['nombreModulo']; ?></option>
				<?php } else {?>
				<option value="<?php echo $m['idModulo']; ?>"><?php echo $m['nombreModulo']; ?></option>
			<?php }}} ?>
			</select>
			</div>
		</div>
		<div class="row form-group text-center">
		<div class="col-md-12">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
		</div>
	</div>
	</div>

	
	
<?php echo form_close(); ?>