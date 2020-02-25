	<div class="row">

	<?php if(!empty($modulo['idModulo'])){?>
		<div class="col-md-12 text-center">
			<h2><b>Lista Unidades didacticas del Modulo </b></h2>
		</div>
		<div class="col-md-12 text-center">
			<h2><b><?php echo $modulo['nombreModulo']; ?></b></h2>
		</div>
	<?php } else {?>
		<div class="col-md-12 text-center">
			<h2><b>Lista Unidades didacticas</b></h2>
		</div>
	<?php }?>
	</div>

	<div class="pull-right">
		<?php if(!empty($modulo['idModulo'])&&!empty($escuelaProfesional['idEscuelaProfesional'])){?>
			<a href="<?php echo site_url('modulo/modulosByEp/').$escuelaProfesional['idEscuelaProfesional'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('unidaddidactica/add_unidad_by_modulo/').$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional']; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
		<?php } elseif(!empty($modulo['idModulo'])) { ?>
			<a href="<?php echo site_url('modulo/');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('unidaddidactica/add_unidad_by_modulo/').$modulo['idModulo']."/0"; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
		<?php } else {?>
			<a href="<?php echo site_url('');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('unidaddidactica/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
		<?php } ?>
	</div>

<hr>
<table class="table table-striped table-bordered">
    <tr class="text-center">
		<th>Unidad Didactica</th>
		<th>Creditos</th>
		<th>Horas</th>
		<th>Semestre</th>
		<th>Modulo</th>
		<th>Acciones</th>
    </tr>
	<?php foreach($unidaddidactica as $u){ ?>
    <tr>
		<td><?php echo $u['nombreUnidadDidactica']; ?></td>
		<td><?php echo $u['creditos']; ?></td>
		<td><?php echo $u['horasunidad']; ?></td>
		<td><?php echo $u['idSemestre']; ?></td>
		<td><?php echo $u['idModulo']; ?></td>
		<td class="text-center">
            <a href="<?php echo site_url('unidaddidactica/edit/'.$u['idUnidadDidactica']); ?>"><i class="fa fa-edit" style="color:orange;"></i> </a> 
            <a href="<?php echo site_url('unidaddidactica/remove/'.$u['idUnidadDidactica']); ?>"><i class="fa fa-trash" style="color:darkred;"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
