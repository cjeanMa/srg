$(document).ready(function(){
    $('#fechaInicioPracticas').change(function(){
        let fechaInit = $('#fechaInicioPracticas').val();
        $('#fechaFinPracticas').prop('min',fechaInit);
    })

    $('#fechaFinPracticas').change(function(){
        let fechaInit = $('#fechaFinPracticas').val();
        $('#fechaInicioPracticas').prop('max',fechaInit);
    })
})

//funcion para hacer lista enlaza de idEstudiante.carrera con modulos correspondientes
function buscar_modulos(){
    var idEst = $('#idEstudiante').val();
    if(idEst||idEst!=''){
        let data = 'idEstudiante='+idEst;
        $('#idModulo').prop('disabled',false);
        $.ajax({
            type:'POST',
            url:'../Modulo/cargarModulosEstudiante',
            data: data,
            success: function(e){
                $('#idModulo').html(e);
            }
        })
    }
    else{
        $('#idModulo').prop('disabled',true);
        $('#idModulo').val("");
        limpiarData();
        alert('Elija una carrera, para que pueda cargar los modulos correspondientes');
    }
}

//Funcion Para que active los inputs si escoge un valor de modulo

function select_modulo(){
var idModulo = $('#idModulo').val();
if(idModulo!=""){
 document.getElementById('institucion').disabled=false;
 $('#encargado').prop('disabled',false);
 $('#direccion').prop('disabled',false);
 $('#fechaInicioPracticas').prop('disabled',false);
 $('#fechaFinPracticas').prop('disabled',false);   
}
else{
    limpiarData();
}
}

function limpiarData(){
    $('#institucion').val("");
    $('#encargado').val("");
    $('#direccion').val(""); 
    $('#fechaInicioPracticas').val("");
    $('#fechaInicioPracticas').prop('max', false);
    $('#fechaFinPracticas').val(""); 
    $('#fechaFinPracticas').prop('min',false); 
    $('#institucion').prop('disabled',true);
    $('#encargado').prop('disabled',true);
    $('#direccion').prop('disabled',true); 
    $('#fechaInicioPracticas').prop('disabled',true);
    $('#fechaFinPracticas').prop('disabled',true);  
}