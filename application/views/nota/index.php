<h4>Unidades Didacticas</h4>
<div class="" id='unidadDidactica'>
	
</div>

<script type="text/javascript">
	var unidadDidactica=jQuery.parseJSON('<?=json_encode(@$unidadDidactica); ?>');
	// var filtrados = [];
	main()
	function main(){

		var html_head=''+
				'<table class="table table-striped">'+
				   '<caption>table title and/or explanatory text</caption>'+
				   '<thead class="thead-dark">'+
				      '<tr class="text-center">'+
				         '<th>Unidad Didactica</th>'+
				         '<th>Opcion</th>'+
				      '</tr>'+
				   '</thead>'+
				   '<tbody>';
		var html_body='';
		var html_footer='';
		// filtrados = unidadDidactica;
	// unidadDidactica.each(function(index, el) {
	// 	console.log(el);
	// });
	[unidadDidactica].forEach(function(index, el) {
		console.log(index);
		// console.log(Object.entries(index)[0][0]);
		var escuela=Object.entries(index)[0][0];
		html_body+=''+
				'<tr class="bg-dark text-white">'+
         			'<td colspan="5" class="font-weight-bold text-uppercase">'+escuela+'</td>'+
      			'</tr>';
      	index[escuela].forEach(function(ep,id){
      		html_body+=''+
      			'<tr>'+
		        	'<td>'+ep.nombreUnidadDidactica+'</td>'+
		        	'<td class="text-center"><a href="<?=base_url();?>nota/add/'+ep.idUnidadDidactica+'" class=" btn btn-success btn-sm" title="Registrar Notas">Notas</a></td>'+
		      	'</tr>';
      	});

	});
	html_footer='</tbody></table>';
	$('#unidadDidactica').html(html_head+html_body+html_footer);
	}
	
</script>
