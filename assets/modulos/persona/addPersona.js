

$(document).ready(function(){

})
//Funcion para cargar datos personales en los controladores de estudaintes y docentes
function buscar_dni(){
    var dni = $('#dni').val();
    if(!dni){
        document.getElementById('mensaje_dni').innerHTML = "<div class=' col-md alert alert-danger'>INGRESE EL NUMERO DE DNI PARA BUSCAR SUS DATOS.<div>";
        $('#dni').focus();
    }
    else{
        var data = "dni="+dni;
        $.ajax({
            type: 'POST',
            url: '../persona/cargarDatosPersonales',
            data: data,
            success: function(e){
                $('#datos_personales').html(e);
            },
            error: function(){
                document.getElementById('mensaje_dni').innerHTML = "<div class=' col-md alert alert-warning'>NO SE ENCONTRARON DATOS DE DICHA PERSONA.<div>";
            }
        })
    }
};

//Funcion para cargar datos de nombre completo e id's de estudainte mediante el dni; Para el controlador de practicas y documentos

function datos_persona_estudiante(view){
    var dni = $('#dni').val();
    if(dni){
        let data = 'idPersona='+dni+"&vista="+view;
        $.ajax({
            type:'POST',
            url:'../../ra/Estudiante/datos_basicosEstudiante_persona',
            data: data,
            success: function(e){
                $('#datos_base_practicas').html(e);    
            }
        })
    }
    else{
        alert('Ingrese el campo de DNI:');
        $('#dni').focus();
    }
}

