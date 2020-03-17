<?php echo form_open('usuario/edit/'.$usuario['idUsuario'],array("class"=>"form-horizontal")); ?>
<div class="container">
	<div class="row text-center">
			<div class="col-md"><h2><b>Editar Usuario</b></h2></div>
		</div>
		<div class="row text-center">
			<div class="col-md">
			<h3><u>DATOS PERSONALES</u></h3>
			</div>	
		</div>

	<div class="row">
		<div class="col-md">
			<a href="<?php echo site_url('usuario'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Atras</a>
		</div>
	</div>
</div>
<hr>

	<div class="row justify-content-center form-group">
			<div class="col-md-6">
				<label for="dni">DNI:</label>
				<input id="dni" type="text" class="form-control" name="dni" placeholder ="Documento de Identidad" maxlength="8" value="<?php echo ($this->input->post('idPersona') ? $this->input->post('idPersona') : $persona['idPersona']); ?>">
			</div>
		</div>
<div class="row form-group">
				<div class="col-md">
					<label>APELLIDO PATERNO:</label>
					<input id="ap_paterno" type="text" class="form-control" name="apellido_paterno" placeholder = "Apellido Paterno" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo ($this->input->post('apellidoPaterno') ? $this->input->post('apellidoPaterno') : $persona['apellidoPaterno']); ?>">
				</div>
				<div class="col-md">
					<label>APELLIDO MATERNO:</label>	
					<input id="ap_materno" type="text" class="form-control" name="apellido_materno" placeholder = "Apellido Materno" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo ($this->input->post('apellidoMaterno') ? $this->input->post('apellidoMaterno') : $persona['apellidoMaterno']); ?>">
				</div>
				<div class="col-md">
					<label>	NOMBRES:</label>	
					<input id="nombres" type="text" class="form-control" name="nombres" placeholder ="Nombres" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo ($this->input->post('nombres') ? $this->input->post('nombres') : $persona['nombres']); ?>">
				</div>
		</div>

		<div class="row form-group">
				<div class="col-md">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" placeholder="Direccion" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $persona['direccion']); ?>">
				</div>
				<div class="col-md">
						<label>TELEFONO:</label>
						<input id="telefono" maxlength="9" class="form-control" type="text" name="telefono" placeholder="Telefono" value="<?php echo ($this->input->post('numCelular') ? $this->input->post('numCelular') : $persona['numCelular']); ?>">
				</div>

				<div class="col-md">
					<label>EMAIL:</label>
						<input id="email" type="text" class="form-control" name="email" placeholder ="Correo Electronico" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $persona['email']); ?>">
				</div>
		</div>

		<div class="row form-group">
			<div class="col-md">
				<label>FECHA DE NACIMIENTO:</label>	
				<input id="fecha_nac" type="date" class="form-control" name="fecha_nac" value="<?php echo ($this->input->post('fechaNacimiento') ? $this->input->post('fechaNacimiento') : $persona['fechaNacimiento']); ?>">
			</div>
			
			<div class="col-md">
				<label>SEXO:</label>
				<select name="idSexo" class="form-control">
					<?php
					// echo $persona["idSexo"];
					echo (empty($all_Sexo)?'<option value="">Sin datos, agrege datos en tabla Sexo</option>':'<option>--Seleccione--</option>');
					foreach($all_Sexo as $sexo)
					{						
							$selected = ($sexo['idSexo']==$persona['idSexo']) ? ' selected="selected"' : "";
							echo '<option value="'.$sexo['idSexo'].'" '.$selected.'>'.$sexo['nombreSexo'].'</option>';						
					} 
					?>
				</select>
			</div>
			<div class="col-md">
				<label>DISCAPACIDAD</label>
				<select name="idDiscapacidad" class="form-control">
					<?php
					echo (empty($all_Discapacidad)?'<option value="">Sin datos, agrege datos en tabla Discapacidad</option>':'<option value="">--Seleccione--</option>');
					foreach($all_Discapacidad as $discapacidad)
					{
						$selected = ($discapacidad['idDiscapacidad'] == $persona['idDiscapacidad']) ? ' selected="selected"' : "";
						echo '<option value="'.$discapacidad['idDiscapacidad'].'" '.$selected.'>'.$discapacidad['nombreDiscapacidad'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>


	<!-- <div class="row form-group">
			<div class="col-md-12">
			<label for="idPersona" class="control-label">Persona</label>
				<select name="idPersona" class="form-control">
				<?php
				echo (empty($all_persona)?'<option value="">Sin datos, agrege datos en tabla Persona</option>':'<option value="">Seleccione Sexo</option>');
				foreach($all_persona as $persona)
				{
					$selected = ($persona['idPersona'] == $this->input->post('idPersona')) ? ' selected="selected"' : "";

					echo '<option value="'.$persona['idPersona'].'" '.$selected.'>'.$persona['nombrePersona'].'</option>';
				} 
				?>
			</select>
			</div>
		</div> -->

	<div class="row form-group">
		<div class="col-md-3">
		<label for="usuario" class="control-label">Usuario</label>
			<input type="text" name="usuario" placeholder="Usuario" class="form-control" id="usuario" value="<?php echo ($this->input->post('usuario') ? $this->input->post('usuario') : $usuario['usuario']); ?>"/>
		</div>

		<div class="col-md-3">
 			<label for="contrase" class=" control-label">Constraseña</label>
			<input type="text" name="contrase" placeholder="Constraseña" class="form-control" id="contrase"  value="<?php echo ($this->input->post('contraseña') ? $this->input->post('contraseña') : $usuario['contraseña']); ?>"/>
		</div>


		<div class="col-md-3">
		<label for="idPermiso" class="control-label">Permiso</label>>
			<select name="idPermiso" class="form-control">
				<?php
				echo (empty($all_Permiso)?'<option value="">Sin datos, agrege datos en tabla Permiso</option>':'<option value="">--Seleccione--</option>');
				foreach($all_Permiso as $permiso)
				{
					$selected = ($permiso['idPermiso'] == $usuario['idPermiso']) ? ' selected="selected"' : "";

					echo '<option value="'.$permiso['idPermiso'].'" '.$selected.'>'.$permiso['nombrePermiso'].'</option>';
				} 
				?>
			</select>
		</div>

		<div class="col-md-3">
			<!-- <?php var_dump($all_Habilitacion); ?> -->
		<label for="idHabilitacion" class="control-label">Estado de Habilitación</label>>
			<select name="idHabilitacion" class="form-control">
				<?php
				echo (empty($all_Habilitacion)?'<option value="">Sin datos, agrege datos en tabla Habilitación</option>':'<option value="">--Seleccione--</option>');
				foreach($all_Habilitacion as $habilitacion)
				{
					$selected = ($habilitacion['idHabilitacion'] == $usuario['idHabilitacion']) ? ' selected="selected"' : "";

					echo '<option value="'.$habilitacion['idHabilitacion'].'" '.$selected.'>'.$habilitacion['nombreHabilitacion'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="text-center">
			<button type="submit" class="btn btn-success">Guardar</span>
        </div>
	</div>
<?php echo form_close(); ?>