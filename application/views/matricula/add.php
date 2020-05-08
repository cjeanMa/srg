<!-- <?php echo form_open('matricula/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="idSemestreAcademico" class="col-md-4 control-label">IdSemestreAcademico</label>
		<div class="col-md-8">
			<input type="text" name="idSemestreAcademico" value="<?php echo $this->input->post('idSemestreAcademico'); ?>" class="form-control" id="idSemestreAcademico" />
		</div>
	</div>
	<div class="form-group">
		<label for="nota" class="col-md-4 control-label">Nota</label>
		<div class="col-md-8">
			<input type="text" name="nota" value="<?php echo $this->input->post('nota'); ?>" class="form-control" id="nota" />
		</div>
	</div>
	<div class="form-group">
		<label for="notaLetra" class="col-md-4 control-label">NotaLetra</label>
		<div class="col-md-8">
			<input type="text" name="notaLetra" value="<?php echo $this->input->post('notaLetra'); ?>" class="form-control" id="notaLetra" />
		</div>
	</div>
	<div class="form-group">
		<label for="fechaMatricula" class="col-md-4 control-label">FechaMatricula</label>
		<div class="col-md-8">
			<input type="text" name="fechaMatricula" value="<?php echo $this->input->post('fechaMatricula'); ?>" class="form-control" id="fechaMatricula" />
		</div>
	</div>
	<div class="form-group">
		<label for="observacion" class="col-md-4 control-label">Observacion</label>
		<div class="col-md-8">
			<input type="text" name="observacion" value="<?php echo $this->input->post('observacion'); ?>" class="form-control" id="observacion" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstudiante" class="col-md-4 control-label">IdEstudiante</label>
		<div class="col-md-8">
			<input type="text" name="idEstudiante" value="<?php echo $this->input->post('idEstudiante'); ?>" class="form-control" id="idEstudiante" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstado" class="col-md-4 control-label">IdEstado</label>
		<div class="col-md-8">
			<input type="text" name="idEstado" value="<?php echo $this->input->post('idEstado'); ?>" class="form-control" id="idEstado" />
		</div>
	</div>
	<div class="form-group">
		<label for="idEstadoModular" class="col-md-4 control-label">IdEstadoModular</label>
		<div class="col-md-8">
			<input type="text" name="idEstadoModular" value="<?php echo $this->input->post('idEstadoModular'); ?>" class="form-control" id="idEstadoModular" />
		</div>
	</div>
	<div class="form-group">
		<label for="tipo_Matricula_idTipo_Matricula" class="col-md-4 control-label">Tipo Matricula IdTipo Matricula</label>
		<div class="col-md-8">
			<input type="text" name="tipo_Matricula_idTipo_Matricula" value="<?php echo $this->input->post('tipo_Matricula_idTipo_Matricula'); ?>" class="form-control" id="tipo_Matricula_idTipo_Matricula" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?> -->
<div class="row">
	<div class="col-md-12  form-group">
		<div class="float-left">
			<?=$plazo_matricula['idSemestreAcademico'];?>
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
	
    	var semestre_escuela=jQuery.parseJSON('<?=json_encode(@$semestre); ?>');
		var all_unidades=jQuery.parseJSON('<?=json_encode(@$all_unidades); ?>');
		var estudiante=jQuery.parseJSON('<?=json_encode(@$estudiante); ?>');
		var plazo_matricula=jQuery.parseJSON('<?=json_encode(@$plazo_matricula); ?>');
		
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
		      creditos-=parseFloat(all_unidades[id_unidadDidactica].creditos);
		      cursos_selecionados=remover_curso( cursos_selecionados,id_unidadDidactica);
		    }else{
		      $(this).removeClass('fa-square').addClass('fa-check-square selecionado');
		      creditos+=parseFloat(all_unidades[id_unidadDidactica].creditos);
		      cursos_selecionados.push(id_unidadDidactica);
		    }
		  
		  console.log(cursos_selecionados);
		  console.log(creditos);
		});
		var id_tipo_matricula='';
		$(document).on('click', '#btn_matricular', function(event) {
			id_tipo_matricula=$( "select#idTipoMatricula" ).val();
			$.ajax({
				url: '<?=base_url();?>'+'Matricula/add/<?=$idpersona;?>',
				type: 'POST',
				dataType: 'json',
				data: {
					cursos: cursos_selecionados,
					idSemestreAcademico:plazo_matricula['idSemestreAcademico'],
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