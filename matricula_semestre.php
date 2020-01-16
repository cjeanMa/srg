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

	<script src = "js/jquery-3.2.1.min.js"></script>
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
	$dni = $_GET['dni'];

	$estudiante = "SELECT a.idEstudiante, a.escuelaProfesional_idEscuelaProfesional, b.nombre 
	FROM Estudiante a INNER JOIN 
	(SELECT idEscuelaProfesional, nombre FROM EscuelaProfesional) b
	ON a.escuelaProfesional_idEscuelaProfesional = b.idEscuelaProfesional
	WHERE a.persona_idPersona =". $_GET['dni'];

	$query_dni="SELECT concat(x.apellidoPaterno,' ',x.apellidoMaterno,', ',x.nombres) nombres,
	a.idEstudiante
	FROM persona x INNER JOIN (SELECT a.Persona_idPersona, a.idEstudiante FROM Estudiante a) a
	ON x.idPersona = a.persona_idPersona
	WHERE x.idPersona = '$dni'";
// para conocer las carreras que esta siguiendo el estudiante
?>
<div class="container">
	<div class="row text-center">
		<div class="col-md-12">
		<h1><u>MATRICULA  DE ESTUDIANTES</u></h1>
		</div>
	</div>
	<div>
		<div class="col-md-6">
			<?php  //nombre del estudiante
			$nombres = mysqli_query($x->conectar(), $query_dni);
			$val_nombres=mysqli_fetch_row($nombres);
			echo "<h2><b>$val_nombres[0]</b></h2>";?>			
		</div>	
		<div class="col-md-6">
			<label>Escuela Profesional : </label>
			<select id="idestudiante" class="form-control">
				<?php
				$value = mysqli_query($x->conectar(), $estudiante);
					while ($val=mysqli_fetch_row($value)) {
					echo "<option value='$val[0]'>$val[2]</option>";
					}
					 ?>
			</select>		
		</div>	
	</div>
</div>
<div class="container">
	<div class="row ">
		<div class="form-group col-md-12">
			<div class="col-md-3">
				<label>Periodo Academico : </label><br>
				<select name="p_academico" id="p_academico" class="form-control">
				</select>
			</div>
			<!--DIV PARA INGRESAR EL INPUT OCULTO CON CODIGO DE CARRERA PROFESIONAL-->
			<div id="esc"> 
			</div>
			<!--DIV PARA INGRESAR EL INPUT OCULTO CON CODIGO DE CARRERA PROFESIONAL-->
		<div class="col-md-3">
			<label>Semestre : </label>
			<br>
			<select name="semestre" id="semestre" class="form-control">
			<option value="NULL">--Seleccione--</option>
			</select>
		</div>
		<div class="col-md-6">
				<label>Unidad Didactica : </label>
				</br>
				<select name="uni_didactica" id="uni_didactica" class="form-control">
					<option value="NULL">--Seleccione--</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="form-group col-md-12">
			<div class="col-md-1 text-center">
				<label>Activar</label>
				</br>
				<input type="checkbox" id="act_obs">
			</div>
			<div class="col-md-5">
				<label>Observaciones :</label>
				</br>
					<input type="text" id="observaciones" class="form-control" placeholder="INGRESE EL NUMERO DE RESOLUCION" readonly="readonly">
				<p style="font-size:70%">Ingrese la resolución completa</p>
			</div>
			<div class="col-md-2">
				<br>
				<button id = "btn_agregar_matricula" class="form-control btn-primary" title="Matricular Unidad Didactica"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
			</div>
			<div class="col-md-2">
				<br>
				<button id = "btn_agregar_semestre" class="form-control btn-success" title="Matricular Semestre"><span class="glyphicon glyphicon-check"></span>Semestre</button>
			</div>
			<div class="col-md-1">
				<br>
				<button id = "ver_matricula" class="form-control btn-danger" title="Actualizar Cursos"><span class="glyphicon glyphicon-refresh"></span></button>
			</div>
			<div class="col-md-1">
				<br>
				<button id = "imprimir_ficha" class="form-control btn-warning" target="_blank" title="Imprimir"><span class="glyphicon glyphicon-print"></span></button>
			</div>
		</div>
	</div>
</div>

<!--NOTIFICACIONES ANTES DE MATRICULAR-->
<div  id="notificaciones" class="container">
</div>
<!--tabla de matriculas-->
<div  id="tabla_matricula" class="container">
</div>
<footer>
	<div id="footer"></div>
</footer>
</body>
<script type="text/javascript">
	//funcion para mostrar mensajes antes de matricular ... pagina de inicio
	$(document).ready(function(){
		var id = $('#idestudiante').val();
		var p = $('#p_academico').val();
		$.post('ajax/revision_estudiante', {idestudiante: id, p_academico : p}).done(function(a){
			$('#notificaciones').html(a);
		});	
		//muestra la tabla de matricula dependiendo del año que aparezca por defecto
		setTimeout(function(){
			var p_academico = $('#p_academico').val();
			var idestudiante = $('#idestudiante').val();
			$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
		$('#tabla_matricula').html(respuesta);
		});}, 300);

		//se realiza automaticamente para determinar la carrera / idestudiante
			var idestudiante = $('#idestudiante').val();
			$.post('ajax/esc_idestudiante.php', {idestudiante: idestudiante}).done(function(respuesta){			
				$('#esc').html(respuesta);
		})
		/* funcion para listas dependientes*/
		var semestre = $('#semestre').val();
		var esc_profesional = $('#esc_pro').val();
		setTimeout(function(){
			$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre}).done(function(respuesta){			
			$('#uni_didactica').html(respuesta);
		})}, 500);
		//Para mostrar los semestres disponibles a llevar
		var idestudiante = $('#idestudiante').val();
		$.post('ajax/semestre.php', {idestudiante: idestudiante}).done(function(respuesta){			
				$('#semestre').html(respuesta);
			});
		//PARA CALCULAR EL PERIODO DESDE EL QUE PUEDE MATRICULARSE
		var idestudiante = $('#idestudiante').val();
		$.post('ajax/pa_matricula.php',{idestudiante: idestudiante}).done(function(a){
			$('#p_academico').html(a);
		})
		//AQUI ACABAN LAS FUNCIONES QUE SE LANZAN AL INICIAR
		//Funcion para cargar las unidades didacticas en base al semestre
		$('#semestre').change(function(){
			var semestre = $('#semestre').val();
			var esc_profesional = $('#esc_pro').val();
			var idestudiante = $('#idestudiante').val();
			$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre, idestudiante: idestudiante}).done(function(respuesta){			
				$('#uni_didactica').html(respuesta);
			});
		});
	})

</script>

<script type="text/javascript">
	$(document).ready(function(){
		//CHECK ACTIVAR Y DESACTIVAR OBSERVACIONES
		$('#act_obs').change(function(){
			if (this.checked){
				$('#observaciones').removeAttr("readonly");}
			else{
				$('#observaciones').attr("readonly", "readonly");
				$('#observaciones').val("");}
		})
		//PARA CAMBIO DE PERIODO ACADEMICO
		$('#p_academico').change(function(){
		var id = $('#idestudiante').val();
		var p = $('#p_academico').val();
		$.post('ajax/revision_estudiante', {idestudiante: id, p_academico : p}).done(function(a){
			$('#notificaciones').html(a);
		});

		var p_academico = $('#p_academico').val();
		var idestudiante = $('#idestudiante').val();

		$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
		$('#tabla_matricula').html(respuesta);
		});
		})
		//PARA EL CAMBIO DE ID DEL ESTUDIANTE
		$('#idestudiante').change(function(){
		var p_academico = $('#p_academico').val();
		var idestudiante = $('#idestudiante').val();
		$.post('ajax/esc_idestudiante.php', {idestudiante: idestudiante}).done(function(respuesta){			
				$('#esc').html(respuesta);});
		$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){$('#tabla_matricula').html(respuesta)});
		$.post('ajax/revision_estudiante', {idestudiante: idestudiante, p_academico : p_academico}).done(function(a){
		$('#notificaciones').html(a)});
		setTimeout(function(){
				var idestudiante = $('#idestudiante').val();
				$.post('ajax/semestre.php', {idestudiante: idestudiante}).done(function(respuesta){			
				$('#semestre').html(respuesta)});
				setTimeout(function(){
									var semestre = $('#semestre').val();
									var esc_profesional = $('#esc_pro').val();
									$.post('ajax/u_didactica.php', {esc_profesional: esc_profesional, semestre: semestre}).done(function(respuesta){$('#uni_didactica').html(respuesta);})
				},100);
				
			},100);
		});
		//PARA CALCULAR LOS PERIODOS ACADEMICOS CUANDO CAMBIA EL ID DEL ESTUDIANTE
			$('#idestudiante').change(function(){
			var idestudiante = $('#idestudiante').val();
			$.post('ajax/pa_matricula.php',{idestudiante: idestudiante}).done(function(a){
			$('#p_academico').html(a);
		})
		})
		//Para evento de boton semestre
		$('#btn_agregar_semestre').click(function(){
			var p_academico = $('#p_academico').val();
			var idestudiante = $('#idestudiante').val();
			var esc_pro = $('#esc_pro').val();
			var semestre = $('#semestre').val();
			//alert(p_academico+" "+idestudiante+" "+esc_pro+" "+semestre);
			if (p_academico == "") {
				alertify.error("INGRESE EL AÑO ACADEMICO");
			}
			if (semestre == "NULL" || semestre == "") {
				alertify.error("INGRESE EL SEMESTRE");
			}
			else{
				ing_mat_semestre(p_academico, idestudiante, esc_pro, semestre);
				setTimeout(function(){$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
				$('#tabla_matricula').html(respuesta);});},500);
				setTimeout(function(){$.post('ajax/revision_estudiante', {idestudiante: idestudiante, p_academico : p_academico}).done(function(a){
				$('#notificaciones').html(a);});},700);;
			}
		})	
		//Para evento de click en Ver matriculas
		$('#ver_matricula').click(function(){
		var p_academico = $('#p_academico').val();
		var idestudiante = $('#idestudiante').val();
		$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
		$('#tabla_matricula').html(respuesta);
		});
		})
		// Para imprimir la ficha de matricula
		$('#imprimir_ficha').click(function(){
		var p_academico = $('#p_academico').val();
		var idestudiante = $('#idestudiante').val();
		if(p_academico==""){
			alertify.error("INGRESE EL PERIODO ACADEMICO");
		}
		else{
			window.open('ficha_matricula?p_academico='+p_academico+'&idestudiante='+idestudiante);	
		}
		})
	})
</script>

<script type="text/javascript">
	/*funcion para agregar matriculas*/
	$(document).ready(function(){

		$('#btn_agregar_matricula').click(function(){
					
			var p_academico = $('#p_academico').val();
			var idunidad = $('#uni_didactica').val();
			var idestudiante = $('#idestudiante').val();
			//var observacion = $('observaciones').val();
			if (p_academico == "") {
				alertify.error("INGRESE EL PERIODO ACADEMICO");
			}
			if (idunidad == "0" || idunidad == "" ||idunidad == "NULL") {
				alertify.error("INGRESE LA UNIDAD ACADEMICA");
			}
			else{
				ing_matricula(p_academico, idunidad, idestudiante); //funcion de js/funciones.js
				setTimeout(function(){$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
				$('#tabla_matricula').html(respuesta);});},500);

				setTimeout(function(){$.post('ajax/revision_estudiante', {idestudiante: id, p_academico : p}).done(function(a){
				$('#notificaciones').html(a);});},700);;
			}
			});
		});
</script>

<script type="text/javascript">
		$(document).ready(function(){
		$('#footer').load('componentes/footer.php');
	});
</script>


<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>