
function cargarDatosSemestreAcademico(data) {
  data_final = data.split("||");
  $('#upIdSemestreAcademico').val(data_final[0]);
  $('#upAnioSemestreAcademico').val(data_final[1]);
  $('#upPeriodoSemestreAcademico').val(data_final[2]);
}

function cargarDatosSemestre(data) {
  data_final = data.split("||");
  $('#upIdSemestre').val(data_final[0]);
  $('#upRomanos').val(data_final[1]);
  $('#upNombreSemestre').val(data_final[2]);
  $('#upPreNombre').val(data_final[3]);
}

function cargarDatosDiscapacidad(data) {
  data_final = data.split("||");
  $('#upIdDiscapacidad').val(data_final[0]);
  $('#upNombreDiscapacidad').val(data_final[1]);
}

function cargarDatosGenero(data) {
  data_final = data.split("||");
  $('#upIdSexo').val(data_final[0]);
  $('#upNombreSexo').val(data_final[1]);
  $('#upAbreviacionSexo').val(data_final[2]);
}

function cargarDatosPlazoMatricula(data, type) {
  let data_final = data.split("||");
  if (type == "view") {
    $('#viewSemestreAcademico').val(data_final[9]);
    $('#viewFechaInicio').val(data_final[1]);
    $('#viewFechaLimite').val(data_final[2]);
    $('#viewFechaInicioRezagado').val(data_final[3]);
    $('#viewFechaLimiteRezagado').val(data_final[4]);
    $('#viewFechaInicioExtemporaneo').val(data_final[5]);
    $('#viewFechaLimiteExtemporaneo').val(data_final[6]);
  }
  else if (type == "update") {
    $('#upIdPlazoMatricula').val(data_final[0]);
    $('#upIdSemestreAcademicoPm').val(data_final[8]);
    $('#upSemestreAcademico').val(data_final[9]);
    $('#upFechaInicio').val(data_final[1]);
    $('#upFechaLimite').val(data_final[2]);
    $('#upFechaInicioRezagado').val(data_final[3]);
    $('#upFechaLimiteRezagado').val(data_final[4]);
    $('#upFechaInicioExtemporaneo').val(data_final[5]);
    $('#upFechaLimiteExtemporaneo').val(data_final[6]);
  }
}

function cargarDatosPlazoNota(data, type) {
  let data_final = data.split("||");
  if (type == "view") {
    $('#viewSemestreAcademicoPn').val(data_final[6]);
    $('#viewFechaInicioPn').val(data_final[1]);
    $('#viewFechaLimitePn').val(data_final[2]);
  }
  else if (type == "update") {
    $('#upIdPlazoNota').val(data_final[0]);
    $('#upSemestreAcademicoPn').val(data_final[6]);
    $('#upIdSemestreAcademicoPn').val(data_final[5]);
    $('#upFechaInicioPn').val(data_final[1]);
    $('#upFechaLimitePn').val(data_final[2]);
  }
}


$(document).ready(function () {

  //funciones para mandar al controlador y agregar##########################################

  //funcion para agregar SEmestre Academico Ajax
  $('#btnAddSemestreAcademico').click(function () {
    var anioSA = $('#anioSemestreAcademico').val();
    var periodoSA = $('#periodoSemestreAcademico').val();
    var data = "anioSA=" + anioSA + "&periodoSA=" + periodoSA;
    $.ajax({
      type: "POST",
      url: '../Dashboard/addSemestreAcademicoAjax',
      data: data,
      success: function (a) {
        $('#table_sem_aca').html(a);
        $('#anioSemestreAcademico').val("");
        $('#periodoSemestreAcademico').val("");
      },
      error: function () {
        alert('error');
      }
    })
  })

  //funcion para agregar Semestre Ajax
  $('#btnAddSemestre').click(function () {
    var romanos = $('#romanos').val(),
      nombreSemestre = $('#nombreSemestre').val(),
      preNombre = $('#preNombre').val();
    var data = "romanos=" + romanos + "&nombreSemestre=" + nombreSemestre + "&preNombre=" + preNombre;
    $.ajax({
      type: "POST",
      url: "../Dashboard/addSemestreAjax",
      data: data,
      success: function (a) {
        $('#table_sem').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })


  //FUNCION PARA AÑADIR PLAZO MATRICULA
  $('#btnAddPlazoMatricula').click(function () {
    let sa = [$('#idSemestreAcademico').val(),
    $('#fechaInicio').val(),
    $('#fechaLimite').val(),
    $('#fechaInicioRezagado').val(),
    $('#fechaLimiteRezagado').val(),
    $('#fechaInicioExtemporaneo').val(),
    $('#fechaLimiteExtemporaneo').val()];
    state = 0;
    //Para verificar que ningun input este vacio
    sa.forEach(function (elementos) {
      if (elementos == "") {
        state = 1;
      }
    })
    if (state == 1)
      alert("INGRESE TODOS LOS CAMPOS");
    else {
      let data = "idSemestre=" + sa[0] + "&fechaInicio=" + sa[1] + "&fechaLimite=" + sa[2] + "&fechaInicioRezagado=" + sa[3] + "&fechaLimiteRezagado=" + sa[4] + "&fechaInicioExtemporaneo=" + sa[5] + "&fechaLimiteExtemporaneo=" + sa[6];
      $.ajax({
        type: 'POST',
        url: "../Dashboard/addPlazoMatriculaAjax",
        data: data,
        success: function (e) {
          $('#table_plazoMatricula').html(e);
        },
      })
    }

  })

  //FUNCION PARA AÑADIR PLAZO NOTA
  $('#btnAddPlazoNota').click(function () {
    let sa = [$('#idSemestreAcademicoPn').val(),
    $('#fechaInicioPn').val(),
    $('#fechaLimitePn').val(),];
    state = 0;
    //Para verificar que ningun input este vacio
    sa.forEach(function (elementos) {
      if (elementos == "") {
        state = 1;
      }
    })
    if (state == 1)
      alert("INGRESE TODOS LOS CAMPOS");
    else {
      let data = "idSa=" + sa[0] + "&fi=" + sa[1] + "&fl=" + sa[2];
        $.ajax({
          type: 'POST',
          url: "../Dashboard/addPlazoNotaAjax",
          data: data,
          success: function (e) {
            $('#table_plazoNota').html(e);
          },
        })
    }

  })


  //funcion para agrgar discapacidad ajax
  $('#btnAddDiscapacidad').click(function () {
    var nombreDiscapacidad = $('#nombreDiscapacidad').val();
    var data = "nombreDiscapacidad=" + nombreDiscapacidad;
    $.ajax({
      type: "POST",
      url: '../Dashboard/addDiscapacidadAjax',
      data: data,
      success: function (a) {
        $('#table_discapacidad').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })

  //funcion para agragar sexo ajax
  $('#btnAddGenero').click(function () {
    var nombreSexo = $('#nombreSexo').val(),
      abreviacionSexo = $('#abreviacionSexo').val();
    var data = "nombreSexo=" + nombreSexo + "&abreviacionSexo=" + abreviacionSexo;
    $.ajax({
      type: "POST",
      url: '../Dashboard/addGeneroAjax',
      data: data,
      success: function (a) {
        $('#table_genero').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })

  //FUNCIONES PARA ACTIUALIZAR DATOS MEDIANTE AJAX########################################

  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEMESTER ACADEMICO
  $('#btnUpdateSemestreAcademico').click(function () {
    var idSemestreAcademico = $('#upIdSemestreAcademico').val(),
      anio = $('#upAnioSemestreAcademico').val(),
      periodo = $('#upPeriodoSemestreAcademico').val();
    var data = "idSemestreAcademico=" + idSemestreAcademico + "&anio=" + anio + "&periodo=" + periodo;
    $.ajax({
      type: "POST",
      url: '../Dashboard/updateSemestreAcademicoAjax',
      data: data,
      success: function (a) {
        $('#table_sem_aca').html(a);
      },
      error: function () {
        alert("No se pudo realizar la operacion.")
      }
    })
  })

  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEMESTRE
  $('#btnUpdateSemestre').click(function () {
    var idSemestre = $('#upIdSemestre').val(),
      romanos = $('#upRomanos').val(),
      nombre = $('#upNombreSemestre').val(),
      prenombre = $('#upPreNombre').val();
    var data = "idSemestre=" + idSemestre + "&romanos=" + romanos + "&nombre=" + nombre + "&prenombre=" + prenombre;
    $.ajax({
      type: "POST",
      url: "../Dashboard/updateSemestreAjax",
      data: data,
      success: function (a) {
        $('#table_sem').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })


  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR PLAZO DE MATRICULAS
  $('#btnUpdatePlazoMatricula').click(function () {
    let pm = [$('#upIdPlazoMatricula').val(),
    $('#upIdSemestreAcademicoPm').val(),
    $('#upFechaInicio').val(),
    $('#upFechaLimite').val(),
    $('#upFechaInicioRezagado').val(),
    $('#upFechaLimiteRezagado').val(),
    $('#upFechaInicioExtemporaneo').val(),
    $('#upFechaLimiteExtemporaneo').val()];
    var data = "idPm=" + pm[0] + "&idSa=" + pm[1] + "&fi=" + pm[2] + "&fl=" + pm[3] + "&fir=" + pm[4] + "&flr=" + pm[5] + "&fie=" + pm[6] + "&fle=" + pm[7];
    $.ajax({
      type: "POST",
      url: "../Dashboard/updatePlazoMatriculaAjax",
      data: data,
      success: function (a) {
        $('#table_plazoMatricula').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })

  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR PLAZO DE NOTAS
  $('#btnUpdatePlazoNota').click(function () {
    let pm = [$('#upIdPlazoNota').val(),
    $('#upIdSemestreAcademicoPn').val(),
    $('#upFechaInicioPn').val(),
    $('#upFechaLimitePn').val()];
    var data = "idPn=" + pm[0] + "&idSa=" + pm[1] + "&fi=" + pm[2] + "&fl=" + pm[3];
    $.ajax({
      type: "POST",
      url: "../Dashboard/updatePlazoNotaAjax",
      data: data,
      success: function (a) {
        $('#table_plazoNota').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })

  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR DISCAPACIDAD
  $('#btnUpdateDiscapacidad').click(function () {
    var idDiscapacidad = $('#upIdDiscapacidad').val(),
      nombre = $('#upNombreDiscapacidad').val();
    var data = "idDiscapacidad=" + idDiscapacidad + "&nombreDiscapacidad=" + nombre;
    $.ajax({
      type: "POST",
      url: "../Dashboard/updateDiscapacidadAjax",
      data: data,
      success: function (a) {
        $('#table_discapacidad').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })
  //FUNCION PARA MANDAR DATOS Y ACTUALIZAR SEXO
  $('#btnUpdateSexo').click(function () {
    var idSexo = $('#upIdSexo').val(),
      nombre = $('#upNombreSexo').val(),
      letra = $('#upAbreviacionSexo').val();
    var data = "idSexo=" + idSexo + "&nombreSexo=" + nombre + "&letraSexo=" + letra;
    $.ajax({
      type: "POST",
      url: "../Dashboard/updateGeneroAjax",
      data: data,
      success: function (a) {
        $('#table_genero').html(a);
      },
      error: function () {
        alert('error al realizar la operacion');
      }
    })
  })

});
