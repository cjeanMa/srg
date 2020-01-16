<!DOCTYPE html>
<?php require('config/conexion.php') ?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>
  <script src = "js/funciones.js"></script>

	<meta charset="UTF-8">
	<title>. : : Matricula : : .</title>
</head>
<body>
<!--RECURSO NAVBAR-->
<?php 
	include('componentes/navbar.php');
	$x = new conexion();
	
	$dni = $_POST['dni'];
	$dni="SELECT idEstudiante FROM Estudiante WHERE persona_idPersona = '$dni'";
	$value = mysqli_query($x->conectar(), $dni);
	while($val=mysqli_fetch_row($x->conectar(), $value)){
		echo "<input hidden id='idestudiante' value='$val[0]'></input>";
	};

?>
<div class="container">
	<div class="row text-center">
		<div class="col-md-12">
		<h1>MATRICULA  DE ESTUDIANTES</h1>
		<br>
		</div>
	</div>
</div>
<div class="container">
	<div class="row ">
		<div class="form-group col-md-12">
			<div class="col-md-4">
				<label>Semestre</label><br>
				<select name="f_semestre" id="f_semestre" class="form-control">
					<option value="0">--Seleccione--</option>
					<option value="<?php echo date("Y")."-I" ?>"><?php echo date("Y")."-I" ?></option>
					<option value="<?php echo date("Y")."-II" ?>"><?php echo date("Y")."-II" ?></option>
				</select>
			</div>
		<div class="col-md-4">
			<label>Escuela Profesional</label>
			<br>
			<select name="esc_profesional" id="esc_pro" class="form-control">
				<option value="null">--Seleccione--</option>
				<?php
					$query ="SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional WHERE disponibilidad='1' ORDER BY nombre";
					$aux = mysqli_query($x->conectar(), $query);
					while ($lista = mysqli_fetch_row($aux)) {
				 ?>
				<option value="<?php echo $lista[0]; ?>"><?php echo $lista[1]; ?></option>
				  <?php }?>
			</select>
		</div>
		<div class="col-md-4">
			<label>Modulo</label>
			<br>
			<select name="modulo" id="modulo" class="form-control"></select>
		</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="form-group col-md-offset-1">
			<div class="col-md-8">
				<label>Unidad Didactica</label>
				</br>
				<select name="uni_didactica" id="uni_didactica" class="form-control"></select>
			</div>
			<div class="col-md-2">
				<br>
				<button id = "btn_agregar_matricula" class="form-control btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>

<!--tabla de matriculas-->
<div  id="tabla_matricula" class="container">
</div>

<script type="text/javascript">
/* funcion para listas dependientes*/
	$(document).ready(function(){
		$('#esc_pro').change(function(){
			var v_ep = $(this).val();
			$.post('ajax/modulo.php', {esc_pro: v_ep}).done(function(respuesta){			
				$('#modulo').html(respuesta);
			});
			
		});
		$('#modulo').change(function(){
			var u_didactica = $(this).val();
			$.post('ajax/unidaddidactica.php', {uni_didactica: u_didactica}).done(function(respuesta){			
				$('#uni_didactica').html(respuesta);
			});
		});
	})
</script>

<script type="text/javascript">
	//para cargar la tabla de cursos matriculados
	//$('#tabla_matricula').load('ajax/tabla_matriculas.php');
	$(document).ready(function(){
		$('#f_semestre').change(function(){
		var s_academico = $('#f_semestre').val();
		var idestudiante = $('#idestudiante').val();

		$.post('ajax/tabla_matriculas.php', {s_academico: s_academico, idestudiante: idestudiante}).done(function(respuesta){
		$('#tabla_matricula').html(respuesta);
		});
		})
		
	});
	
</script>

<script type="text/javascript">
	/*funcion para agregar matriculas*/
	$(document).ready(function(){

		$('#btn_agregar_matricula').click(function(){
					
			var s_academico = $('#f_semestre').val();
			var idunidad = $('#uni_didactica').val();
			var idestudiante = $('#idestudiante' ).val();

			ing_matricula(s_academico, idunidad, idestudiante);
			
				
			});
			
		});
</script>

<script type="text/javascript">
		

</script>
</body>