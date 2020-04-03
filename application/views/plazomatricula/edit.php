<div class="container">
	<div class="row">
		<div class="col-md">
		<h2 class="text-center"><b>Actualizar Plazo de Subida de Matriculas</b></h2>
		</div>
	</div>
	<div class="row pull-right">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	<hr>
</div>

<?php echo form_open('plazomatricula/edit/'.$plazomatricula['idPlazoMatricula'],array("class"=>"form-horizontal")); ?>

<div class="container">
	<div class="row form-group">
		<div class="col-md">
			<label for="idSemestreAcademico" class="col-md-4 control-label">Semestre Academico:</label>
			<select name="idSemestreAcademico" id="idSemestreAcademico" class="form-control">
				<option value="<?=$plazomatricula['idSemestreAcademico'];?>"><?=$plazomatricula['anio']."-".$plazomatricula['periodo'];?></option>
			</select>
		</div>
	</div>
	<h4>Fecha Ordinarios:</h4>
	<div class="row form-group">
		<div class="col-md">
			<label for="fechaInicio" class="col-md-4 control-label">Fecha Inicio:</label>
			<input type="date" name="fechaInicio" class="form-control" id="fechaInicio" value="<?=$plazomatricula['fechaInicio'];?>"/>
		</div>

		<div class="col-md">	
			<label for="fechaLimite" class="col-md-4 control-label">Fecha Limite:</label>
			<input type="date" name="fechaLimite" class="form-control" id="fechaLimite" value="<?=$plazomatricula['fechaLimite'];?>"/>
		</div>
	</div>
	<h4>Fechas Rezagados:</h4>
	<div class="row form-group">
		<div class="col-md">
			<label for="fechaInicioRezagado" class="col-md-4 control-label">Fecha Inicio:</label>
			<input type="date" name="fechaInicioRezagado" class="form-control" id="fechaInicioRezagado" value="<?=$plazomatricula['fechaInicioRezagado'];?>"/>
		</div>

		<div class="col-md">	
			<label for="fechaLimiteRezagado" class="col-md-4 control-label">Fecha Limite:</label>
			<input type="date" name="fechaLimiteRezagado" class="form-control" id="fechaLimiteRezagado" value="<?=$plazomatricula['fechaLimiteRezagado'];?>"/>
		</div>
	</div>
	<h4>Fechas Extemporaneas:</h4>
	<div class="row form-group">
		<div class="col-md">
			<label for="fechaInicioExtemporaneo" class="col-md-4 control-label">Fecha Inicio:</label>
			<input type="date" name="fechaInicioExtemporaneo" class="form-control" id="fechaInicioExtemporaneo" value="<?=$plazomatricula['fechaInicioExtemporaneo'];?>"/>
		</div>

		<div class="col-md">	
			<label for="fechaLimiteExtemporaneo" class="col-md-4 control-label">Fecha Limite:</label>
			<input type="date" name="fechaLimiteExtemporaneo" class="form-control" id="fechaLimiteExtemporaneo" value="<?=$plazomatricula['fechaLimiteExtemporaneo'];?>"/>
		</div>
	</div>

	</div>
	
	<div class="row form-group">
		<div class="col-md text-center">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>