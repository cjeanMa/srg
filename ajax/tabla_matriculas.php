<?php 
	require('../config/conexion.php');
	$x = new conexion();
	if (!empty($_POST['idestudiante'])) {
		$idest=$_POST['idestudiante'];
	}
	else $idest=NULL ;

	if (!empty($_POST['p_academico'])) {
		$semestre = $_POST['p_academico'];
	}
	else $semestre=NULL ;

	$query_anio = "SELECT anio, periodo FROM semestreacademico WHERE idsemestreacademico = '$semestre'";
	$aux_anio = mysqli_query($x->conectar(), $query_anio);
	$lista_anio = mysqli_fetch_row($aux_anio);
 ?>
<div class="row">
	<div class="col-md-12">
			<h2 class="text-center">CURSOS DEL <?php echo $lista_anio[0]." - ".$lista_anio[1]; ?></h2>
		<table class="table table-hover table-condensed table-bordered">

		<tr class="text-center">
				<td><b>NUM</b></td>
				<td><b>UNIDAD DIDACTICA</b></td>
				<td><b>CREDITOS</b></td>
				<td><b>HORAS</b></td>
				<td><b>SEMESTRE</b></td>
				<td><b>ELIMINAR</b></td>
		</tr>
		<?php  
				$query="SELECT b.idMatricula, a.nombre, a.creditos, a.horasunidad, a.romanos 
						FROM 
						(SELECT x.idunidaddidactica, x.nombre, x.creditos, x.horasunidad, x.semestre, y.romanos 
							FROM unidaddidactica x INNER JOIN semestre y ON x.semestre = y.idsemestre) a 
						inner join (SELECT  a.idMatricula, a.UnidadDidactica_idUnidadDidactica, a.semestreacademico 
							FROM matricula a WHERE estudiante_idestudiante = '$idest' ) b
						ON a.idUnidadDidactica = b.UnidadDidactica_idUnidadDidactica
                        WHERE b.semestreacademico = '$semestre' ORDER BY b.UnidadDidactica_idUnidadDidactica";
                $num = 1;
				$aux = mysqli_query($x->conectar(), $query);
				while ($lista = mysqli_fetch_row($aux)){
		?>		

		<tr class="text-center" valign="middle">
				<td><?php echo $num; ?></td>
				<td align="left"><?php echo $lista[1] ?></td>
				<td><?php echo $lista[2] ?></td>
				<td><?php echo $lista[3] ?></td>
				<td><?php echo $lista[4] ?></td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-trash" id="borrar_matricula" onclick = "eliminar_matricula('<?php echo $lista[0]; ?>')"></button>
				</td>
		</tr>
			<?php $num++;}; ?>
		</table>
	</div>
</div>
<script>
	//para cargar de nuevo despues de borrar
	$(document).ready(function(){
		$('#borrar_matricula').click(function(){
			var p_academico = $('#p_academico').val();
			var idestudiante = $('#idestudiante').val();
			setTimeout(function(){
				$.post('ajax/tabla_matriculas.php', {p_academico: p_academico, idestudiante: idestudiante}).done(function(respuesta){
			$('#tabla_matricula').html(respuesta);
			});},500);
			
		})
	})
</script>