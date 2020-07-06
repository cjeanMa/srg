<h4>Notas</h4>
<div class="" id='estudiantes'>
</div>
<div class="text-center">
	<span class="btn btn-danger btn_guardar">Guardar</span>
</div>

<script type="text/javascript">
	var estudiantes=jQuery.parseJSON('<?=json_encode(@$estudiantes); ?>');
	var notas=new Array(); 
	
	// var filtrados = [];
	main()
	function main(){

		var html_head=''+
				'<table class="table table-striped">'+
				   '<caption>table title and/or explanatory text</caption>'+
				   '<thead class="thead-dark">'+
				      '<tr class="text-center">'+
				      	'<th>#</th>'+
				         '<th>Apellidos y Nombres</th>'+
				         '<th>Nota</th>'+
				      '</tr>'+
				   '</thead>'+
				   '<tbody>';
		var html_body='';
		var html_footer='';

	estudiantes.forEach(function(index, el) {
		console.log(index);
		// console.log(Object.entries(index)[0][0]);
		
		
      		html_body+=''+
      			'<tr>'+
      				'<td>'+(el+1)+'</td>'+
		        	'<td>'+index.apellidoPaterno+' '+index.apellidoMaterno+', '+index.nombres+'</td>'+
		        	'<td class="text-center"><input class="form-control input_nota" data-idmatricula="'+index.idMatricula+'" type="number" name="Nota" value="'+index.nota+'"></td>'+
		      	'</tr>';


	});
	html_footer='</tbody></table>';
	$('#estudiantes').html(html_head+html_body+html_footer);
	}
	$(document).on('click', '.btn_guardar', function(event) {
		var notas_status=0;
		$.each($('.input_nota'), function(index, value) { 
	      if($(value).val().trim().length == 0) { 
	       alert($(this).parent().prev().html()+' sin Nota'); 
	       // console.log();
	       // allowSubmit = false; 
	       notas_status+=1;
	      }else{
	      	notas_status+=0;
	      }
	      // notas[$(value).data('idmatricula')].push({
	      // 	idMatricula:$(value).val(),
	      // 	nota:$(value).data('idmatricula'),
	      // });
	      notas[$(value).data('idmatricula')] =$(value).val();
	      // console.log($(value).val());
	       // console.log($(value).data('idmatricula'));
	     }); 


			id_tipo_matricula=$("select#idTipoMatricula" ).val();
			console.log(id_tipo_matricula);
			$.ajax({
				url: '<?=base_url();?>'+'Nota/registro/<?=$idUnidadDodactica;?>',
				type: 'POST',
				dataType: 'json',
				data: {
					nota:notas,
				},

			})
			.done(function() {

				console.log("success");
				// window.location="<?=base_url();?>nota/matricula";
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			

		console.log(notas_status);
	});
	
	// origen.push({
	// 				distrito:'value',
	// 				direccion: direccion,
	// 				nombre:nombrecontacto,
	// 				telefono:telefono,
	// 				correo:correo,
	// 				descripcion:descripcion,
	// 				id:origen.length+1,
	// 			});
	
</script>
