

$(document).ready(function(){

})

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