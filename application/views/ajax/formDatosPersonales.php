
		<?php if(!isset($datos_persona)){?>
			<div class="row">
				<div class="col-md alert alert-warning">
					No se encontraron datos de dicho Documento de Identidad
				</div>
			</div>
		<?php }?>

		<div class="row form-group">
				<div class="col-md">
					<label>APELLIDO PATERNO:</label>
					<input id="ap_paterno" type="text" class="form-control" name = "apellidoPaterno" value="<?php echo isset($datos_persona)?$datos_persona['apellidoPaterno']:"";?>" placeholder="Apellido Paterno" required>
				</div>
				<div class="col-md">
					<label>APELLIDO MATERNO:</label>	
					<input id="ap_materno" type="text" class="form-control" name = "apellidoMaterno" value="<?php echo isset($datos_persona)?$datos_persona['apellidoMaterno']:"";?>" placeholder="Apellido Materno" required>
				</div>
				<div class="col-md">
					<label>	NOMBRES:</label>	
					<input id="nombres" type="text" class="form-control" name = "nombres" value="<?php echo isset($datos_persona)?$datos_persona['nombres']:"";?>" placeholder="Nombre completo" required>
				</div>
		</div>

		<div class="row form-group">
				<div class="col-md">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" value="<?php echo isset($datos_persona)?$datos_persona['direccion']:"";?>" placeholder="Ejm. Jr.Piura 232"required>
				</div>
				<div class="col-md">
						<label>CELULAR:</label>
						<input id="numCelular" maxlength="9" class="form-control" type="text" name="numCelular" value="<?php echo isset($datos_persona)?$datos_persona['numCelular']:"";?>" placeholder="Ejm. 991231231, 945123123" required>
				</div>

				<div class="col-md">
					<label>EMAIL:</label>
						<input id="email" type="email" class="form-control" name ="email" value="<?php echo isset($datos_persona)?$datos_persona['email']:"";?>" placeholder="Ejm. JoseCarlos@gmail.com" required>
				</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label>FECHA DE NACIMIENTO:</label>	
				<input id="fecha_nac" type="date" class="form-control" name = "fechaNacimiento" value="<?php echo isset($datos_persona)?$datos_persona['fechaNacimiento']:"";?>">
			</div>
			<div class="col-md">
				<label>SEXO:</label>
                <?php if(isset($datos_persona)){
                    $array_sexo; foreach($sexo as $sexos){$array_sexo[$sexos['idSexo']]=$sexos['nombreSexo'];}
                     echo form_dropdown('sexo',$array_sexo,$datos_persona['idSexo'],'id="sexo" class="form-control"');  
                    } else{?>

                <select name="sexo" id="sexo" class="form-control">
					<option value="null">--Seleccione--</option>
					<?php foreach($sexo as $sexos){?>
						<option value="<?php echo $sexos['idSexo'];?>"><?php echo $sexos['nombreSexo'];?></option>
					<?php }}?>
				</select>
			</div>
			<div class="col-md">
                <label>DISCAPACIDAD</label>
                <?php if(isset($datos_persona)){
                    $array_discapacidad; foreach($discapacidad as $dis){$array_discapacidad[$dis['idDiscapacidad']]=$dis['nombreDiscapacidad'];}
                    echo form_dropdown('discapacidad', $array_discapacidad, $datos_persona['idDiscapacidad'],'id="discapacidad" class="form-control"');
                    } else{?>
				<select name="discapacidad" id="discapacidad" class="form-control">
					<option value="null">--Seleccione--</option>
					<?php foreach($discapacidad as $discapacidades){?>
					<option value="<?php echo $discapacidades['idDiscapacidad']; ?>"><?php echo $discapacidades['nombreDiscapacidad']?></option>
					<?php }}?>
				</select>
			</div>