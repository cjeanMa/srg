<?php echo form_open('estudiante/edit/'.$estudiante['idEstudiante'],array("class"=>"form-horizontal")); ?>

<div class="container">
		<div class="row text-center">
			<div class="col-md"><h2><b>Actualizar Estudiante</b></h2></div>
		</div>
		<div class="row">
			<div class="col-md pull-right">
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a> 
			</div>
		</div>
		<hr>
		
	 	<div class="row justify-content-center form-group">
			<div class="col-md-6">
				<label for="dni">DNI:</label>
				<input id="dni" type="text" class="form-control" name = "dni" value="<?php echo $estudiante['idPersona'];?>" maxlength="8" readonly>
			</div>
		</div>
		<div class="row form-group">
				<div class="col-md">
					<label>APELLIDO PATERNO:</label>
					<input id="ap_paterno" type="text" class="form-control" name = "apellidoPaterno" value="<?php echo $estudiante['apellidoPaterno'];?>">
				</div>
				<div class="col-md">
					<label>APELLIDO MATERNO:</label>	
					<input id="ap_materno" type="text" class="form-control" name = "apellidoMaterno" value="<?php echo $estudiante['apellidoMaterno'];?>">
				</div>
				<div class="col-md">
					<label>	NOMBRES:</label>	
					<input id="nombres" type="text" class="form-control" name = "nombres" value="<?php echo $estudiante['nombres'];?>">
				</div>
		</div>

		<div class="row form-group">
				<div class="col-md">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" value="<?php echo $estudiante['direccion']?>">
				</div>
				<div class="col-md">
						<label>TELEFONO:</label>
						<input id="numCelular" maxlength="9" class="form-control" type="text" name="numCelular" value="<?php echo $estudiante['numCelular'];?>">
				</div>

				<div class="col-md">
					<label>EMAIL:</label>
						<input id="email" type="email" class="form-control" name ="email" value="<?php echo $estudiante["email"]; ?>">
				</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label>FECHA DE NACIMIENTO:</label>	
				<input id="fecha_nac" type="date" class="form-control" name = "fechaNacimiento" value="<?php echo $estudiante['fechaNacimiento'];?>">
			</div>
			<div class="col-md">
				<label>SEXO:</label>
					<?php $val_sexos; foreach($sexo as $sex){$val_sexos[$sex['idSexo']] = $sex['nombreSexo'];}
					 echo form_dropdown('sexo',$val_sexos,$estudiante['idSexo'],'id="sexo" class="form-control"');
					?>
			</div>
			<div class="col-md">
				<label>DISCAPACIDAD</label>
				<?php $val_dis; foreach($discapacidad as $dis){$val_dis[$dis['idDiscapacidad']] = $dis['nombreDiscapacidad'];};
				echo form_dropdown('discapacidad', $val_dis, $estudiante['idDiscapacidad'], 'id="discapacidad" class="form-control"');?>
			</div>
		</div>

		<div class="row text-center">
			<div class="col-md">
				<h3><u>DATOS DE CARRERA</u></h3>
			</div>	
		</div>
		<div class="row form-group">
			<div class="col-md">
				<label>	PERIODO DE INGRESO:</label>
				<?php $sa_array; foreach($semestreAcademico as $sa){$sa_array[$sa['idSemestreAcademico']] = $sa['anio']."-".$sa['periodo'];};?>
				<?php echo form_dropdown('p_ingreso',$sa_array,$estudiante['idSemestreAcademico'],"id='p_ingreso' class='form-control'");?>
			</div>
			<div class="col-md">
				<label class="col-md-4">	ESCUELA TECNICA:</label>
				<select name="escuela_tecnica" id="escuela_tecnica" class="form-control">
						<option value="<?php echo $estudiante['idEscuelaProfesional'];?>"><?php echo $estudiante['nombreEscuelaProfesional'];?></option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 text-center">
				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
			</div>
		</div>
</div>

<?php echo form_close(); ?>