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
