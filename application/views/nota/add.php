<h4>Notas</h4>
<div class="" id='estudiantes'>
	
</div>

<script type="text/javascript">
	var estudiantes=jQuery.parseJSON('<?=json_encode(@$estudiantes); ?>');
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
		        	'<td class="text-center"><input class="form-control" type="number" name="Nota"></td>'+
		      	'</tr>';


	});
	html_footer='</tbody></table>';
	$('#estudiantes').html(html_head+html_body+html_footer);
	}
	
</script>
