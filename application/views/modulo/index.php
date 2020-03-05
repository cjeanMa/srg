
<div class="row justify-content-center text-center">
<?php
	if (!empty($escuelaprofesional['nombreEscuelaProfesional'])) {
		echo "<h2 class='col-md-12'><b>Lista de Modulos del programa de Estudios</b></h2>";
		echo "<h2 class='col-md-12'><b>".$escuelaprofesional['nombreEscuelaProfesional']."</b></h2>";
	}
	else{
		echo "<h2><b>Lista de Modulos</b></h2>";
	}
 ?>
</div>

<div class="pull-right">
	
	<?php
		if (!empty($escuelaprofesional['nombreEscuelaProfesional'])) {
	?>
			<a href="<?php echo site_url('escuelaprofesional')?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atras</a>
			<a href="<?php echo site_url('modulo/add_modulo_by_ep/').$escuelaprofesional['idEscuelaProfesional'];?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a>
	<?php	}
		else{
	?>
			<a href="<?php echo site_url()?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Atras</a>
			<a href=" <?php echo site_url('modulo/add');?>" class="btn btn-success"><i class="fa fa-plus"></i>Agregar</a>
	<?php }
 	?>
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>Nombre del Modulo</th>
		<th>Horas por Modulo</th>
		<th>Programa de Estudios</th>
		<th>Acciones</th>
    </tr>
	<?php foreach($modulo as $m){ ?>
    <tr>
		<td><a href="<?php if(!empty($escuelaprofesional['idEscuelaProfesional'])){
			echo site_url('unidaddidactica/unidades_by_modulo/').$m['idModulo']."/".$escuelaprofesional['idEscuelaProfesional']; 
		} else {
			echo site_url('unidaddidactica/unidades_by_modulo/').$m['idModulo']."/0";}
		?>">
		<?php echo $m['nombreModulo']; ?></a></td>
		<td><?php echo $m['horasModulo']; ?></td>
		<td><?php echo $m['nombreEscuelaProfesional'];?></td>
		<td class="text-center">
			<?php if(!empty($escuelaprofesional['idEscuelaProfesional'])){?>
			<a href="<?php echo site_url('mCapacidade/mCapacidadeByModulo/'.$m['idModulo']."/".$escuelaprofesional['idEscuelaProfesional']);?>"><i class="fa fa-book" style="color:green;"></i></a>
			<?php } else {?>
			<a href="<?php echo site_url('mCapacidade/mCapacidadeByModulo/'.$m['idModulo']."/0");?>"><i class="fa fa-book" style="color:green;"></i></a>
			<?php }?>
			<a href="<?php echo site_url('modulo/edit/'.$m['idModulo']); ?>"><i class="fa fa-edit" style="color:orange"></i></a> 
            <a href="<?php echo site_url('modulo/remove/'.$m['idModulo']); ?>"><i class="fa fa-trash" style="color:darkred"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
