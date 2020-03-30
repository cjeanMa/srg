<div class="container">
	<div class="row">
		<div class="col-md text-center">
			<h3><b>Nueva Practica Pre-Profesional</b></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<hr>
</div>

<?php echo form_open('practica/add',array("class"=>"form-horizontal")); ?>
<div class="container">
	<!--Division para cargar los datos basicos como los id's de estudiante, mediante el select carrer_estudainte-->
	<div id="datos_base_practicas">
		<div class="row form-group">
			<div class="col-md">			
				<label for="dni" class="col-md-4 control-label">DNI:</label>
				<input type="text" name="dni" class="form-control" id="dni" maxlength="8" placeholder="Numero de Documento de Identidad" required/>
			</div>
			<div class="col-md">
				<hr>
				<a class="btn btn-info btn-block" onclick="datos_persona_estudiante();" title="Buscar"><i class="fa fa-search"></i> Buscar</a>
			</div>
			<div class="col-md">
				<label for="idEstudiante">Programa de Estudio:</label>
				<select name="idEstudiante" id="idEstudiante" class="form-control" disabled>
					<option value="">--Seleccione--</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md text-center">
				<h1><b></b></h1>
			</div>
		</div>
	</div>
	<!--Para mostrar emnsaje si no puede insertarse las practicas-->
	<div class="row" id="mensaje-error">
		<div></div>
	</div>

	<!--div para cargar los modulos correspondientes por carrera-->
	<div class="row form-group" id="modulos">
		<div class="col-md">
			<label for="">Modulo:</label>
			<select name="idModulo" class="form-control" id="idModulo" disabled>
				<option value="">--Seleccione--</option>
			</select>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md">
			<label for="institucion" class="col-md-4 control-label">Institucion:</label>
			<input type="text" name="institucion" class="form-control" id="institucion" placeholder="Nombre de la Empresa, Entidad o Institucion" disabled />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label for="encargado" class="col-md-4 control-label">Encargado:</label>
			<input type="text" name="encargado"  class="form-control" id="encargado" placeholder="Nombre del Encargado de dicha Entidad" disabled />
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label for="direccion" class="col-md-4 control-label">Direccion:</label>
			<input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion o Ubicacion de su infraestrutura" disabled />
		</div>
	</div>

	
	<div class="row form-group text-center">
		<div class="col-md">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
        </div>
	</div>
</div>

<?php echo form_close(); ?>