<?php if ($semestre_academico['state_plazo_matricula']) {
  $temp_txt = "primary";
} else {
  $temp_txt = "danger";
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia">SIA</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url();?>sia/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Matricula</li>
  </ol>
</nav>
<div class="card  border-left-<?=$temp_txt;?> form-group">
  <div class="card-body p-2">
    Semestre Academico: <b><?=$semestre_academico['anio'] . '-' . $semestre_academico['periodo'];?></b>
    Matricula del: <b><?=$semestre_academico['fechaInicio'] . ' al ' . $semestre_academico['fechaLimite'];?></b>
  </div>
</div>
<!-- 

<h2 class="text-center form-group"><b>Matricula de estudiante</b></h2>
<div class="form-group d-flex justify-content-center">

  <div class="input-group col-md-6 d-flex justify-content-center">
    <input type="text" id="idEstudiante" class="form-control bg-light " placeholder="codigo estudiante" aria-label="Search" aria-describedby="basic-addon2" value="12760003">
    <div class="input-group-append">
      <span class="btn btn-primary" id="btnBuscar" >
        <span class="fa fa-search fa-sm" > BUSCAR</span>
      </span>
    </div>
  </div>

</div>
<div class="form-group" id="loadEstudiante">

</div>

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
      </div>
    </div>
  </div>
</div> -->
<!--  -->
<?php if ($unidaddidactica_has_matricula==NULL): ?>
  No tiene matricula para el presente semestre <a href="<?=base_url();?>sia/matricula/add" title="" class="btn btn-danger">Agregar matricula</a>
<?php else: ?>
  <h3 class="font-weight-bold text-capitalize">ficha matricula</h3>

<table class="table  table-striped table-bordered">
      <thead class="thead-dark text-capitalize text-center">
        <tr>
          <!-- <th colspan="3">Ficha de Matricula</th> -->
          <th>Unidad Didactica</th>
          <th>Credito</th>
          <th>Semestre</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($unidaddidactica_has_matricula as $key => $value): ?>
          <tr>
            <th><?=$value['nombreUnidadDidactica'];?></th>
            <td><?=$value['creditos'];?></td>
            <td><?=$value['idSemestre'];?></td>
          </tr>
        <?php endforeach ?>
        
      </tbody>
    </table>
<?php endif ?>
<!--  -->
<script type="text/javascript">
  // console.log($('#idEstudiante').val());
  // matricula search student
  var temp_color='';
  var state_fecha='';
  estado_plazomatricula();
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
                    '<td><span class=" btn btn-sm btn-'+temp_color+'" onclick="btnMatricular('+estudiante.idPersona+','+estudiante.idEstudiante+');">Matricular</span>'+
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
    if (state_fecha==false) {
      $('#ModalCenter').modal('show');
    }else{
      document.cookie = "idPersona="+idpersona+'; max-age=86400000; path=/';
      document.cookie = "idEstudiante="+idestudiante+'; max-age=86400000; path=/';
      window.location.href = "<?=base_url();?>Matricula/add/";
    }
    // console.log(state_fecha);
    
    
  }
  function estado_plazomatricula(){
    var semestre_academico=jQuery.parseJSON('<?=json_encode(@$semestre_academico); ?>');
    state_fecha=semestre_academico['state_plazo_matricula'];
    if (state_fecha) {
      temp_color='primary';
    }else{
      temp_color='danger';
    }
  }


</script>
