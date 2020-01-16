<?php  
	session_start();
	if (isset($_SESSION['idusuario'])) {
	require("clases/estudiante.class.php");

	$x=new conexion();
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

	<script>
		function validar_datos(){
			var verificar = true;
			if(!document.form_estudiantes.dni.value || document.form_estudiantes.dni.value.length!=8){
				alertify.error("NO INGRESO DNI O EL INGRESO DEL DNI ES INCORRECTO");				
				document.form_estudiantes.dni.focus();
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
	<h1><u>MATRICULA A NUEVA CARRERA</u></h1>
	</div>
	<div class="container">
		<div class="caja">
	<?php 
	if(!isset($_POST['enviar'])){
	 ?>
	 <br>
	 	<div class="row">
		<form name = "form_estudiantes" action="ing_nuevacarrera.php" method="POST" class="form">

			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	DNI:</label>	
				<div class="col-md-6">
				<input id="dni" type="text" class="form-control" name = "dni" placeholder ="INGRESE DOCUMENTO DE IDENTIDAD" maxlength="8">
				</div>
			</div>
			<div id="datos">
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	APELLIDO PATERNO:</label>
				<div class="col-md-6">
				<input id="ap_paterno" type="text" class="form-control" placeholder = "Apellido Paterno" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	APELLIDO MATERNO:</label>	
				<div class="col-md-6">
				<input id="ap_materno" type="text" class="form-control" placeholder = "Apellido Materno" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	NOMBRES:</label>	
				<div class="col-md-6">
				<input id="nombres" type="text" class="form-control" placeholder ="Nombres" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	FECHA DE NACIMIENTO:</label>	
				<div class="col-md-4">
				<input id="fecha_nac" type="date" class="form-control" disabled>
				</div>
			</div>
			
			<div class="form-group col-md-9 col-md-offset-2">
			<label class="col-md-3">	SEXO:</label>	
				<div class="col-md-6">
				<input id="sexo" type="text" class="form-control" placeholder="sexo" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	DIRECCION:</label>
				<div class="col-md-6">
					<input id="direccion" type="text" class="form-control" placeholder="Direccion" disabled>
				</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	EMAIL:</label>
				<div class = "col-md-6">
					<input id="email" type="email" class="form-control" placeholder ="Correo Electronico" disabled>
				</div>
			</div>
			
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	TELEFONO:</label>
				<div class="col-md-6">
					<input id="telefono" class="form-control" type="text" placeholder="Telefono" disabled>
				</div>
			</div>
			</div>
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	PERIODO DE INGRESO:</label>
					<div class="col-md-4">
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
								$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO";
							$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
							while($lista_semestre = mysqli_fetch_row($aux_semestre)){
								echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
							}
							}
							?>
						</select>
					</div>
			</div>
			
			<div class="form-group col-md-9 col-md-offset-2">
				<label class="col-md-3">	ESCUELA TECNICA:</label>
				<div class="col-md-4">
					<select name="escuela_tecnica" id="e_tecnica" class="form-control">
						<option value=" ">--Seleccione--</option>
						<?php 
						if ($_SESSION['permiso']!=1) {
							$query_esc = "SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional WHERE disponibilidad = 1";
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

			<div class="col-md-8 col-md-offset-4">
				</br>
				<div class="col-md-2">
				<input type="Submit" id = "btn_datos" name="enviar" class = "btn btn-primary" value = "Aceptar">
				</div>
				<div class="col-md-2">
				<a href="index.php" class="btn btn-warning">Cancelar</a>
				</div>
			</div>
	</div><!--clase caja-->
	
			<?php 
				}
				else{
					$est = new estudiante();
					$est->ing_ncarrera($_POST['p_ingreso'],$_POST['escuela_tecnica'],$_POST['dni']);
							if($est->evaluar_estudiante($_POST['dni']) == 1){
								echo "<div class='alert alert-success' role='alert'>Ingreso de nuevo registro satisfactorio</div>";
								$est->most_estudiante($_POST['dni']);
							}
							else{
								echo "<div class='alert alert-danger' role='alert'>No se ingresó nuevo registro</div>";
							
					}
				?>
				<div class="row">
					<div class="container text-center">
						<a href="ing_nuevacarrera" class="btn btn-primary">Regresar</a>
					</div>
				</div>

				<?php 
				}
			?>			
		</form>
		</div>
	</div>
	<?php include('componentes/footer.php') ?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#dni').change(function(){
			dni = $('#dni').val();
			$.post('ajax/autocompletado.php',{dni : dni}).done(function(respuesta){
				$('#datos').html(respuesta);
			})
		})
	})
	$(document).ready(function(){
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