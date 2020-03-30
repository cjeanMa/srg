
<div class="container">
	<div class="row">
		<div class="col-md text-center">
			<h3><b>Actualizar Practicas</b></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<hr>
</div>

<?php echo form_open('practica/edit/'.$practica['idPracticas'],array("class"=>"form-horizontal")); ?>
<div class="container">

		<div class="row form-group">
			<div class="col-md">		
				<label for="">Documento de Identidad:</label>	
				<h4><?php echo $practica['idPersona'];?></h4>
			</div>
			<div class="col-md">			
				<label for="">Apellidos y Nombres:</label>
				<?php $name = explode(" ",$practica['nombres']);?>
				<h4><?php echo ucfirst($practica['apellidoPaterno'])." ".ucfirst($practica['apellidoMaterno']).", ";foreach($name as $n){echo ucfirst($n)." ";}?></h4>
			</div>
		</div>

	<div class="row form-group">
		<div class="col-md">
			<label for="">Programa de Estudios:</label>
			<input type="text" name="idModulo" id="idModulo" value="<?php echo $practica['idModulo'];?>" hidden>
			<h4 ><?php echo $practica['nombreEscuelaProfesional'];?></h4>
		</div>
		<div class="col-md">
			<label for="">Modulo:</label>
			<input type="text" name="idEstudiante" id="idEstudiante" value="<?php echo $practica['idEstudiante'];?>" hidden>
			<input type="text" name="idModulo" id="idModulo" value="<?php echo $practica['idModulo'];?>" hidden>
			<h4 ><?php echo $practica['nombreModulo'];?></h4>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md">
			<label for="institucion" class="col-md-4 control-label">Institucion:</label>
			<input type="text" name="institucion" class="form-control" id="institucion" value="<?php echo $practica['institucion'];?>"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label for="encargado" class="col-md-4 control-label">Encargado:</label>
			<input type="text" name="encargado"  class="form-control" id="encargado" value="<?php echo $practica['encargado'];?>"/>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label for="direccion" class="col-md-4 control-label">Direccion:</label>
			<input type="text" name="direccion" class="form-control" id="direccion"  value="<?php echo $practica['direccion'];?>"/>
		</div>
	</div>

	
	<div class="row form-group text-center">
		<div class="col-md">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
        </div>
	</div>
</div>

<?php echo form_close(); ?>