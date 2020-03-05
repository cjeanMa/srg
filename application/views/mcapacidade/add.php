<div class="container">
	<?php if(!empty($modulo['idModulo'])){ ?>
	<div class="row text-center">
		<div class="col-md-12">
		<h2><b>Nueva Capacidad Modular de</b></h2>
		</div>
		<div class="col-md-12">
		<h2><b><?php echo $modulo['nombreModulo'];?></b></h2>
		</div>
	</div>
	<?php } else { ?>
		<div class="row text-center">
			<div class="col-md-12">
				<h2><b>Nueva Capacidad Modular</b></h2>
			</div>
		</div>
	<?php  } ?>
	<div class="pull-right">
		<div class="col-md-12">
			<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Regresar </a>
		</div>
	</div>
	<hr>
</div>


<?php if(!empty($modulo['idModulo'])){
	echo form_open('mcapacidade/addByModulo/'.$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional'],array("class"=>"form-horizontal"));
} else{
echo form_open('mcapacidade/add',array("class"=>"form-horizontal")); }?>
<div class="container">
	<div class="row form-group">
		<div class="col-md-12">
		<label for="nombreMcapacidades" class="col-md-4 control-label">Capacidad Modular: </label>
		<input type="text" name="nombreMcapacidades" class="form-control" id="nombreMcapacidades" placeholder="Nombre de la capacidad modular"/>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-12">
		<label for="idModulo" class="col-md-4 control-label">Modulo</label>
		<select name="idModulo" id="idModulo" class="form-control">
			<option value="">--Seleccione--</option>
		<?php if(!empty($modulo['idModulo'])){?>
			<option value="<?php echo $modulo['idModulo'];?>" selected="selected"><?php echo $modulo['nombreModulo'];?></option>
		<?php } else{
			foreach($modulos as $m){
		?>
			<option value="<?php echo $m['idModulo'] ?>"><?php echo $m['nombreModulo'] ?></option>
		<?php }}?>
		</select>
		</div>
	</div>	
	<div class="row form-group text-center">
		<div class="col-md-12">
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
		</div>
	</div>
</div>

<?php echo form_close(); ?>