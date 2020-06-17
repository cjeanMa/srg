<!-- <?php if ($semestre_academico['state_plazo_matricula']) {
  $temp_txt = "primary";
} else {
  $temp_txt = "danger";
}
?> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">SIA</li>
  </ol>
</nav>


<h2 class="text-center form-group"><b>SISTEMA DE INFORMACION ACADEMICA </b></h2>

<div class="form-group d-flex justify-content-center">

  <div class="input-group col-md-6 d-flex justify-content-center">
  	<div class="col-md-12 text-center">
  		<b>Buscar estudiante</b>
  	</div>
    <input type="text" id="idEstudiante" class="form-control bg-light " placeholder="DNI estudiante" aria-label="Search" aria-describedby="basic-addon2" value="12760003">
    <div class="input-group-append">
      <span class="btn btn-primary" id="btnBuscar" >
        <span class="fa fa-search fa-sm" > BUSCAR</span>
      </span>
    </div>
  </div>

</div>
<div class="form-group" id="loadEstudiante">

</div>
<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Semestre Academico: <b><?=$semestre_academico['anio'] . '-' . $semestre_academico['periodo'];?></b>
    Matricula del: <b><?=$semestre_academico['fechaInicio'] . ' al ' . $semestre_academico['fechaLimite'];?></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // console.log($('#idEstudiante').val());
  // matricula search student
  var temp_color='';
  temp_color='primary';
  var state_fecha='';
  // estado_plazomatricula();
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
      console.log(data);
      persona  = jQuery.parseJSON(data);
      html_head=''+
      '<table class="table table-striped">'+
        '<thead class="thead-dark">'+
            '<tr>'+
            '<th scope="col">#</th>'+
            '<th scope="col">Nombre y Apellido</th>'+
            '<th scope="col">Escuela Profesional</th>'+
            '<th scope="col">Opción</th>'+
            '</tr>'+
        '</thead>';
      html_body='<tbody>';
      persona.estudiante.forEach(function(estudiante,index ) {
        console.log(index);
        html_body+='<tr>'+
                    '<th scope="row">'+parseInt(index+1)+'</th>'+
                    '<td>'+persona.nombres+' '+persona.apellidoPaterno+' '+persona.apellidoPaterno+'</td>'+
                    '<td>'+estudiante.nombreEscuelaProfesional+'</td>'+
                    '<td>'+
                    '<span class=" btn btn-sm btn-'+temp_color+'" onclick="btnMatricular('+estudiante.idPersona+','+estudiante.idEstudiante+');">Ver</span>'+
                    '</tr>';
      });


      html_body+='</tbody>';
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
    // if (state_fecha==false) {
    //   $('#ModalCenter').modal('show');
    // }else{
      document.cookie = "idPersona="+idpersona+'; max-age=86400000; path=/';
      document.cookie = "idEstudiante="+idestudiante+'; max-age=86400000; path=/';
      window.location.href = "<?=base_url();?>sia/dashboard";
    // }
    // console.log(state_fecha);
    
    
  }
  // function estado_plazomatricula(){
  //   var semestre_academico=jQuery.parseJSON('<?=json_encode(@$semestre_academico); ?>');
  //   state_fecha=semestre_academico['state_plazo_matricula'];
  //   if (state_fecha) {
  //     temp_color='primary';
  //   }else{
  //     temp_color='danger';
  //   }
  // }


</script>
