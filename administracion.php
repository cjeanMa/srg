<?php 
	session_start();
	if ($_SESSION['permiso'] == "1") {
	?>
<!DOCTYPE html>
<?php require('config/conexion.php') ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
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
	<title>Administracion</title>
</head>
<body>
	<?php 
	include('componentes/navbar.php');
	$x = new conexion();
	?>
	<h1 class="text-center"><u>Administración</u></h1>
	<div class="container">
		<div class="col-md-9">
			<div class="alert alert-success">
				<br>
				<li> Para ingresar una nueva carrera profesional, llene todos los campos necesarios solicitados (nombre de la carrera, fecha de creación, resolución de autoriación)</li>
				<br>
			</div>
			<h3 class="text-center"><u>Carreras Profesionales Tecnicas</u></h3>
			<button class="btn btn-success" id="btn_modal_carrera" data-toggle="modal" data-target="#modal_agregarCarrera"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
			<div id="tabla_carreras">
			</div>
		</div>
		<div class="col-md-3">
			<div class="alert alert-success">
				<li> Para ingresar un nuevo periodo academico, ingrese el id de manera correlativa a los demas periodos academicos</li>
			</div>
			<h3 class="text-center"><u>Periodos Academicos</u></h3>
			<button class="btn btn-success" id="btn_modal_periodo" data-toggle="modal" data-target="#modal_agregarPeriodo"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
			<div id="tabla_periodos_academicos">
			</div>
		</div>
	</div>
	<!--Modal Para agregar Carrera Profesional-->
	<div class="modal fade" id="modal_agregarCarrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Ingresar Nueva Carrera</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-2">
						<label>ID:</label>
						<input type="text" class="form-control" id="id_carrera" placeholder="N°">
						</div>
						<div class="col-md-10">
						<label>Nombre de Carrera:</label>
						<input type="text" class="form-control" id="nom_carrera" placeholder="Ingrese el nombre de la carrera">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>Fecha de Creación:</label>
						<input type="date" class="form-control" id="f_creacion" placeholder="Ingrese el nombre de la carrera">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label>Resolución de Autorización:</label>
						<input type="text" class="form-control" id="res_auto" placeholder="Ingrese la resolucion de Autorizacion">
						</div>
						<div class="col-md-6">
						<label>Fecha (Res. Aut.)</label>
						<input type="date" class="form-control" id="fec_auto">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label>Resolución de Revalidación:</label>
						<input type="text" class="form-control" id="res_reva" placeholder="Ingrese la resolucion de Revalidacion">
						</div>
						<div class="col-md-6">
						<label>Fecha (Res. Rev.)</label>
						<input type="date" class="form-control" id="fec_reva">
						</div>
				</div>
				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="agregar_carrera"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal Para Modificar una carrera-->
	<div class="modal fade" id="modal_modificar_carrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Modificar Carrera Profesional</h4>
      		</div>
      		<div class="modal-body">
      			<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>ID de la Carrera:</label>
						<input type="text" class="form-control" id="up_id_carrera" readonly>
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>Nombre de Carrera:</label>
						<input type="text" class="form-control" id="up_nom_carrera">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>Fecha de Creación:</label>
						<input type="date" class="form-control" id="up_f_creacion">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label>Resolución de Autorización:</label>
						<input type="text" class="form-control" id="up_res_auto">
						</div>
						<div class="col-md-6">
						<label>Fecha (Res. Aut.)</label>
						<input type="date" class="form-control" id="up_fec_auto">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label>Resolución de Revalidación:</label>
						<input type="text" class="form-control" id="up_res_reva">
						</div>
						<div class="col-md-6">
						<label>Fecha (Res. Rev.)</label>
						<input type="date" class="form-control" id="up_fec_reva">
						</div>
				</div>
				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="modificar_carrera"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal Para agregar Periodo Academico-->
	<div class="modal fade" id="modal_agregarPeriodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Ingresar Nuevo Periodo Academico</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-4">
						<label>ID:</label>
						<input type="text" class="form-control" placeholder="ID" id="id_periodo">
						</div>
						<div class="col-md-8">
						<label>Año:</label>
						<input type="text" class="form-control" placeholder="Año" id="anio">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>Periodo:</label>
							<select name="periodo" id="periodo" class="form-control" id="periodo">
								<option value="null">--Seleccione--</option>
								<option value="I">I</option>
								<option value="II">II</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
			        <button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="agregar_periodo"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>

	<footer>
		<?php include('componentes/footer.php') ?>
	</footer>	
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		//tablas de administracion
		$('#tabla_carreras').load('ajax/carreras.php');
		$('#tabla_periodos_academicos').load('ajax/periodos_academicos.php');
		//Btn Agregar Periodo Academico
	$('#agregar_periodo').click(function(){
		var id = $('#id_periodo').val();
		var anio = $('#anio').val();
		var periodo = $('#periodo').val();
		var dato = "idsa="+id+"&anio="+anio+"&periodo="+periodo;
		$.ajax({
                type : "POST",
                url : "ajax/agregar_periodo.php",
                data : dato,
                success: function(r){
                  if (r==1) {
                    alertify.success("PERIODO AGREGADO CORRECTAMENTE");
                    $('#tabla_periodos_academicos').load('ajax/periodos_academicos.php');
                  }
                  else{
                    alertify.error("NO SE PUDO AGREGAR");
                  }
                }

              })
	})
	//Btn modificar Carrera Profesional
	$('#modificar_carrera').click(function(){
		var id = $('#up_id_carrera').val();
		var carrera = $('#up_nom_carrera').val();
		var f_creacion = $('#up_f_creacion').val();
		var autorizacion = $('#up_res_auto').val();
		var f_autorizacion = $('#up_fec_auto').val();
		var revalidacion = $('#up_res_reva').val();
		var f_revalidacion = $('#up_fec_reva').val();
		var dato = 'id_carrera='+id+"&nom_carrera="+carrera+"&f_creacion="+
		f_creacion+"&autorizacion="+autorizacion+"&f_autorizacion="+
		f_autorizacion+"&revalidacion="+revalidacion+"&f_revalidacion="+
		f_revalidacion;
		if(id==""||carrera==""||f_creacion==""){
			alertify.error("DEJO EN BLANCO UNA CASILLA IMPORTANTE");
		}
		else{
		$.ajax({
			type : "POST",
			url : "ajax/actualizar_carrera.php",
			data : dato,
			success: function(r){
				if (r==1) {
					alertify.success("CARRERA PROFESIONAL MODIFICADA SATISFACTORIAMENTE");
					$('#tabla_carreras').load('ajax/carreras.php');
				}
				else{
					alertify.error("NO SE PUDO REALIZAR ACCION");
				}
			}
		})	
		}
	})
		//Btn agregar Carrera Profesional
	$('#agregar_carrera').click(function(){
		var id = $('#id_carrera').val();
		var carrera = $('#nom_carrera').val();
		var f_creacion = $('#f_creacion').val();
		var autorizacion = $('#res_auto').val();
		var f_autorizacion = $('#fec_auto').val();
		var revalidacion = $('#res_reva').val();
		var f_revalidacion = $('#fec_reva').val();
		var dato = 'id_carrera='+id+"&nom_carrera="+carrera+"&f_creacion="+
		f_creacion+"&autorizacion="+autorizacion+"&f_autorizacion="+
		f_autorizacion+"&revalidacion="+revalidacion+"&f_revalidacion="+
		f_revalidacion;
		if(id==""||carrera==""||f_creacion==""){
			alertify.error("NO DEJE EN BLANCO LAS TRES PRIMERAS CASILLAS");
		}
		else{
		$.ajax({
			type : "POST",
			url : "ajax/agregar_carrera.php",
			data : dato,
			success: function(r){
				if (r==1) {
					alertify.success("CARRERA PROFESIONAL AGREGADA SATISFACTORIAMENTE");
					$('#tabla_carreras').load('ajax/carreras.php');
				}
				else{
					alertify.error("NO SE PUDO REALIZAR ACCION");
				}
			}
		})	
		}
	})


	})
</script>
<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>