<?php 
	require('config/conexion.php');
	$x = new conexion();
	$ep = $_GET['ep'];
	$q = "SELECT nombre FROM escuelaprofesional WHERE idescuelaprofesional = '$ep'";
	$a = mysqli_query($x->conectar(),$q);
	
 ?>
 <?php 
	session_start();
	if ($_SESSION['permiso'] == "1") {
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
	<script src = "js/funciones.js"></script>
	<script src = "js/jquery-3.1.1.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/alertify.js"></script>
	<title>Administracion</title>
</head>
<body>
	<?php 
	include('componentes/navbar.php');
	?>
	<h1 class="text-center"><u><b><?php while ( $l = mysqli_fetch_row($a)) {
		echo $l[0];
	}; ?></u></b></h1>
	<!--ID DE LA CARRERA QUE SE ADMINISTRARÁ-->
	<input type="text" id="idcarrera" value="<?php echo $ep; ?>" style="display:none;">
	<div class="container">
		<!--espacion para los modulos-->
		<div id="tabla_modulos" class="col-md-12">
		</div>
		<!--espacion para las unidades didacticas-->
		<div id="tabla_u_didacticas" class="col-md-12">
		</div>
	</div>
	<!--Modal modificar un modulo-->
	<div class="modal fade" id="modal_modificar_modulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">MODIFICAR MODULO</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label>ID modulo:</label>
						<input type="text" class="form-control" id="up_id_modulo" readonly>
						</div>
						<div class="col-md-6">
						<label>Horas</label>
						<input type="text" class="form-control" id="up_horas_modulo">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>NOMBRE DE MODULO</label>
						<input type="text" class="form-control" id="up_nom_modulo">
						</div>
				</div>

				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="modificar_modulo"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal para agregar un modulo-->
	<div class="modal fade" id="modal_agregar_modulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">AGREGAR MODULO</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>HORAS</label>
						<input type="text" class="form-control" id="horas_modulo" value="0">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>NOMBRE DE MODULO</label>
						<input type="text" class="form-control" id="nom_modulo">
						</div>
				</div>
				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="agregar_modulo"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal agregar un curso-->
	<div class="modal fade" id="modal_agregar_curso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">AGREGAR CURSO</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>NOMBRE DE LA UNIDAD DIDACTICA:</label>
						<input type="text" class="form-control" id="nom_u_didactica">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-4">
						<label>CREDITOS</label>
						<input type="number" class="form-control" id="creditos_u_didacticas">
						</div>
						<div class="col-md-4">
						<label>HORAS</label>
						<input type="number" class="form-control" id="horas_u_didactica">
						</div>
						<div class="col-md-4">
						<label>SEMESTRE</label>
						<select class="form-control" id="sem_u_didactica">
							<option value="">-Seleccione-</option>
							<?php $query_semestre="SELECT idsemestre, nombre FROM semestre"; 
								$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
								while ($lista_semestre = mysqli_fetch_row($aux_semestre)){
									echo "<option value=".$lista_semestre[0].">".$lista_semestre[1]."</option>";
								}
							?>
							
						</select>
						</div>
				</div>

				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="agregar_curso"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--modal para modificar curso-->
	<div class="modal fade" id="modal_modificar_curso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">MODIFICAR CURSO</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-2">
						<label>ID:</label>
						<input type="text" class="form-control" id="up_id_u_didactica" readonly>
						</div>
						<div class="col-md-10">
						<label>NOMBRE DE LA UNIDAD DIDACTICA:</label>
						<input type="text" class="form-control" id="up_nom_u_didactica">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-4">
						<label>CREDITOS</label>
						<input type="number" class="form-control" id="up_creditos_u_didactica">
						</div>
						<div class="col-md-4">
						<label>HORAS</label>
						<input type="number" class="form-control" id="up_horas_u_didactica">
						</div>
						<div class="col-md-4">
						<label>SEMESTRE</label>
						<select class="form-control" id="up_sem_u_didactica">
							<option value="">-Seleccione-</option>
							<?php $query_semestre="SELECT idsemestre, nombre FROM semestre"; 
								$aux_semestre = mysqli_query($x->conectar(),$query_semestre);
								while ($lista_semestre = mysqli_fetch_row($aux_semestre)){
									echo "<option value=".$lista_semestre[0].">".$lista_semestre[1]."</option>";
								}
							?>
							
						</select>
						</div>
				</div>

				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="modificar_curso"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal agregar un curso-->
	<div class="modal fade" id="modal_agregar_capacidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">AGREGAR CAPACIDAD</h4>
      		</div>
      		<div class="modal-body">
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>NOMBRE DE LA CAPACIDAD:</label>
						<input type="text" class="form-control" id="nom_capacidad">
						</div>
				</div>
				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="agregar_capacidad"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
        		</div>
			</div>
		</div>
		</div>
	</div>
	<!--Modal modificar capacidad-->
	<div class="modal fade" id="modal_modificar_capacidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-md" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">MODIFICAR CAPACIDAD</h4>
      		</div>
      		<div class="modal-body">
      			<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>ID CAPACIDAD:</label>
						<input type="text" class="form-control" id="up_id_capacidad">
						</div>
				</div>
				<div class="col-md-12 form-group">
						<div class="col-md-12">
						<label>NOMBRE DE LA CAPACIDAD:</label>
						<input type="text" class="form-control" id="up_nom_capacidad">
						</div>
				</div>
				<br>
				<div class="modal-footer">
					<button class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-erase"></span> Cancelar </button>
			        <button class="btn btn-primary" data-dismiss="modal" id="modificar_capacidad"><span class="glyphicon glyphicon-check"></span> Aceptar </button>
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
<script>
	$(document).ready(function(){
			var idcarrera = $('#idcarrera').val();
			$('#tabla_modulos').load('ajax/modulos_carrera.php?idcarrera='+idcarrera);
			//$.post('ajax/modulos_carrera.php', {idcarrera: idcarrera}).done(function(a){
			//	$('#tabla_modulos').html(a);});
	})

	//boton de modificar modulo
	$('#modificar_modulo').click(function(){
		var idmodulo = $('#up_id_modulo').val();
		var horas = $('#up_horas_modulo').val();
		var nombre = $('#up_nom_modulo').val();
		if (nombre!="") {
		var dato = "idmodulo="+idmodulo+"&horas="+horas+"&nombre="+nombre;
		$.ajax({
			type: "POST",
			url: "ajax/actualizar_modulo.php",
			data: dato,
			success: function(r){
				if (r==1) {
					alertify.success("MODIFICADO CORRECTAMENTE");
					var idcarrera = $('#idcarrera').val();
					$('#tabla_modulos').load('ajax/modulos_carrera.php?idcarrera='+idcarrera);
				}
				else{
					alertify.error("NO SE REALIZO CORRECTAMENTE");
				}
			}
			})//llave ajax
		}//llave primera condicional
		else{
			alertify.error("INGRESE EL NOMBRE DEL MODULO");
		}
	})

	//Boton agregar modulo
	$('#agregar_modulo').click(function(){
		var horas = $('#horas_modulo').val();
		var nombre = $('#nom_modulo').val();
		var idcarrera = $('#idcarrera').val();
		var dato = "horas="+horas+"&nombre="+nombre+"&idcarrera="+idcarrera;
		if (nombre!="") {
		$.ajax({
			type: "POST",
			url: "ajax/agregar_modulo.php",
			data: dato,
			success: function(r){
				if (r==1) {
					alertify.success("AGREGADO CORRECTAMENTE");
					$('#tabla_modulos').load('ajax/modulos_carrera.php?idcarrera='+idcarrera);
				}
				else{
					alertify.error("NO SE REALIZO CORRECTAMENTE");
				}
			}
			})//llave ajax
		}//llave primera condicional
		else{
			alertify.error("INGRESE EL NOMBRE DEL MODULO");
		}
	})
	//Boton agregar curso dentro de su modal agregar curso
	$('#agregar_curso').click(function(){
		var nombre = $("#nom_u_didactica").val();
		var creditos = $("#creditos_u_didacticas").val();
		var horas = $("#horas_u_didactica").val();
		var semestre = $("#sem_u_didactica").val();
		var idmodulo = $("#idmodulo").val();//id del modulo del input oculto
		var datos = "nombre="+nombre+"&creditos="+creditos+"&horas="+horas+"&semestre="+semestre+"&idmodulo="+idmodulo;
		$.ajax({
			type: "POST",
			url: "ajax/agregar_curso.php",
			data: datos,
			success:function(r){
				if (r==1) {
					alertify.success("CURSO AGREGADO SATISFACTORIAMENTE");
					$.post("ajax/modulo_cursos.php",{idmodulo: idmodulo}).done(function(respuesta){
					$('#tabla_u_didacticas').html(respuesta);})
				}
				else{
					alertify.error("NO SE REALIZO LA OPERACION");
				}
			}
		})
	})
	//boton de modificar curso
	$('#modificar_curso').click(function(){
		var id_curso = $('#up_id_u_didactica').val();
		var nom_udidactica = $('#up_nom_u_didactica').val();
		var creditos = $('#up_creditos_u_didactica').val();
		var horas = $('#up_horas_u_didactica').val();
		var semestre = $('#up_sem_u_didactica').val();
		var idmodulo = $("#idmodulo").val();//id del modulo del input oculto
		if (nom_udidactica!="") {
		var dato = "id="+id_curso+"&nombre="+nom_udidactica+"&creditos="+creditos+"&horas="+horas+"&semestre="+semestre;
		$.ajax({
			type: "POST",
			url: "ajax/actualizar_curso.php",
			data: dato,
			success: function(r){
				if (r==1) {
					alertify.success("CURSO MODIFICADO SATISFACTORIAMENTE");
					$.post("ajax/modulo_cursos.php",{idmodulo: idmodulo}).done(function(respuesta){
					$('#tabla_u_didacticas').html(respuesta);})
				}
				else{
					alertify.error("NO SE REALIZO CORRECTAMENTE");
				}
			}
			})//llave ajax
		}//llave primera condicional
		else{
			alertify.error("INGRESE EL NOMBRE DE LA UNIDAD DIDACTICA");
		}
	})
	//Boton agregar capacidad
	$('#agregar_capacidad').click(function(){
		var nombre = $("#nom_capacidad").val();
		var idmodulo = $("#idmodulo").val();//id del modulo del input oculto
		var datos = "nombre="+nombre+"&idmodulo="+idmodulo;
		$.ajax({
			type: "POST",
			url: "ajax/agregar_capacidad.php",
			data: datos,
			success:function(r){
				if (r==1) {
					alertify.success("CURSO AGREGADO SATISFACTORIAMENTE");
					$.post("ajax/modulo_capacidades.php",{idmodulo: idmodulo}).done(function(respuesta){
					$('#tabla_u_didacticas').html(respuesta);})
				}
				else{
					alertify.error("NO SE REALIZO LA OPERACION");
				}
			}
		})
	})
	//boton de modificar capacidad
	$('#modificar_capacidad').click(function(){
		var id_capacidad = $('#up_id_capacidad').val();
		var nom_capacidad = $('#up_nom_capacidad').val();
		var idmodulo = $("#idmodulo").val();//id del modulo del input oculto
		if (nom_capacidad!="") {
		var dato = "idcapacidad="+id_capacidad+"&nombre="+nom_capacidad;
		$.ajax({
			type: "POST",
			url: "ajax/actualizar_capacidad.php",
			data: dato,
			success: function(r){
				if (r==1) {
					alertify.success("CAPACIDAD MODIFICADA CORRECTAMENTE");
					$.post("ajax/modulo_capacidades.php",{idmodulo: idmodulo}).done(function(respuesta){
					$('#tabla_u_didacticas').html(respuesta);})
				}
				else{
					alertify.error("NO SE REALIZO CORRECTAMENTE");
				}
			}
			})//llave ajax
		}//llave primera condicional
		else{
			alertify.error("INGRESE EL NOMBRE DE LA CAPACIDAD");
		}
	})

</script>
<?php
	}
	else{
		echo "<script> window.location = 'login.php'</script>";} 
	?>