<?php 
	require('../config/conexion.php');
	$x = new conexion();
	
		$p_academico = $_POST['p_academico'];
		$esc_pro = $_POST['esc_pro'];
		$uni_didactica = $_POST['uni_didactica'];
 ?>
<?php 
		$query_esc = "SELECT nombre FROM escuelaprofesional WHERE idescuelaprofesional = '$esc_pro'";
		$val_esc  = mysqli_query($x->conectar(), $query_esc);
		$lista_esc = mysqli_fetch_row($val_esc);

		$query_ud = "SELECT nombre FROM unidaddidactica WHERE idunidaddidactica = '$uni_didactica'";
		$val_ud = mysqli_query($x->conectar(), $query_ud);
		$lista_ud = mysqli_fetch_row($val_ud);
		
	 ?>
	
	<hr>
	<div class="col-md-10 col-md-offset-1">
			<h3 class="text-center"><?php echo $lista_esc[0]; ?></h3>
			<h4 class="text-center"><?php echo $lista_ud[0]; ?></h4>
	<hr>
		<table class="table table-hover table-condensed table-bordered">

		<tr class="text-center success">
				<td><b>NUMERO</b></td>
				<td><b>DNI</b></td>
				<td><b>APELLIDOS Y NOMBRES</b></td>
		</tr>
		<?php  
				$query="SELECT a.idMatricula, b.apellidopaterno, b.apellidomaterno, b.nombres, b.idpersona
						FROM matricula a 
						INNER JOIN 
							(SELECT y.idpersona, x.idestudiante, y.apellidopaterno, y.apellidomaterno, y.nombres  
							FROM estudiante x INNER JOIN persona y ON x.persona_idpersona = y.idpersona) b
						ON a.estudiante_idestudiante = b.idestudiante
						WHERE a.semestreacademico = '$p_academico' and a.unidaddidactica_idunidaddidactica = '$uni_didactica'
						ORDER BY b.apellidopaterno";

				$aux = mysqli_query($x->conectar(), $query);
				$num = 1;
				while ($lista = mysqli_fetch_row($aux)){
		?>		

		<tr class="text-center">
				<td><?php echo $num; ?></td>
				<td><?php echo $lista[4]; ?></td>
				<td><?php echo $lista[1]." ".$lista[2]." ".$lista[3] ?></td>
				
		</tr>	
			<?php $num++;}; ?>
		</table>
	</div>
