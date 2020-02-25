<div class="container">
	<div class="row">
		<div class="col-md text-center">
		<?php if(!empty($modulo['idModulo'])){?>
			<h2><b>Nueva Unidad Didactica del Modulo</b></h2>
			<h2><b><?php echo $modulo['nombreModulo'];?></b></h2>
		<?php } else { ?>
			<h2><b>Nueva Unidad Didactica</b></h2>
			<?php } ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-md">
		<?php if(!empty($modulo['idModulo'])){?>
			<a href="<?php echo site_url('unidaddidactica/unidades_by_modulo/').$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		<?php } else { ?>
			<a href="<?php echo site_url('unidaddidactica');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		<?php } ?>
		</div>
	</div>
</div>
<hr>

<div class="container">
<?php if(!empty($modulo['idModulo'])){  echo form_open('unidaddidactica/add_unidad_by_modulo/'.$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional'],array("class"=>"form-horizontal")); }
		else{echo form_open('unidaddidactica/add',array("class"=>"form-horizontal"));}
?>

		<div class="row">
			<div class="col-md form-group">
				<label for="nombreUnidadDidactica" class="col-md-4 control-label">Nombre de Unidad</label>
				<input type="text" name="nombreUnidadDidactica" class="form-control" id="nombreUnidadDidactica" placeholder="Nombre de la Unidad Didactica" />
			</div>
		</div>


		<div class="row form-group">
			<div class="col-md">
				<label for="creditos" class="col-md-4 control-label">Creditos</label>
				<input type="number" name="creditos" class="form-control" id="creditos" placeholder="Cantidad de creditos"/>
			</div>
			<div class="col-md">
				<label for="horasunidad" class="col-md-4 control-label">Horas</label>
				<input type="number" name="horasunidad"  class="form-control" id="horasunidad" placeholder="Cantidad de Horas"/>
			</div>
			<div class="col-md">
				<label for="idSemestre" class="col-md-4 control-label">Semestre</label>
				<select name="idSemestre" id="idSemestre" class="form-control">
					<option value="0">--Seleccione--</option>
					<?php foreach($semestre as $s){?>
						<option value="<?php echo $s['idSemestre']; ?>"><?php echo $s['romanos']?></option>
					<?php }?>
				</select>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label for="idModulo" class="col-md-4 control-label">Modulo</label>
				<select name="idModulo" id="idModulo" class="form-control">
					<?php if(!empty($modulo['idModulo'])){?>
					<option value="<?php echo $modulo['idModulo'];?>"><?php echo $modulo['nombreModulo'];?></option>
					<?php } else{ foreach($modulos as $m){?>
						<option value="<?php echo $m['idModulo'];?>"><?php echo $m['nombreModulo'];?></option>
					<?php }}?>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md justify-content-center text-center">
				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
			</div>
		</div>

	
<?php echo form_close(); ?>
</div>