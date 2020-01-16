<?php  
	session_start();
	if ($_SESSION['permiso'] == "1") {
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>
	
	<title>. : : INGRESO ESTUDIANTES : : .</title>
	<meta charset="UTF-8">
	
</head>
<body>

	<?php include('componentes/navbar.php') ?>

	<div class="text-center">
	<h1>INGRESO DE USUARIOS</h1>
	</div>
	<?php 
	if(!isset($_POST['enviar'])){
	 ?>
	
	 <br>
	 <div class="container">
		<form name = "form_estudiantes" action="ing_usuario.php" method="POST" class="form">
			<div class="form-group">
				<div class="row col-md-10 col-md-offset-1">
					<div class="col-md-4">
					<label>	DNI:</label>	
					<input id="dni" type="text" class="form-control" name = "dni" placeholder ="DNI" maxlength="8" required>
					</div>
					<div class="col-md-4">
					<label>	USUARIO:</label>	
					<input id="usuario" type="text" class="form-control" name = "usuario" placeholder ="Nombre de Usuario" required>
					</div>
					<div class="col-md-4">
					<label>	CONTRASEÑA:</label>	
					<input id="contraseña" type="password" class="form-control" name = "contraseña" placeholder ="Contraseña" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row col-md-10 col-md-offset-1">
						<div class="col-md-4">
						<label>	APELLIDO PATERNO:</label>
						<input id="ap_paterno" type="text" class="form-control" name = "apellido_paterno" placeholder = "Apellido Paterno" onKeyUp="this.value=this.value.toUpperCase();" required>
						</div>
					
						<div class="col-md-4">
						<label>	APELLIDO MATERNO:</label>	
						<input id="ap_materno" type="text" class="form-control" name = "apellido_materno" placeholder = "Apellido Materno" onKeyUp="this.value=this.value.toUpperCase();" required>
						</div>
						<div class="col-md-4">
						<label>	NOMBRES:</label>	
						<input id="nombres" type="text" class="form-control" name = "nombres" placeholder ="Nombres" onKeyUp="this.value=this.value.toUpperCase();" required>
						</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row col-md-10 col-md-offset-1">
					<div class="col-md-6">
						<label>	EMAIL:</label>
						<input id="email" type="email" class="form-control" name ="email" placeholder ="Correo Electronico" onKeyUp="this.value=this.value.toUpperCase();" default=" ">
					</div>
					<div class="col-md-6">
						<label>	TELEFONO:</label>
						<input id="telefono" maxlength="9" class="form-control" type="text" name="telefono" placeholder="Telefono" default=" ">
					</div>
				</div>
			</div>

			<div class="form-group col-md-4 col-md-offset-4">
				<br>
					<label class="col-md-3">PERMISO:</label>
					<div class="col-md-9">
						<select name="permiso" id="permiso" class="form-control">
							<option value=" ">--Seleccione--</option>
							<option value="1">ADMINISTRADOR</option>
							<option value="2">USUARIO</option>
						</select>
					</div>
			</div>

			<div class="col-md-8 col-md-offset-4">
				</br>
				<div class="col-md-2">
				<input type="Submit" id = "btn_datos" name="enviar" class = "btn btn-primary" value = "Aceptar">
				</div>
				<div class="col-md-2">
				<a href="index.php" class="btn btn-warning">Cancelar</a>
				</div>
			</div>
			<?php 
				}
				else{
					require 'clases/usuario.class.php';
					$a = new usuario();
					$a->asignar($_POST['dni'], $_POST['apellido_paterno'], $_POST['apellido_materno'], $_POST['nombres'], $_POST['email'], $_POST['telefono'], $_POST['usuario'], $_POST['contraseña'], $_POST['permiso']);
					$a->ins_persona();
					$a->ins_usuario();
					if ($a->evaluar_usuario($_POST['dni'])==TRUE) {
						echo "<script>alertify.success('USUARIO INGRESADO CORRECTAMENTE');</script>";
					}
					else{
						echo "<script>alertify.error('NO SE PUDO INGRESAR A NUEVO USUARIO');</script>";
					}
						
				?>
				<div class="row">
					<div class="container text-center">
						<a href="ing_usuario.php" class="btn btn-primary">Regresar</a>
					</div>
				</div>

				<?php 
				}
			?>			
		</form>
	</div>
	<?php include('componentes/footer.php') ?>
</body>
</html>

<?php 

	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
 ?>