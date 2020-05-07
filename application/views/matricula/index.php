<!-- <div class="pull-right">
	<a href="<?php echo site_url('matricula/add'); ?>" class="btn btn-success">Add</a> 
</div> -->

<!-- <table class="table table-striped table-bordered">
    <tr>
		<th>IdMatricula</th>
		<th>IdSemestreAcademico</th>
		<th>Nota</th>
		<th>NotaLetra</th>
		<th>FechaMatricula</th>
		<th>Observacion</th>
		<th>IdEstudiante</th>
		<th>IdEstado</th>
		<th>IdEstadoModular</th>
		<th>Tipo Matricula IdTipo Matricula</th>
		<th>Actions</th>
    </tr>
	<?php foreach($matricula as $m){ ?>
    <tr>
		<td><?php echo $m['idMatricula']; ?></td>
		<td><?php echo $m['idSemestreAcademico']; ?></td>
		<td><?php echo $m['nota']; ?></td>
		<td><?php echo $m['notaLetra']; ?></td>
		<td><?php echo $m['fechaMatricula']; ?></td>
		<td><?php echo $m['observacion']; ?></td>
		<td><?php echo $m['idEstudiante']; ?></td>
		<td><?php echo $m['idEstado']; ?></td>
		<td><?php echo $m['idEstadoModular']; ?></td>
		<td><?php echo $m['tipo_Matricula_idTipo_Matricula']; ?></td>
		<td>
            <a href="<?php echo site_url('matricula/edit/'.$m['idMatricula']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('matricula/remove/'.$m['idMatricula']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
 -->
 <h2 class="text-center form-group"><b>Matricula de estudiante</b></h2>

 <div class="form-group d-flex justify-content-center">

		<div class="input-group col-md-6 d-flex justify-content-center">
              <input type="text" id="idEstudiante" class="form-control bg-light " placeholder="codigo estudiante" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <span class="btn btn-primary" id="btnBuscar" >
                  <span class="fa fa-search fa-sm" > BUSCAR</span>
                </span>
              </div>
            </div>

	</div>
<div class="form-group" id="loadEstudiante">
	
</div>
 <script type="text/javascript">
  // console.log($('#idEstudiante').val());
  // matricula search student
  console.log('temp1');
  var persona;
  $(document).on('click', '#btnBuscar', function() {
    // event.preventDefault();
    console.log('12760003');
    $('#loadEstudiante').html('');
    /* Act on the event */
    temp = $('#idEstudiante').val();
    console.log(temp);
    $.ajax({
      url: '<?=base_url();?>'+'Matricula/searchEstudiante/',
      type: 'POST',
      // dataType: 'json',
      data: {id: temp},
    })
    .done(function(data) {
      // console.log("success");
      // console.log(data);
      persona  = jQuery.parseJSON(data);
      html_head='<table class="table table-striped">'+
            '<thead class="thead-dark">'+
              '<tr>'+
                '<th scope="col">#</th>'+
                '<th scope="col">Nombre y Apellido</th>'+
                '<th scope="col">Semestre</th>'+
                '<th scope="col">Opción</th>'+
              '</tr>'+
            '</thead>';

      html_body='<tbody>'+
                  '<tr>'+
                    '<th scope="row">1</th>'+
                    '<td>'+persona.nombres+' '+persona.apellidoPaterno+' '+persona.apellidoPaterno+'</td>'+
                    '<td>'+(persona.idEscuelaProfesional?persona.idEscuelaProfesional:'NULL')+'</td>'+
                    '<td><span class=" btn btn-sm btn-primary" onclick="btnMatricular('+persona.idPersona+','+persona.idEstudiante+');">Matricular</span>'+
                  '</tr>'+
                '</tbody>';
       html_footer='</table>';
       $('#loadEstudiante').html(html_head+html_body+html_footer);

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  });
  function btnMatricular(idpersona,idestudiante){
    document.cookie = "idPersona="+idpersona;
    document.cookie = "idEstudiante="+idestudiante;
    window.location.href = "<?=base_url();?>Matricula/add/"+idpersona;
  }

 
  
</script>
