<div class="container">
<div class="row">
	<div class="col-md text-center">
		<h2><b>Actualizar Unidad Didactica</b></h2>
		<h2><b><?php echo $unidaddidactica['nombreUnidadDidactica']?></b></h2>
	</div>
</div>
<div class="pull-right">
	<div class="col-md">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
</div>
<hr>
</div>

<?php echo form_open('unidaddidactica/edit/'.$unidaddidactica['idUnidadDidactica'],array("class"=>"form-horizontal")); ?>
<div class="container">
		<div class="row">
			<div class="col-md form-group">
				<label for="nombreUnidadDidactica" class="col-md-4 control-label">Nombre de Unidad</label>
				<input type="text" name="nombreUnidadDidactica" class="form-control" id="nombreUnidadDidactica" value="<?php echo $unidaddidactica['nombreUnidadDidactica'];?>"/>
			</div>
		</div>


		<div class="row form-group">
			<div class="col-md">
				<label for="creditos" class="col-md-4 control-label">Creditos</label>
				<input type="number" name="creditos" class="form-control" id="creditos" value="<?php echo $unidaddidactica['creditos'];?>"/>
			</div>
			<div class="col-md">
				<label for="horasunidad" class="col-md-4 control-label">Horas</label>
				<input type="number" name="horasunidad"  class="form-control" id="horasunidad" value="<?php echo $unidaddidactica['horasunidad'];?>"/>
			</div>
			<div class="col-md">
				<label for="idSemestre" class="col-md-4 control-label">Semestre</label>
				<select name="idSemestre" id="idSemestre" class="form-control">
					<?php foreach($semestre as $s){
						if($s['idSemestre'] == $unidaddidactica['idSemestre']){ ?>
						<option value="<?php echo $s['idSemestre']; ?>" selected="selected"><?php echo $s['romanos']?></option>
						<?php } else {?>
						<option value="<?php echo $s['idSemestre']; ?>"><?php echo $s['romanos']?></option>
					<?php } }?>
				</select>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label for="idModulo" class="col-md-4 control-label">Modulo</label>
				<select name="idModulo" id="idModulo" class="form-control">
					<option value="<?php echo $unidaddidactica['idModulo'];?>"><?php echo $unidaddidactica['nombreModulo'];?></option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md justify-content-center text-center">
				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
			</div>
		</div>
	</div>
	
	
<?php echo form_close(); ?>