
  function cargarDatosSemestreAcademico(data){
    data_final = data.split("||");
    $('#upIdSemestreAcademico').val(data_final[0]);
    $('#upAnioSemestreAcademico').val(data_final[1]);
    $('#upPeriodoSemestreAcademico').val(data_final[2]);
  }

  function cargarDatosSemestre(data){
    data_final = data.split("||");
    $('#upIdSemestre').val(data_final[0]);
    $('#upRomanos').val(data_final[1]);
    $('#upNombreSemestre').val(data_final[2]);
    $('#upPreNombre').val(data_final[3]);
  }

  function cargarDatosDiscapacidad(data){
    data_final = data.split("||");
    $('#upIdDiscapacidad').val(data_final[0]);
    $('#upNombreDiscapacidad').val(data_final[1]);
  }

  function cargarDatosGenero(data){
    data_final = data.split("||");
    $('#upIdSexo').val(data_final[0]);
    $('#upNombreSexo').val(data_final[1]);
    $('#upAbreviacionSexo').val(data_final[2]);
  } 


$(document).ready(function(){

  //funciones para mandar al controlador y agregar##########################################
  
  //funcion para agregar SEmestre Academico Ajax
  $('#btnAddSemestreAcademico').click(function(){
    var anioSA = $('#anioSemestreAcademico').val();
    var periodoSA = $('#periodoSemestreAcademico').val();
    var data = "anioSA="+anioSA+"&periodoSA="+periodoSA;
    $.ajax({
        type: "POST",
        url: '../Dashboard/addSemestreAcademicoAjax',
        data: data,
        success: function(a){
            $('#table_sem_aca').html(a);
            $('#anioSemestreAcademico').val("");
            $('#periodoSemestreAcademico').val("");
        },
        error: function(){
            alert('error');
        }
    })
  })

  //funcion para agregar Semestre Ajax
  $('#btnAddSemestre').click(function(){
    var romanos = $('#romanos').val(),
        nombreSemestre = $('#nombreSemestre').val(),
        preNombre = $('#preNombre').val();
    var data = "romanos="+romanos+"&nombreSemestre="+nombreSemestre+"&preNombre="+preNombre;
      $.ajax({
          type:"POST",
          url:"../Dashboard/addSemestreAjax",
          data: data,
          success: function(a){
            $('#table_sem').html(a);
          },
          error: function(){
            alert('error al realizar la operacion');
          }
      })
  })

  //funcion para agrgar discapacidad ajax
  $('#btnAddDiscapacidad').click(function(){
    var nombreDiscapacidad = $('#nombreDiscapacidad').val();
    var data = "nombreDiscapacidad="+ nombreDiscapacidad;
    $.ajax({
      type:"POST",
      url:'../Dashboard/addDiscapacidadAjax',
      data: data,
      success: function(a){
        $('#table_discapacidad').html(a);
      },
      error: function(){
        alert('error al realizar la operacion');
      }
    })
  })

  //funcion para agragar sexo ajax
  $('#btnAddGenero').click(function(){
    var nombreSexo = $('#nombreSexo').val(),
        abreviacionSexo = $('#abreviacionSexo').val();
    var data = "nombreSexo="+nombreSexo+"&abreviacionSexo="+abreviacionSexo;
    $.ajax({
      type: "POST",
      url: '../Dashboard/addGeneroAjax',
      data: data,
      success: function(a){
        $('#table_genero').html(a);
      },
      error: function(){
        alert('error al realizar la operacion');
      }
    })
  })

  //FUNCIONES PARA ACTIUALIZAR DATOS MEDIANTE AJAX########################################

  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEMESTER ACADEMICO
  $('#btnUpdateSemestreAcademico').click(function(){
    var idSemestreAcademico = $('#upIdSemestreAcademico').val(),
        anio = $('#upAnioSemestreAcademico').val(),
        periodo = $('#upPeriodoSemestreAcademico').val();
    var data = "idSemestreAcademico="+idSemestreAcademico+"&anio="+anio+"&periodo="+periodo;
    $.ajax({
        type:"POST",
        url: '../Dashboard/updateSemestreAcademicoAjax',
        data: data,
        success:function(a){
          $('#table_sem_aca').html(a);
        },
        error:function(){
          alert("No se pudo realizar la operacion.")
        }
    })
  })  
//FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEMESTRE
  $('#btnUpdateSemestre').click(function(){
    var idSemestre = $('#upIdSemestre').val(),
        romanos = $('#upRomanos').val(),
        nombre = $('#upNombreSemestre').val(),
        prenombre = $('#upPreNombre').val(); 
    var data = "idSemestre="+idSemestre+"&romanos="+romanos+"&nombre="+nombre+"&prenombre="+prenombre;
    $.ajax({
        type: "POST",
        url: "../Dashboard/updateSemestreAjax",
        data: data,
        success: function(a){
          $('#table_sem').html(a);
        },
        error: function(){
          alert('error al realizar la operacion');
        }
    })
  })
  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR DISCAPACIDAD
  $('#btnUpdateDiscapacidad').click(function(){
    var idDiscapacidad =  $('#upIdDiscapacidad').val(),
        nombre = $('#upNombreDiscapacidad').val();
    var data = "idDiscapacidad="+idDiscapacidad+"&nombreDiscapacidad="+nombre;
    $.ajax({
      type:"POST",
      url:"../Dashboard/updateDiscapacidadAjax",
      data: data,
      success: function(a){
        $('#table_discapacidad').html(a);
      },
      error: function(){
        alert('error al realizar la operacion');
      }
    })
  })
  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEXO
  $('#btnUpdateSexo').click(function(){
    var idSexo = $('#upIdSexo').val(),
        nombre = $('#upNombreSexo').val(),
        letra = $('#upAbreviacionSexo').val();
    var data = "idSexo="+idSexo+"&nombreSexo="+nombre+"&letraSexo="+letra;
    $.ajax({
        type:"POST",
        url:"../Dashboard/updateGeneroAjax",
        data: data,
        success: function(a){
          $('#table_genero').html(a);
        },
        error: function(){
          alert('error al realizar la operacion');
        }
    })
  })

});
