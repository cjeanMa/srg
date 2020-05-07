<div class="row">
	<div class="col-md text-center">
	<h2><b>Lista de Programas de Estudio</b></h2>
	</div>
</div> 

<div class="row">
	<div class="col-md pull-right">
		<a href="<?php echo site_url();?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
		<a href="<?php echo site_url('escuelaprofesional/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a> 
	</div>
</div>
<hr>

<table class="table table-striped table-bordered" id="table_escuelaProfesional">
	<thead class="table-dark">
		<tr class="text-center">
			<th>Programa de Estudios</th>
			<th>Fecha de Creacion</th>
			<th>Res. de Autorizacion</th>
			<th>Fecha de Autorizacion</th>
			<th>Res. de Revalidacion</th>
			<th>Fecha de Revalidacion</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		// var_dump($escuelaprofesional);
		foreach($escuelaprofesional as $e){ ?>
		<tr>
			<td><a href='<?php echo base_url()."modulo/modulosByEp/".$e['idEscuelaProfesional']; ?>'><?php echo $e['nombreEscuelaProfesional']; ?></a></td>
			<td><?php echo $e['fechaCreacion']; ?></td>
			<td><?php echo $e['res_autorizacion']; ?></td>
			<td><?php echo $e['fecha_autorizacion']; ?></td>
			<td><?php echo $e['res_revalidacion']; ?></td>
			<td><?php echo $e['fecha_revalidacion']; ?></td>
			<td><?php 
				for($i = 0; $i<sizeof($this->disponibilidad);$i++){
					if($e['disponibilidad']==$i){
						echo $this->disponibilidad[$i];
					}
				}	
				?></td>
			<td>
				<a href="<?php echo site_url('escuelaprofesional/edit/'.$e['idEscuelaProfesional']); ?>"><i class="fa fa-edit"></i> </a> 
				<a href="<?php echo site_url('escuelaprofesional/remove/'.$e['idEscuelaProfesional']); ?>"><i class="fa fa-trash"></i> </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
