<?php echo form_open('escuelaprofesional/add',array("class"=>"form-horizontal")); ?>
<div class="container">
	<div class="row text-center">
		<div class="col-md">
			<h2><b>Nuevo Programa de Estudios</b></h2>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-9">
			<label for="nombreEscuelaProfesional" class="control-label">Nombre:</label>
			<input type="text" name="nombreEscuelaProfesional" class="form-control" id="nombreEscuelaProfesional" placeholder="Nombre del Programa de estudios"/>
		</div>
		<div class="col-md-3">
			<label for="fechaCreacion" class="control-label">Fecha de Creacion:</label>
			<input type="date" name="fechaCreacion" class="form-control" id="fechaCreacion" />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="res_autorizacion" class="control-label">Resolucion de Autorizacion.</label>
		<input type="text" name="res_autorizacion" class="form-control" id="res_autorizacion" placeholder="Numero de Resolucion de Autorizacion"/>
		</div>
		<div class="col-md">
		<label for="fecha_autorizacion" class="control-label">Fecha de Autorizacion:</label>
		<input type="date" name="fecha_autorizacion" class="form-control" id="fecha_autorizacion" />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
		<label for="res_revalidacion" class="control-label">Resolucion de Revalidacion:</label>
		<input type="text" name="res_revalidacion" class="form-control" id="res_revalidacion" placeholder="Numero de Resolucion de Revalidacion"/>
		</div>
		<div class="col-md">
		<label for="fecha_revalidacion" class="control-label">Fecha de Revalidacion:</label>
		<input type="date" name="fecha_revalidacion" class="form-control" id="fecha_revalidacion" />
		</div>
	</div>
	<div class="row justify-content-center text-center">
		<div class="col-md-6">
			<button type="submit" class="btn btn-success">Aceptar</button>
        </div>
	</div>

</div>

<?php echo form_close(); ?>