<?php  
	session_start();
	if (isset($_SESSION['idusuario'])) {
	require("clases/estudiante.class.php");
	$x = new conexion();
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
	<script src = "js/funciones.js"></script>
	
	<title>. : : INGRESO ESTUDIANTES : : .</title>
	<meta charset="UTF-8">

	<script>
		function validar_datos(){
			var verificar = true;
			if(!document.form_estudiantes.dni.value || document.form_estudiantes.dni.value.length!=8){
				alertify.error("NO INGRESO DNI O EL INGRESO DEL DNI ES INCORRECTO");				
				document.form_estudiantes.dni.focus();
				verificar=false;
			}
			else if(!document.form_estudiantes.apellido_paterno.value){
				alertify.error("CAMPO APELLIDO PATERNO REQUERIDO");				
				document.form_estudiantes.apellido_paterno.focus();
				verificar=false;
			}
			else if(!document.form_estudiantes.apellido_materno.value){
				alertify.error("CAMPO APELLIDO MATERNO REQUERIDO");				
				document.form_estudiantes.apellido_materno.focus();
				verificar=false;
			}
			else if(!document.form_estudiantes.nombres.value){
				alertify.error("CAMPO NOMBRES REQUERIDO");				
				document.form_estudiantes.nombres.focus();
				verificar=false;
			}

			return verificar;
		}
		window.onload = function(){
			document.getElementById("btn_datos").onclick = validar_datos;
		}
	</script>
</head>
<body>

	<?php include('componentes/navbar.php') ?>
	<div class="text-center">
	<h1><u>INGRESO DE ESTUDIANTE</u></h1>
	</div>
	<?php 
	if(!isset($_POST['enviar'])){
	 ?>
	
	 <br>
	 <div class="container">
	 	<div class="caja">
	 		<div class="row">
		<form name = "form_estudiantes" action="ing_estudiantes.php" method="POST" class="form">
			<div class="form-group">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-warning">
						<u>No dejar espacios en blanco, rellene los campos en blanco con un guion '-'</u>
					</div>
			<h3><u>DATOS PERSONALES</u></h3>
				<label class="col-md-1">DNI:</label>	
				<div class="col-md-5">
				<input id="dni" type="text" class="form-control" name = "dni" placeholder ="Documento de Identidad" maxlength="8">
				</div>
					<label class="col-md-2">FECHA DE NACIMIENTO:</label>	
					<div class="col-md-4">
					<input id="fecha_nac" type="date" class="form-control" name = "fecha_nac">
					</div>
			</div>
			</div>
		<div class="form-group">
			<div class="col-md-10 col-md-offset-1">
			<div class="col-md-4">
				<label>APELLIDO PATERNO:</label>
				<input id="ap_paterno" type="text" class="form-control" name = "apellido_paterno" placeholder = "Apellido Paterno" onKeyUp="this.value=this.value.toUpperCase();">

			</div>
			<div class="col-md-4">
				<label>APELLIDO MATERNO:</label>	
				<input id="ap_materno" type="text" class="form-control" name = "apellido_materno" placeholder = "Apellido Materno" onKeyUp="this.value=this.value.toUpperCase();">
			</div>
			<div class="col-md-4">
				<label>	NOMBRES:</label>	
				<input id="nombres" type="text" class="form-control" name = "nombres" placeholder ="Nombres" onKeyUp="this.value=this.value.toUpperCase();">
			</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-md-2">
					<label>SEXO:</label><br>
					<input id="Sexo_M" type="radio" value ="M" name ="sex" checked> Masculino</br>
					<input id="Sexo_F" type="radio" value ="F" name ="sex"> Femenino
				</div>
				<div class="col-md-10">
					<label>	DIRECCION:</label>
					<input id="direccion" type="text" class="form-control" name="direccion" placeholder="Direccion" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10 col-md-offset-1">
				
				<div class="col-md-2">
					<label>DISCAPACIDAD</label><br>
					<input id="dis_si" type="radio" value ="SI" name ="dis"> Si</br>
					<input id="dis_no" type="radio" value ="NO" name ="dis" checked> No
				</div>
				<div class="col-md-2">
					<label>CONADIS</label><br>
					<input id="conadis_si" type="radio" value ="SI" name ="conadis"> Si</br>
					<input id="conadis_no" type="radio" value ="NO" name ="conadis" checked> No
				</div>

				<div class="col-md-4">
						<label>TELEFONO:</label>
						<input id="telefono" maxlength="9" class="form-control" type="text" name="telefono" placeholder="Telefono" >
				</div>

				<div class="col-md-4">
					<label>EMAIL:</label>
						<input id="email" type="text" class="form-control" name ="email" placeholder ="Correo Electronico" onKeyUp="this.value=this.value.toUpperCase();">
				</div>
			</div>
		</div>
		<div class="form-group">
		<div class="col-md-10 col-md-offset-1">
			<h3><u>DATOS DE CARRERA</u></h3>
			<div class="col-md-6">
				<label class="col-md-4">	PERIODO DE INGRESO:</label>
					<div class="col-md-8">
						<select name="p_ingreso" id="p_ingreso" class="form-control">
							<option value="">--Seleccione--</option>
							<?php 
							if ($_SESSION['permiso']!='1') {
								$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO ORDER BY idsemestreacademico desc LIMIT 0,2";
								$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
								while($lista_semestre = mysqli_fetch_row($aux_semestre)){
									echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
							}
							}
							else{
								$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO ORDER BY idsemestreacademico desc";
								$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
								while($lista_semestre = mysqli_fetch_row($aux_semestre)){
								echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
							}
							}
							
							?>
						</select>
					</div>
			</div>
			
			<div class="col-md-6">
				<label class="col-md-4">	ESCUELA TECNICA:</label>
				<div class="col-md-8">
					<select name="escuela_tecnica" id="e_tecnica" class="form-control">
						<option value=" ">--Seleccione--</option>
						<?php 
						if ($_SESSION['permiso']!='1') {
							$query_esc = "SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional WHERE disponibilidad = '1'";
						 	$aux_esc = mysqli_query($x->conectar(), $query_esc);
						 	while ($lista_esc = mysqli_fetch_row($aux_esc)) {
						 		if ($lista_esc[0] != 0) {
					 			echo "<option value='".$lista_esc[0]."'>".$lista_esc[1]."</option>";
					 		}
					 	}
						}
						else{
							$query_esc = "SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional";
					 	$aux_esc = mysqli_query($x->conectar(), $query_esc);
					 	while ($lista_esc = mysqli_fetch_row($aux_esc)) {
					 		if ($lista_esc[0] != 0) {
					 			echo "<option value='".$lista_esc[0]."'>".$lista_esc[1]."</option>";
					 		}
					 	}
						}
						
					 ?>
					</select>
				</div>
			</div>
			</div>
		</div>
			<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="col-md-6">
					<input type="Submit" id = "btn_datos" name="enviar" class = "btn btn-primary" value = "Aceptar">
					</div>
					<div class="col-md-6">
					<a href="index.php" class="btn btn-warning">Cancelar</a>
					</div>
				</div>
			</div>
			</div>
		
	 	</div><!--fin de clase caja-->
	 		
			<?php 
				}
				else{
					$f_nacimiento = $_POST['fecha_nac'];
					$est = new estudiante();
					$est->asignar($_POST['dni'], $_POST['apellido_paterno'],$_POST['apellido_materno'],$_POST['nombres'],$f_nacimiento,$_POST['sex'],$_POST['direccion'],$_POST['email'],$_POST['telefono'],$_POST['p_ingreso'],$_POST['escuela_tecnica'], $_POST['dis'], $_POST['conadis']);

					if ($est->evaluar_persona($_POST['dni'])==1) {
						echo "<div class='alert alert-warning' role='alert'>Dicha persona ya fue registrada anteriormente</div>";
					}

					else{
						if ($est->cantidad_estudiante($_POST['dni'])==1) {
						echo "<div class='alert alert-warning' role='alert'>Dicha persona ya está registrada en una carrera profesional
						INGRESE A LA PESTAÑA NUEVO ESTUDIANTE</div>";
						}
						else{
							$est->ins_persona();
							$est->ins_estudiante();
							if($est->evaluar_estudiante($_POST['dni']) == 1){
								echo "<div class='alert alert-success' role='alert'>Ingreso de nuevo registro satisfactorio</div>";
							}
							else{
								echo "<div class='alert alert-danger' role='alert'>No se ingresó nuevo registro</div>";
							}
							$est->most_estudiante($_POST['dni']);
						}
					}
				?>
				<div class="row">
					<div class="container text-center">
						<a href="ing_estudiantes.php" class="btn btn-primary">Regresar</a>
					</div>
				</div>

				<?php 
				}
			?>			
		</form>
		</div>
	</div>
</body>
<footer id="footer"></footer>
</html>
<script>
	$(document).ready(function(){
    	$('#footer').load('componentes/footer.php');
    	//boton matricular
		$('#btn_matricular').click(function(){
			var dni = $('#tabla_dni').val();
			//alert("matricula_semestre?dni='"+dni+"'");
			window.open("matricula_semestre?dni="+dni);
		})
	})
</script>

<?php 

	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
 ?>