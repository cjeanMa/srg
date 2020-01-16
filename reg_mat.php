<?php 
	session_start();
	if (isset($_SESSION['idusuario'])) {

		include('config/conexion.php');
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<link rel="stylesheet" type="text/css" href="css/themes/default.css">

	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>

	<title>. : : Matriculas : : .</title>
</head>
<body>
	<?php include('componentes/navbar.php'); ?>
	<div class="text-center">
	<h1>REGISTRO DE MATRICULA</h1>
	</div>
	</br>
	<form action="ajax/registro_matricula" method="POST" name="form-mat">
			<div class="row group-form">
				<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-warning">
						<li> Ingrese el Periodo Academico, la escuela profesional y el semestre del que desea generar el reporte de Matricula</li>
				</div>
					<div class="col-md-3">
				<label>Periodo Academico</label>
				<select id="p_academico" class="form-control" name="p_academico">
					<?php  
					$x = new conexion();
					if ($_SESSION['permiso']=='1') {
						$query_pa = "SELECT idsemestreacademico, anio, periodo FROM semestreacademico ORDER BY idsemestreacademico DESC";
							$aux_pa = mysqli_query($x->conectar(),$query_pa);
							while($lista_pa = mysqli_fetch_row($aux_pa)){
								echo "<option value='".$lista_pa[0]."'>".$lista_pa[1]."-".$lista_pa[2]."</option>";
							}
					}
					else{
						$query_pa = "SELECT idsemestreacademico, anio, periodo FROM semestreacademico ORDER BY idsemestreacademico	 DESC LIMIT 0, 4";
							$aux_pa = mysqli_query($x->conectar(),$query_pa);
							while($lista_pa = mysqli_fetch_row($aux_pa)){
								echo "<option value='".$lista_pa[0]."'>".$lista_pa[1]."-".$lista_pa[2]."</option>";
							}
					}
					?>
				</select>
				</div>

				<div class="col-md-7">
				<label>Escuela Profesional</label>
				<select id="esc_pro" class="form-control" name="esc_pro">
					<option value=" ">--Seleccionar--</option>
					<?php  
					$query_esc = "SELECT idescuelaprofesional, nombre FROM escuelaprofesional";
							$aux_esc = mysqli_query($x->conectar(),$query_esc);
							while($lista_esc = mysqli_fetch_row($aux_esc)){
								echo "<option value='".$lista_esc[0]."'>".$lista_esc[1]."</option>";
					}
					?>
				</select>
				</div>
				<div class="col-md-2">
					<label>Semestre</label>
					<select id="semestre" class="form-control" name="semestre">
					<option value=" ">--Seleccionar--</option>
					</select>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<label></label>
					<input type="submit" name="enviar" value="GENERAR EXCEL" class="btn btn-success form-control">
				</div>
			</div>
		</div>
	</form>
			<div class="container">
			<div class="row">
				<div class="apartado text-center">
					<h2><u>Reporte de Genero por Periodo academico</u></h2>
				</div>
				<div class="col-md-12 text-center">
					<div class="alert alert-warning">
						Para la generación del reporte de genero por reporte:
						<li>Primero debe seleccionar el periodo academico del cual desea generar su reporte</li>
						<li>Y darle al boton de Reporte</li>
					</div>
						
						<a id="calc_sexo" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Rep. Genero</a>
						<a id="calc_edad" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Rep. Edad</a>
					
					<!--div para generar -->
					<div id="rep_sexos"></div>
					<!--div para generar -->
				</div>
			</div>
		</div>
	</body>
	<?php include('componentes/footer.php'); ?>
</html>	
	
	<script>
	$(document).ready(function(){
		var pa = $('#p_academico').val();
		$.post('ajax/pa_carreras_matriculadas.php', {periodo_academico: pa}).done(function(a){
				$('#esc_pro').html(a);});
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
		});
		$('#p_academico').change(function(){
			var pa = $('#p_academico').val();
			var carrera = $('#esc_pro').val();
			$.post('ajax/mat_semestres.php', {pa: pa, carrera: carrera}).done(function(a){
			$('#semestre').html(a);
			});
		});
	
		$('#calc_sexo').click(function(){
			var pa = $('#p_academico').val();
			$.post('ajax/rep_sexos_pa.php', {pa: pa}).done(function(a){
				$('#rep_sexos').html(a);
				});
			})
		
		$('#calc_edad').click(function(){
			var pa = $('#p_academico').val();
			$.post('ajax/rep_edad_pa.php', {pa:pa}).done(function(a){
				$('#rep_sexos').html(a);
			})
		})
	})
	</script>


<?php
	}
	else
		echo "<script> window.location = 'login.php'</script>";
	?>
