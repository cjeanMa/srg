$(document).ready(function(){

    //calculo de maximos y minimos al cargar la pagina

    let valorfi = $('#fechaInicio').val(),
        valorfl = $('#fechaLimite').val(),
        valorfir = $('#fechaInicioRezagado').val(),
        valorflr = $('#fechaLimiteRezagado').val(),
        valorfie = $('#fechaInicioExtemporaneo').val(),
        valorfle = $('#fechaLimiteExtemporaneo').val();

        $('#fechaInicio').attr({
            'max' : valorfl,
                     });

        $('#fechaLimite').attr({
            'min':valorfi,
            'max':valorfir,
                    });
        
        $('#fechaInicioRezagado').attr({
            'min' : valorfl,
            'max' : valorflr,
                     });

        $('#fechaLimiteRezagado').attr({
            'min': valorfir,
            'max': valorfie
                    });

        $('#fechaInicioExtemporaneo').attr({
            'min': valorflr,
            'max': valorfle,
                    });

        $('#fechaLimiteExtemporaneo').attr({
            'min': valorfie,
                    });
   
    //funciones que modifican valores minimos y maximos dependiendo al cambio que se les realice

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
