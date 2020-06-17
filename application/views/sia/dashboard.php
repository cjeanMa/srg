<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia">SIA</a></li>
    <!-- <li class="breadcrumb-item"><a href="#">Library</a></li> -->
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>
<div class="row">
	<div class="col-md-12">
		<table class="table  table-striped table-bordered">
			<thead class="thead-dark text-capitalize text-center">
				<tr>
					<th colspan="2">Datos del Estudiante</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Escuela Profesional:</th>
					<td><?=$estudiante['nombreEscuelaProfesional'];?></td>
				</tr>
				<tr>
					<th>Apellidos y Nombres:</th>
					<td><?=$estudiante['apellidoPaterno'].' '.$estudiante['apellidoMaterno'].', '.$estudiante['nombres'];?></td>
				</tr>
				<tr>
					<th>Docuemnto Nacional de Identidad (DNI):</th>
					<td><?=$estudiante['idPersona'];?></td>
				</tr>
				<tr>
					<th>Codigo de estudiante:</th>
					<td><?=$estudiante['idEstudiante'];?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<a href="<?=base_url();?>sia/matricula" title=""><span class="btn btn-danger">Matricula</span></a>

<span class="btn btn-danger">Notas</span>