<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia">SIA</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia/matricula">Matricula</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar Matricula</li>
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
			</tbody>
		</table>
	</div>


	<div class="col-md-12  form-group">
		<div class="float-left">
			<?=$semestre_academico['idSemestreAcademico'];?>
		</div>
		<div class="float-left">
					<label>Tipo de matricula</label>
					<select name="idTipoMatricula" id="idTipoMatricula" class="form-control">
						<?php
						echo (empty($tipo_matricula)?'<option value="">Sin datos, agrege datos en tabla TipoMatricula</option>':'<option value="">--Seleccione--</option>');
						foreach($tipo_matricula as $tipo_m)
						{
							$selected = ($tipo_m['idTipoMatricula'] == $this->input->post('tipo_Matricula_idTipo_Matricula')) ? ' selected="selected"' : "";
							echo '<option value="'.$tipo_m['idTipoMatricula'].'" '.$selected.'>'.$tipo_m['nombre'].'</option>';
						} 
						?>
					</select>
				</div>
		<div class="float-right ">
			<span class="btn btn-primary" id="btn_matricular">Matricular</span>
		</div>
	</div>
</div>

<div class="com-md-12" id="cursos">

</div>
<script type="text/javascript" charset="utf-8" async defer>
	
    	var semestre_escuela=jQuery.parseJSON('<?=json_encode(@$data['cursos_x_semestre']); ?>');
		var cursos_escuela=jQuery.parseJSON('<?=json_encode(@$data['cursos_escuela']); ?>');
		var estudiante=jQuery.parseJSON('<?=json_encode(@$estudiante); ?>');
		var semestre_academico=jQuery.parseJSON('<?=json_encode(@$semestre_academico); ?>');
		
		// var tipo_matricula=jQuery.parseJSON('<?=json_encode(@$tipo_matricula); ?>');
		// var unidadesDidacticas;
console.log(estudiante);
		var semestres=semestre_escuela.sort(function(a, b) {
		  return a.prenombre - b.prenombre;
		});
		  html_head='';
		  html_body='';
		  html_unidad='';
		  html_semestre='';
		   html_head='<table class="table table-striped">'+
		                '<caption>table title and/or explanatory text</caption>'+
		                '<thead class="thead-dark">'+
		                  '<tr class="text-center">'+
		                    '<th>unidad didactica</th>'+
		                    '<th>semestre</th>'+
		                    '<th>credito</th>'+
		                    '<th>horas</th>'+
		                    '<th>accion</th>'+
		                  '</tr>'+
		                '</thead>'+
		                '<tbody>';
		    semestres.forEach(function(semestre){
		      html_semestre='<tr class="bg-dark text-white">'+
		                    '<td colspan="5" class="font-weight-bold text-uppercase">Semestre '+semestre.romanos+'</td>'+
		                    '<!-- <td colspan="" rowspan="" headers=""></td> -->'+
		                  '</tr>';
		      // console.log(semestre.nombre);
		      semestre.unidadDidacticas.forEach(function(unidadDidactica){
		        // console.log(unidadDidactica.nombreUnidadDidactica);
		        html_unidad+='<tr>'+
		                    '<td>'+unidadDidactica.nombreUnidadDidactica+'</td>'+
		                    '<td class="text-center">'+unidadDidactica.idSemestre+'</td>'+
		                    '<td class="text-center">'+unidadDidactica.creditos+'</td>'+
		                    '<td class="text-center">'+unidadDidactica.horasunidad+'</td>'+
		                    '<td class="text-center">'+
		                      '<span data-id="'+unidadDidactica.idUnidadDidactica+'" class="seleccionar far fa-2x fa-square"></span>'+
		                    '</td>'+
		                  '</tr>';
		      });
		      html_body+=html_semestre+html_unidad;
		      html_unidad='';
		    });


		                  
		                  
		    html_footer=  '</tbody>'+
		                  '</table>';
		    $('#cursos').html(html_head+html_body+html_footer);
		    
		var creditos=0;
		var cursos_selecionados= [];
		var id_unidadDidactica='';
		$(document).on('click', '.seleccionar', function(event) {
		  	id_unidadDidactica = $(this).data('id');
		  
		  
		    if($(this).hasClass("selecionado")){
		      $(this).removeClass('fa-check-square selecionado').addClass('fa-square');
		      creditos-=parseFloat(cursos_escuela[id_unidadDidactica].creditos);
		      cursos_selecionados=remover_curso( cursos_selecionados,id_unidadDidactica);
		    }else{
		      $(this).removeClass('fa-square').addClass('fa-check-square selecionado');
		      creditos+=parseFloat(cursos_escuela[id_unidadDidactica].creditos);
		      cursos_selecionados.push(id_unidadDidactica);
		    }
		  
		  console.log(cursos_selecionados);
		  console.log(creditos);
		});
		var id_tipo_matricula='';
		$(document).on('click', '#btn_matricular', function(event) {
			id_tipo_matricula=$("select#idTipoMatricula" ).val();
			console.log(id_tipo_matricula);
			$.ajax({
				url: '<?=base_url();?>'+'Matricula/add/',
				type: 'POST',
				dataType: 'json',
				data: {
					cursos: cursos_selecionados,
					idSemestreAcademico:semestre_academico['idSemestreAcademico'],
					idEstudiante:estudiante['idEstudiante'],
					idTipo_Matricula:id_tipo_matricula,
					observacion:'',

				},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});


		// Elimina cursos selecionados
		function remover_curso( arr, item ) {
		    return arr.filter( function( e ) {
		        return e !== item;
		    } );
		};
		 
	

</script>