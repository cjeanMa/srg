<?php 
  session_start();
  if (isset($_SESSION['idusuario'])) {
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

	<meta charset="UTF-8">
	<title>. : : Estudiantes : : .</title>
</head>
<body>
<!--RECURSO NAVBAR-->
<?php include 'componentes/navbar.php'; ?>

<div class="container">
	<div id="tabla"></div>
</div>

<!-- Modal Para visualizar todos los datos -->
<!-- Modal -->
<div class="modal fade" id="modalVisualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Datos de Estudiante</h4>
      </div>
      <div class="modal-body">
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">DNI: </label>
            <div class="col-md-10">
              <input type="text" id="idpersona" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label class="col-md-2">Carrera: </label>
            <div class="col-md-10">
              <input type="text" id="carrera" class="form-control" readonly>
            </div>
        </div>
            
        <div class="col-md-12 form-group">
            <label class="col-md-2">Ingreso: </label>
            <div class="col-md-4">
              <input type="text" id="fechaingreso" class="form-control" readonly>
            </div>
            <label class="col-md-2">Celular: </label>
            <div class="col-md-4">
              <input type="text" id="telefono" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label class="col-md-2">Nombres: </label>
            <div class="col-md-10">
              <input type="text" id="nombre" class="form-control" readonly>
            </div>
        </div>
        
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">Apellido Paterno: </label>
            <div class="col-md-4">
              <input type="text" id="apellidop" class="form-control" readonly>
            </div>
            <label class="col-md-2">Apellido Materno: </label>
            <div class="col-md-4">
              <input type="text" id="apellidom" class="form-control" readonly>
            </div>
        </div>
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">Sexo: </label>
            <div class="col-md-4">
              <input type="text" id="sexo" class="form-control" readonly>
            </div>
            <label class="col-md-2">Fecha Nacimiento: </label>
            <div class="col-md-4">
              <input type="text" id="fechanacimiento" class="form-control" readonly>
            </div>
        </div>
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">Direccion: </label>
            <div class="col-md-10">
              <input type="text" id="direccion" class="form-control" readonly>
            </div>
        </div>

        <div class="col-md-12 form-group">
            <label class="col-md-2">Email: </label>
            <div class="col-md-10">
              <input type="text" id="email" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label class="col-md-2">Discapacidad: </label>
            <div class="col-md-4">
              <input type="text" id="discapacidad" class="form-control" readonly>
            </div>
            <label class="col-md-2">Conadis: </label>
            <div class="col-md-4">
              <input type="text" id="conadis" class="form-control" readonly>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Aceptar
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal Para edicion de datos -->
<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos de Estudiante</h4>
      </div>
      <div class="modal-body">
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">DNI: </label>
            <div class="col-md-10">
              <input type="text" id="idpersonaup" class="form-control" >
            </div>
        </div>                
        <div class="col-md-12 form-group">
            <label class="col-md-2">Nombres: </label>
            <div class="col-md-10">
              <input type="text" id="nombreup" class="form-control">
            </div>
        </div>
        
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">Apellido Paterno: </label>
            <div class="col-md-4">
              <input type="text" id="apellidopup" class="form-control">
            </div>
            <label class="col-md-2">Apellido Materno: </label>
            <div class="col-md-4">
              <input type="text" id="apellidomup" class="form-control">
            </div>
        </div>
        
        <div class="col-md-12 form-group">
            <label class="col-md-2">Direccion: </label>
            <div class="col-md-10">
              <input type="text" id="direccionup" class="form-control">
            </div>
        </div>

        <div class="col-md-12 form-group">
            <label class="col-md-2">Email: </label>
            <div class="col-md-4">
              <input type="text" id="emailup" class="form-control">
            </div>
            <label class="col-md-2">Celular: </label>
            <div class="col-md-4">
              <input type="text" id="telefonoup" class="form-control">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label class="col-md-2">Sexo: </label>
            <div class="col-md-4">
              <input type="text" id="sexoup" class="form-control">
            </div>
            <label class="col-md-2">Fecha Nacimiento: </label>
            <div class="col-md-4">
              <input type="date" id="fechanacimientoup" class="form-control">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label class="col-md-2">Discapacidad: </label>
            <div class="col-md-4">
              <input type="text" id="discapacidadup" class="form-control">
            </div>
            <label class="col-md-2">Conadis: </label>
            <div class="col-md-4">
              <input type="text" id="conadisup" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizar_datos">
          Actualizar
        </button>
        
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
  <div id="footer"></div>
</footer>
</body>

</html>

<script type = "text/javascript">
	//LLAMADO DE COMPONENTES
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla_estudiantes.php');
		//$('#navbar').load('componentes/navbar.php');
		$('#footer').load('componentes/footer.php');
	});

  $('#actualizar_datos').click(function(){
    dni = $('#idpersonaup').val();
    nombre = $('#nombreup').val()
    apellidop = $('#apellidopup').val();
    apellidom = $('#apellidomup').val();
    direccion = $('#direccionup').val();
    email = $('#emailup').val();
    telefono = $('#telefonoup').val();
    sexo = $('#sexoup').val();
    fnacimiento = $('#fechanacimientoup').val();
    discapacidad = $('#discapacidadup').val();
    conadis = $('#conadisup').val();
    dato = "dni=" + dni + "&nombre=" + nombre +
            "&apellidop=" + apellidop + "&apellidom=" + apellidom +
            "&direccion=" + direccion + "&email=" + email +
            "&telefono=" + telefono + "&sexo=" + sexo +
            "&fnacimiento=" + fnacimiento + "&discapacidad=" + discapacidad + 
            "&conadis=" + conadis;

            if (dni == ""|| nombre=="" || apellidop == "" || apellidom == "" || direccion == ""|| telefono == "" || sexo == "" || discapacidad == "" || conadis == "") {
              alertify.error("NO DEJE CAMPOS EN BLANCO");
            }
            else {
              $.ajax({
                type : "POST",
                url : "ajax/actualizar_persona.php",
                data : dato,
                success: function(r){
                  if (r==1) {
                    alertify.success("REGISTRO FUE MODIFICADO CORRECTAMENTE");
                    $('#tabla').load('componentes/tabla_estudiantes.php');
                  }
                  else{
                    alertify.error("NO SE PUDO MODIFICAR");
                  }
                }

              })
            }
            
  });
</script>

<?php
  }
  else{
    echo "<script> window.location = 'login.php'</script>";} 
  ?>