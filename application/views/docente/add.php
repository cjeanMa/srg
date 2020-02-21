<?php echo form_open('docente/add',array("class"=>"form-horizontal")); ?>

<div class="container">
		
		<div class="row text-center">
			<div class="col-md">
			<h2><b>NUEVO DOCENTE</b></h2>
			<h4><u>DATOS PERSONALES</u></h4>
			</div>	
		</div>
			
			
	 	<div class="row justify-content-center form-group">
			<div class="col-md-6">
				<label for="dni">DNI:</label>
				<input id="dni" type="text" class="form-control" name = "dni" placeholder ="Documento de Identidad" maxlength="8">
			</div>
		
		</div>
		<div class="row form-group">
				<div class="col-md">
					<label>APELLIDO PATERNO:</label>
					<input id="ap_paterno" type="text" class="form-control" name = "apellido_paterno" placeholder = "Apellido Paterno" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
				<div class="col-md">
					<label>APELLIDO MATERNO:</label>	
					<input id="ap_materno" type="text" class="form-control" name = "apellido_materno" placeholder = "Apellido Materno" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
				<div class="col-md">
					<label>	NOMBRES:</label>	
					<input id="nombres" type="text" class="form-control" name = "nombres" placeholder ="Nombres" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
		</div>

		<div class="row form-group">
				<div class="col-md">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" placeholder="Direccion" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
				<div class="col-md">
						<label>TELEFONO:</label>
						<input id="telefono" maxlength="9" class="form-control" type="text" name="telefono" placeholder="Telefono" >
				</div>

				<div class="col-md">
					<label>EMAIL:</label>
						<input id="email" type="text" class="form-control" name ="email" placeholder ="Correo Electronico" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label>FECHA DE NACIMIENTO:</label>	
				<input id="fecha_nac" type="date" class="form-control" name = "fecha_nac">
			</div>
			<div class="col-md">
				<label>SEXO:</label>
				<select name="sexo" id="sexo" class="form-control">
					<option value="null">--Seleccione--</option>
				</select>
			</div>
			<div class="col-md">
				<label>DISCAPACIDAD</label>
				<select name="discapacidad" id="discapacidad" class="form-control">
					<option value="null">--Seleccione--</option>
				</select>
			</div>
		</div>

		<div class="row text-center">
			<div class="col-md">
				<h4><u>DATOS DE CARRERA</u></h4>
			</div>	
		</div>
		<div class="row form-group">
			<div class="col-md">
				<label class="col-md-4">	ESCUELA TECNICA:</label>
				<select name="escuela_tecnica" id="e_tecnica" class="form-control">
						<option value=" ">--Seleccione--</option>		
				</select>
			</div>
		</div>

	
	<div class="row justify-content-center text-center">
		<div class="col-md-6">
			<button type="submit" class="btn btn-success">Aceptar</button>
        </div>
	</div>

<?php echo form_close(); ?>