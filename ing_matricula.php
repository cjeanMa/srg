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
	<title>. : : Matricula : : .</title>
</head>
<body>
<!--RECURSO NAVBAR-->
<?php include('componentes/navbar.php'); ?>

<?php
  include ('config/conexion.php');
  $a = new conexion();
  $dni=$_POST["dni"];
  $query = "SELECT nombres, apellidoPaterno, apellidoMaterno,  FROM Persona WHERE idPersona = '$dni'";
  $val = mysqli_query($a->conectar(), $query);
  while ($x = mysqli_fetch_row($val)) {
 ?>
 <div style="background:#a0f040; ">
 <div class = "container">
<div class="row">
  <div class = "col-md-2">
    <b><h4>ESTUDIANTE:</h4></b>
  </div>
  <div class = "col-md-6">
    <b><h4><?php echo $x[0]." ". $x[1]." ". $x[2]; }?></h4></b>
  </div>
</div>
</div>
</div>

<div class="container">
  <?php include("componentes/tabla_matricula.php") ?>
	<!--<div id="tabla_matricula"></div>-->
</div>

<!-- Modal Para nuevas matriculas-->
<!-- Modal -->
<div class="modal fade" id="modalNuevaMatricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Unidad Didactica</h4>
      </div>
      <div class="modal-body">
        <label>Unidad Didactica</label>
        <select name="u_didactica" id="u_didactica" class="form-control input-md">
          <option value="0">--Seleccione--</option>
        <?php 
        $query="SELECT idUnidadDidactica, nombre FROM unidaddidactica WHERE modulo_idModulo = '2' ORDER BY nombre";
        $aux = mysqli_query($a->conectar(), $query);
        while ($lista = mysqli_fetch_row($aux)) {
        
         ?>
          <option value='<?php echo $lista[0]; ?>'><?php echo $lista[1]; ?></option>
        <?php  }?>
        </select>
        <label>Creditos</label>
        <input type="text" name="" id="creditos" class="form-control input-md">
        <label>Horas Practicas</label>
        <input type="text" name="" id="horasPracticas" class="form-control input-md">
        <label>Horas Teoricas</label>
        <input type="text" name="" id="horasTeoricas" class="form-control input-md">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar_nuevo">
        	Agregar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Para edicion de datos -->
<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
      </div>
      <div class="modal-body">
        <input type="text" hidden="" id="idpersona" name="">
        <label>Unidad Didactica</label>
        
        <input type="text" name="" id="nombreup" class="form-control input-sm">
        <label>Creditos</label>
        <input type="text" name="" id="apellidoup" class="form-control input-sm">
        <label>Horas Practicas</label>
        <input type="text" name="" id="emailup" class="form-control input-sm">
        <label>Horas Teoricas</label>
        <input type="text" name="" id="telefonoup" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizar_datos">
        	Actualizar
        </button>
        
      </div>
    </div>
  </div>
</div>
</body>

<footer id="footer">
</footer>

</html>

<script type = "text/javascript">
	//LLAMADO DE COMPONENTES
	$(document).ready(function(){
		$('#tabla_matricula').load('componentes/tabla_matricula.php');
		//$('#navbar').load('componentes/navbar.php');
		$('#footer').load('componentes/footer.php');
	});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#guardar_nuevo').click(function(){

    });
  });
</script>