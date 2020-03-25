<div class="container">
	<div class="row text-center">
			<div class="col-md"><h2><b>Nuevo Estudiante</b></h2></div>
	</div>
	<div class="row text-center">
			<div class="col-md">
			<h3><u>DATOS PERSONALES</u></h3>
			</div>	
	</div>
	<div class="row">
		<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
	</div>
	<div class="row" id="mensaje_dni">
		<!--div para mostrar error si es que no se encuentra dni-->
	</div>		
	<hr>
</div>
<?php echo form_open('estudiante/add',array("class"=>"form-horizontal", "id"=>"formulario_addEstudiante")); ?>


</button>
<div class="container">
			
	 	<div class="row justify-content-center form-group">
			<div class="col-md-5">
				<label for="dni">DNI:</label>
				<input id="dni" type="text" class="form-control" name = "dni" placeholder ="Documento de Identidad" maxlength="8" required>
			</div>
			<div class="col-md-1">
				<hr>
				<a type="" class="btn btn-info" id="btn_buscar" onclick="buscar_dni();" title="Buscar">
					<i class="fa fa-search">
					</i>
				</a>
			</div>
		</div>
		<!--Div para identificar los datos personales-->
	<div id="datos_personales">
		<div class="row form-group">
				<div class="col-md">
					<label>APELLIDO PATERNO:</label>
					<input id="ap_paterno" type="text" class="form-control" name = "apellidoPaterno" placeholder = "Apellido Paterno" required>
				</div>
				<div class="col-md">
					<label>APELLIDO MATERNO:</label>	
					<input id="ap_materno" type="text" class="form-control" name = "apellidoMaterno" placeholder = "Apellido Materno" required>
				</div>
				<div class="col-md">
					<label>	NOMBRES:</label>	
					<input id="nombres" type="text" class="form-control" name = "nombres" placeholder ="Nombres" required>
				</div>
		</div>

		<div class="row form-group">
				<div class="col-md">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" placeholder="Direccion" required>
				</div>
				<div class="col-md">
						<label>CELULAR:</label>
						<input id="numCelular" maxlength="9" class="form-control" type="text" name="numCelular" placeholder="Celular" required>
				</div>

				<div class="col-md">
					<label>EMAIL:</label>
						<input id="email" type="email" class="form-control" name ="email" placeholder ="Correo Electronico" required>
				</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label>FECHA DE NACIMIENTO:</label>	
				<input id="fecha_nac" type="date" class="form-control" name = "fechaNacimiento">
			</div>
			<div class="col-md">
				<label>SEXO:</label>
				<select name="sexo" id="sexo" class="form-control">
					<option value="null">--Seleccione--</option>
					<?php foreach($sexo as $sexos){?>
						<option value="<?php echo $sexos['idSexo'];?>"><?php echo $sexos['nombreSexo'];?></option>
					<?php }?>
				</select>
			</div>
			<div class="col-md">
				<label>DISCAPACIDAD</label>
				<select name="discapacidad" id="discapacidad" class="form-control">
					<option value="null">--Seleccione--</option>
					<?php foreach($discapacidad as $discapacidades){?>
					<option value="<?php echo $discapacidades['idDiscapacidad']; ?>"><?php echo $discapacidades['nombreDiscapacidad']?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<!--fin de div datos personales-->
		</div>

		<div class="row text-center">
			<div class="col-md">
				<h3><u>DATOS DE CARRERA</u></h3>
			</div>	
		</div>
		<div class="row form-group">
			<div class="col-md">
				<label>	PERIODO DE INGRESO:</label>
				<select name="p_ingreso" id="p_ingreso" class="form-control">
					<option value="">--Seleccione--</option>
					<?php foreach($semestreAcademico as $semestreAcademicos){?>
					<option value="<?php echo $semestreAcademicos['idSemestreAcademico']?>"><?php echo $semestreAcademicos['anio']."-".$semestreAcademicos['periodo'];?></option>
					<?php }?>		
				</select>
			</div>
			<div class="col-md">
				<label class="col-md-4">	ESCUELA TECNICA:</label>
				<select name="escuela_tecnica" id="escuela_tecnica" class="form-control">
						<option value=" ">--Seleccione--</option>		
						<?php foreach($escuelaProfesional as $escuelas){?>
						<option value="<?php echo $escuelas['idEscuelaProfesional'];?>"><?php echo $escuelas['nombreEscuelaProfesional']?></option>
						<?php }?>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 text-center">
				<button type="submit" class="btn btn-success" id="enviar_datos" name="submit"><i class="fa fa-check"></i> Aceptar</button>
			</div>
		</div>
</div>

<?php echo form_close(); ?>