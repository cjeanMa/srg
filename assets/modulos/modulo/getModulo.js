//funcion para hacer lista enlaza de idEstudiante.carrera con modulos correspondientes
function buscar_modulos(){
        var idEst = $('#idEstudiante').val();
        if(idEst||idEst!=''){
            let data = 'idEstudiante='+idEst;
            $.ajax({
                type:'POST',
                url:'../Modulo/cargarModulosEstudiante',
                data: data,
                success: function(e){
                    $('#modulos').html(e);
                }
            })
        }
        else{
            alert('Elija una carrera, para que pueda cargar los modulos correspondientes');
        }
    }

function select_modulo(){
    var idModulo = $('#idModulo').val();
    if(idModulo!=""){
     document.getElementById('institucion').disabled=false;
     $('#encargado').prop('disabled',false);
     $('#direccion').prop('disabled',false);   
    }
    else{
        $('#institucion').prop('disabled',true);
        $('#encargado').prop('disabled',true);
        $('#direccion').prop('disabled',true); 
    }
}