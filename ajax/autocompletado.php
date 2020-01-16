<?php 
	require('../config/conexion.php');
	$con = new conexion();
	$dni = $_POST['dni'];

	$query = "SELECT * FROM persona WHERE idpersona = $dni";
	$lista = mysqli_fetch_row(mysqli_query($con->conectar(), $query));

 ?>
 <div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	APELLIDO PATERNO:</label>
				<div class="col-md-6">
				<input id="ap_paterno" type="text" class="form-control" placeholder = "<?php echo $lista[1]; ?>" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	APELLIDO MATERNO:</label>	
				<div class="col-md-6">
				<input id="ap_materno" type="text" class="form-control" placeholder = "<?php echo $lista['2']; ?>" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	NOMBRES:</label>	
				<div class="col-md-6">
				<input id="nombres" type="text" class="form-control" placeholder ="<?php echo $lista['3'] ?>" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	FECHA DE NACIMIENTO:</label>	
				<div class="col-md-4">
				<input id="fecha_nac" type="text" class="form-control" placeholder="<?php echo $lista['4'] ?>" disabled>
				</div>
			</div>
			
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	SEXO:</label>	
				<div class="col-md-6">
				<input id="sexo" type="text" class="form-control" placeholder="<?php
					if ($lista['5'] == 'M') {
						echo "MASCULINO";}
					else{echo "FEMENINO";}
				?>" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	DIRECCION:</label>
				<div class="col-md-6">
					<input id="direccion" type="text" class="form-control" placeholder="<?php echo $lista['6'] ?>" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	EMAIL:</label>
				<div class = "col-md-6">
					<input id="email" type="email" class="form-control" placeholder ="<?php echo $lista['7'] ?>" disabled>
				</div>
			</div>
			
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	TELEFONO:</label>
				<div class="col-md-6">
					<input id="telefono" class="form-control" type="text" placeholder="<?php echo $lista['8'] ?>" disabled>
				</div>
			</div>