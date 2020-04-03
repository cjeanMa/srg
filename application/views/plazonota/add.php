<div class="container">
	<div class="row">
		<div class="col-md">
		<h2 class="text-center"><b>Nuevo Plazo de Subida de Notas</b></h2>
		</div>
	</div>
	<div class="row pull-right">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	<hr>
</div>

<?php echo form_open('plazonota/add',array("class"=>"form-horizontal")); ?>
	<div class="container">
	<div class="row form-group">
		<div class="col-md">
			<label for="idSemestreAcademico" class="col-md-4 control-label">Semestre Academico:</label>
			<select name="idSemestreAcademico" id="idSemestreAcademico" class="form-control">
				<option value="">--Seleccione--</option>
				<?php foreach($semestreAcademico as $sa){?>
					<option value="<?php echo $sa['idSemestreAcademico'];?>"><?php echo $sa['anio']."-".$sa['periodo'];?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md">
			<label for="fechaInicio" class="col-md-4 control-label">Fecha Inicio:</label>
			<input type="date" name="fechaInicio" class="form-control" id="fechaInicio" onchange="compFechas();"/>
		</div>

		<div class="col-md">	
			<label for="fechaLimite" class="col-md-4 control-label">Fecha Limite:</label>
			<input type="date" name="fechaLimite" class="form-control" id="fechaLimite" onchange="compFechas();"/>
		</div>
	</div>

	</div>
	
	<div class="row form-group">
		<div class="col-md text-center">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
        </div>
	</div>

<?php echo form_close(); ?>
