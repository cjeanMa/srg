<div class="container">
	<div class="row">
		<div class="col-md">
		<h2 class="text-center"><b>Actualizar Plazo de Subida de Notas</b></h2>
		</div>
	</div>
	<div class="row pull-right">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	<hr>
</div>

<?php echo form_open('plazonota/edit/'.$plazonota['idPlazoNotas'],array("class"=>"form-horizontal")); ?>
<div class="container">
	<div class="row form-group">
		<div class="col-md">
			<label for="idSemestreAcademico" class="col-md-4 control-label">Semestre Academico:</label>
			<select name="idSemestreAcademico" id="idSemestreAcademico" class="form-control">
					<option value="<?=$plazonota['idSemestreAcademico'];?>" selected><?=$plazonota['anio']."-".$plazonota['periodo'];?></option>
			</select>
		</div>
	</div>
	<div>
		<input type="date" name="fechaCreacion" id="fechaCreacion" value="<?php echo $plazonota['fechaCreacion']?>" hidden>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label for="fechaInicio" class="col-md-4 control-label">Fecha Inicio:</label>
			<input type="date" name="fechaInicio" class="form-control" id="fechaInicio" value="<?=$plazonota['fechaInicio'];?>" onchange="compFechas();"/>
		</div>

		<div class="col-md">	
			<label for="fechaLimite" class="col-md-4 control-label">Fecha Limite:</label>
			<input type="date" name="fechaLimite" class="form-control" id="fechaLimite" value="<?=$plazonota['fechaLimite'];?>" onchange="compFechas();"/>
		</div>
	</div>

	</div>
	
	<div class="row form-group">
		<div class="col-md text-center">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>