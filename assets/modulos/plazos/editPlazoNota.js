$(document).ready(function(){

    //calculo de maximos y minimos al cargar la pagina

    let valorfi = $('#fechaInicio').val(),
        valorfl = $('#fechaLimite').val();

        $('#fechaInicio').attr({
            'max' : valorfl,
                     });

        $('#fechaLimite').attr({
            'min':valorfi,
                    });
    });
   
    //funciones que modifican valores minimos y maximos dependiendo al cambio que se les realice

    $('#fechaInicio').change(function(){
        let valor = $(this).val();
        $('#fechaLimite').attr({
                        'min':valor,
                    });
    });

    $('#fechaLimite').change(function(){
        let valor = $(this).val();
        $('#fechaInicio').attr({
                        'max' : valor,
                    });
    });