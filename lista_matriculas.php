<?php 
	session_start();
	if (isset($_SESSION['idusuario'])) {
	?>
<!DOCTYPE html>
<?php require('config/conexion.php') ?>
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

	<meta charset="utf-8">
	<title>. : : Matricula : : .</title>
</head>
<body>
<!--RECURSO NAVBAR-->
<?php 
	include('componentes/navbar.php');
	$x = new conexion();
?>
<div class="container">
	<div class="row text-center">
		<div class="col-md-12">
		<h1>VISUALIZACION DE MATRICULAS / CURSO</h1>
		<br>
		</div>
	</div>
</div>
<div class="container">
	<div class="row ">
		<div class="form-group col-md-12">
			<div class="col-md-4">
				<label>Periodo Academico</label><br>
				<select name="p_academico" id="p_academico" class="form-control">
					<?php
					if ($_SESSION['permiso']!=1)
					{
						$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO ORDER BY idsemestreacademico DESC LIMIT 2";
						$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
						while($lista_semestre = mysqli_fetch_row($aux_semestre)){
							echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
						}				
					}
					else{
						$query_semestre = "SELECT idsemestreacademico, anio, periodo FROM SEMESTREACADEMICO ORDER BY idsemestreacademico DESC";
						$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
						while($lista_semestre = mysqli_fetch_row($aux_semestre)){
							echo "<option value='".$lista_semestre[0]."'>".$lista_semestre[1]."-".$lista_semestre[2]."</option>";
						}
					}
					 ?>
				</select>
			</div>
		<div class="col-md-4">
			<label>Escuela Profesional</label>
			<br>
			<select name="esc_profesional" id="esc_pro" class="form-control">
				<?php
					$query_esc = "SELECT idescuelaprofesional, nombre FROM escuelaprofesional";
					$val_esc = mysqli_query($x->conectar(), $query_esc);
					while ($list_esc = mysqli_fetch_row($val_esc)) {
					 	echo "<option value='".$list_esc[0]."'>$list_esc[1]</option>";
					 } 

				 ?>

			</select>
		</div>
		<div class="col-md-4">
			<label>Semestre</label>
			<br>
			<select name="semestre" id="semestre" class="form-control">
			<option value="NULL">--Seleccione--</option>
			</select>
		</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="form-group col-md-offset-1">
			<div class="col-md-7">
				<label>Unidad Didactica</label>
				</br>
				<select name="uni_didactica" id="uni_didactica" class="form-control"></select>
			</div>
			<div class="col-md-2">
				<br>
				<button id = "btn_buscar_notas" class="form-control btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="container" id="tabla_notas">
	
</div>
</body>
<footer id="footer"></footer>
</html>
<script type="text/javascript">
/* funcion para listas dependientes*/
$(document).ready(function(){
		$('#footer').load('componentes/footer.php');
		//para filtrar las carreras llevadas en dicho periodo acaedmico
		$('#p_academico').change(function(){
			var pa = $('#p_academico').val();
			$.post('ajax/pa_carreras_matriculadas.php', {periodo_academico: pa}).done(function(a){
				$('#esc_pro').html(a);
			});
		});
		$('#esc_pro').change(function(){
			var pa = $('#p_academico').val();
			var carrera = $('#esc_pro').val();
			$.post('ajax/mat_semestres.php', {pa: pa, carrera: carrera}).done(function(a){
			$('#semestre').html(a);
			});
			setTimeout(function(){
				var semestre = $('#semestre').val();
				var esc_profesional = $('#esc_pro').val();
			$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre}).done(function(respuesta){			
				$('#uni_didactica').html(respuesta);
			});}, 500)
			
		});
		$('#p_academico').change(function(){
			var pa = $('#p_academico').val();
			var carrera = $('#esc_pro').val();
			$.post('ajax/mat_semestres.php', {pa: pa, carrera: carrera}).done(function(a){
			$('#semestre').html(a);
			});
			
			setTimeout(function(){
				var semestre = $('#semestre').val();
				var esc_profesional = $('#esc_pro').val();
				$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre}).done(function(respuesta){			
					$('#uni_didactica').html(respuesta);});
			},500)
			
			
		});
	})

	$(document).ready(function(){
		$('#semestre').change(function(){
			var semestre = $('#semestre').val();
			var esc_profesional = $('#esc_pro').val();
			$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre}).done(function(respuesta){			
				$('#uni_didactica').html(respuesta);
			});
		});
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_buscar_notas').click(function(){
			var p_academico = $('#p_academico').val();
			var esc_pro = $('#esc_pro').val();
			var uni_didactica = $('#uni_didactica').val();
			$.post('ajax/lista_matriculas.php', {p_academico: p_academico, esc_pro: esc_pro, uni_didactica: uni_didactica}).done(function(respuesta){
				$('#tabla_notas').html(respuesta);
			});

		});
	})
</script>

<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>