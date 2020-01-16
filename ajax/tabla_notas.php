<?php 
	require('../config/conexion.php');
	//require('../clases/estudiante.class.php');
	$x = new conexion();
	$dni = $_POST['dni'];

	/*$s_academico = "SELECT a.semestreacademico
	FROM matricula a 
	INNER JOIN
	(SELECT idEstudiante FROM estudiante WHERE Persona_idPersona='$dni') b 
	ON a.estudiante_idEstudiante = b.idEstudiante
    GROUP BY a.semestreAcademico";*/
    $s_academico = "SELECT semestreacademico
	FROM matricula WHERE estudiante_idestudiante = '$dni' GROUP BY semestreAcademico";
 ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<?php 
		$var_s_academico = mysqli_query($x->conectar(), $s_academico);
		while ($lista_sa = mysqli_fetch_row($var_s_academico)) {
			
		?>	
		
			<h2 class="text-center"> SEMESTRE ACADEMICO <?php echo $lista_sa[0];?> </h2>
			<table class='table table-hover table-condensed table-bordered'>
				
			<tr class="text-center success">
				<td><b>NUMERO</b></td>
				<td><b>SEMESTRE</b></td>
				<td><b>UNIDAD DIDACTICA</b></td>
				<td><b>NOTA</b></td>
			</tr>
			<?php 
				$query_ud = "SELECT  a.idMatricula, c.nombre, a.nota, c.romanos, a.semestreacademico 
					FROM matricula a 
					INNER JOIN 
					(SELECT x.idunidaddidactica, x.nombre, y.romanos FROM unidaddidactica x
						INNER JOIN semestre y ON x.semestre = y.idsemestre) c
					ON a.UnidadDidactica_idUnidadDidactica = c.idUnidadDidactica
					WHERE a.semestreacademico = '$lista_sa[0]' AND a.estudiante_idestudiante = '$dni'";
				$var_ud = mysqli_query($x->conectar(), $query_ud);
				$num = 1;
				while ($lista_ud = mysqli_fetch_row($var_ud)) {
					
				?>
				<tr>
					<td class="text-center"><?php echo $num; ?></td>
					<td class="text-center"><?php echo $lista_ud[3]; ?></td>
					<td><?php echo $lista_ud[1]; ?></td>

					<?php 
					//CONDICIONAL PARA SABER SI LA NOTA ES DESAPROBATORIA O  INVALIDA
					if ($lista_ud[2] <= 10 || $lista_ud[2] >= 21) {
						
					 ?>
					<td class="text-center" style ="color: red;"><?php echo $lista_ud[2]; ?></td>

					<?php 
					}
					else{
					 ?>
					<td class="text-center"><?php echo $lista_ud[2]; ?></td>

					 <?php 
					}
					  ?>
				</tr>
			<?php  $num++;	} ?>

			</table>
			<br>
		<?php 
		}

		 ?>
		
	</div>
</div>