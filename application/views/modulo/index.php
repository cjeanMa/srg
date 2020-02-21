
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
			echo "<a href='".site_url('modulo/add_modulo_by_ep/').$escuelaprofesional['idEscuelaProfesional']."' class='btn btn-success'>Agregar</a>";
		}
		else{
			echo "<a href='".site_url('modulo/add')."' class='btn btn-success'>Agregar</a>";
		}
 	?>

	
</div>
<hr>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdModulo</th>
		<th>NombreModulo</th>
		<th>HorasModulo</th>
		<th>IdEscuelaProfesional</th>
		<th>Actions</th>
    </tr>
	<?php foreach($modulo as $m){ ?>
    <tr>
		<td><?php echo $m['idModulo']; ?></td>
		<td><?php echo $m['nombreModulo']; ?></td>
		<td><?php echo $m['horasModulo']; ?></td>
		<td><?php echo $m['idEscuelaProfesional']; ?></td>
		<td>
            <a href="<?php echo site_url('modulo/edit/'.$m['idModulo']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('modulo/remove/'.$m['idModulo']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
        </td>
    </tr>
	<?php } ?>
</table>
