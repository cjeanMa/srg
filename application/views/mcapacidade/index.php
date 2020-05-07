<?php if(!empty($modulo['idModulo'])){ ?>

	<div class="row text-center">
		<div class="col-md-12">
			<h2><b>Lista de Capacidades del Modulo</b></h2>
		</div>
		<div class="col-md-12">
			<h2><b><?php echo $modulo['nombreModulo'];?></b></h2>
		</div>
	</div>
	<div class="pull-right">
			<?php if($escuelaProfesional['idEscuelaProfesional'] != 0){ ?>
			<a href="<?php echo site_url('modulo/modulosByEp/'.$escuelaProfesional['idEscuelaProfesional']);?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('mcapacidade/addByModulo/'.$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional']); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
			<?php } else {?>
			<a href="<?php echo site_url('modulo');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
			<a href="<?php echo site_url('mcapacidade/addByModulo/'.$modulo['idModulo']."/0"); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
			<?php }?>
	</div>
	<hr>
<?php } else{ ?>
			<div class="row">
			<div class="col-md text-center">
				<h2><b>Lista de Capacidades</b></h2>
				</div>
			</div>

			<div class="pull-right">
				<a href="<?php echo site_url('modulo');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Modulos</a>
				<a href="<?php echo site_url('mcapacidade/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
			</div>
			<hr>

<?php }?>
<table class="table table-striped table-bordered" id="table_mCapacidades">
	<thead class="table-dark">
		<tr class="text-center">
			<th>Capacidad</th>
			<th>Modulo</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($mcapacidades as $m){ ?>
		<tr>
			<td><?php echo $m['nombreMcapacidades']; ?></td>
			<td><?php echo $m['idModulo']; ?></td>
			<td class="text-center">
				<?php if (!empty($modulo['idModulo'])){
					if($escuelaProfesional['idEscuelaProfesional'] != 0){?>
						<a href="<?php echo site_url('mcapacidade/editByModulo/'.$m['idMcapacidades']."/".$modulo['idModulo']."/".$escuelaProfesional['idEscuelaProfesional']); ?>"><i class="fa fa-edit"></i> </a>					
					<?php }else{ ?>
						<a href="<?php echo site_url('mcapacidade/editByModulo/'.$m['idMcapacidades']."/".$modulo['idModulo']."/0"); ?>"><i class="fa fa-edit"></i> </a>  
				<?php }} else {?>
					<a href="<?php echo site_url('mcapacidade/edit/'.$m['idMcapacidades']); ?>"><i class="fa fa-edit"></i> </a> 
				<?php }?>
				<a href="<?php echo site_url('mcapacidade/remove/'.$m['idMcapacidades']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script>
	$(document).ready(function(){
    	$('#table_mcapacidades').DataTable();
	} );

</script>
