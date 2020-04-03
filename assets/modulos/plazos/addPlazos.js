$(document).ready(function(){
    $('#fechaInicio').change(function(){
        let valor = $(this).val();
        $('#fechaLimite').attr({
                        'min':valor,
                        'disabled':false,
                    });
    });

    $('#fechaLimite').change(function(){
        let valor = $(this).val();
        $('#fechaInicio').attr({
                        'max' : valor,
                    });
        $('#fechaInicioRezagado').attr({
                        'min' : valor,
                        'disabled' : false,
                    })
    });

    
    $('#fechaInicioRezagado').change(function(){
        let valor = $(this).val();
        $('#fechaLimite').attr({
                        'max' : valor,
                    });
        $('#fechaLimiteRezagado').attr({
                        'min': valor,
                        'disabled': false,
                    });
    });


    

    $('#fechaLimiteRezagado').change(function(){
        let valor = $(this).val();
        $('#fechaInicioRezagado').attr({
                        'max' : valor,
                    });
        $('#fechaInicioExtemporaneo').attr({
                        'min' : valor,
                        'disabled' : false,
                    })
    });
    $('#fechaInicioExtemporaneo').change(function(){
        let valor = $(this).val();
        $('#fechaLimiteRezagado').attr({
                        'max' : valor,
                    });
        $('#fechaLimiteExtemporaneo').attr({
                        'min': valor,
                        'disabled': false,
                    });
    });


})


/*
function compFechas(){
    let auxTime = document.getElementById('fechaInicio').value.split('-');
    let dateInit = new Date(parseInt(auxTime[0]),parseInt(auxTime[1]-1),parseInt(auxTime[2]));
        auxTime = document.getElementById('fechaLimite').value.split('-')
    let dateEnd = new Date(parseInt(auxTime[0]),parseInt(auxTime[1]-1),parseInt(auxTime[2]));
    if(!isNaN(dateInit) && !isNaN(dateEnd)){
        if(dateInit > dateEnd){
            confirm('No existe coherencia en las fechas de Inicio y Limite, desea continuar con la modificacion?');
            document.getElementById('fechaInicio').focus();
            }
        }
    else{
        if(isNaN(dateInit)){
            document.getElementById('fechaInicio').focus();
        }
        else{
            document.getElementById('fechaLimite').focus();
        }
    }
}*/
