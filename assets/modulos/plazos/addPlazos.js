$(document).ready(function(){

    //Funciones para el modal de add Nuevo Plazo Matricula
    $('#idSemestreAcademico').change(function(){
        let valor = $(this).val();
        if(valor != "" || valor!= 0){
            statefi(1);
        }
        else{
            statefi(0);
            statefl(0);
            statefir(0);
            stateflr(0);
            statefie(0);
            statefle(0);
        }
    })

    $('#fechaInicio').change(function(){
        let valor = $(this).val();
        if(valor != "" || valor != 0){
            statefl(1);
        }
        else{
            statefl(0);
            statefir(0);
            stateflr(0);
            statefie(0);
            statefle(0);
        }
    });

    $('#fechaLimite').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            statefir(1);
        }
        else{
            statefir(0);
            stateflr(0);
            statefie(0);
            statefle(0);
        }
    });
    
    $('#fechaInicioRezagado').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            stateflr(1);
        }
        else{
            stateflr(0);
            statefie(0);
            statefle(0);
        }
    });

    $('#fechaLimiteRezagado').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            statefie(1);
        }
        else{
            statefie(0);
            statefle(0);
        }
    });
    $('#fechaInicioExtemporaneo').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            statefle(1);
        }
        else{
            statefle(0);
        }
    });
    
    $('#idSemestreAcademicoPn').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            statefiNota(1);
        }
        else{
            statefiNota(0);
            stateflNota(0);
        }
    });

    $('#fechaInicioPn').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            stateflNota(1);
        }
        else{
            stateflNota(0);
        }
    });

    $('#fechaLimitePn').change(function(){
        let valor = $(this).val();
        if(valor != 0 || valor != ""){
            $('#fechaInicioPn').attr({
                'max' : valor,
            });
        }
        else{
            $('#fechaInicioPn').attr({
                'max' : false,
            });
        }
    })

})
    function statefi(val){
        if(val == 1){
            $('#fechaInicio').attr({
                'disabled': false
            });
        }
        else if(val == 0){
            $('#fechaInicio').val("");
            $('#fechaInicio').attr({
                'disabled': true,
                'max':false,
            })
        }
    }


    function statefl(val){
        switch(val){
            case 1:
                let aux = $('#fechaInicio').val();
                $('#fechaLimite').attr({
                    'disabled': false,
                    'min': aux,
                })
                break;
            case 0:
                $('#fechaInicio').attr({
                    'max' : false,
                });
                $('#fechaLimite').val("");
                $('#fechaLimite').attr({
                    'disabled': true,
                    'min': false,
                    'max':false,
                })
                break;
        }
    }

    function statefir(val){
        switch (val) {
            case 1:
                let aux = $('#fechaLimite').val();
                $('#fechaInicioRezagado').attr({
                    'disabled': false,
                    'min': aux,
                })
                $('#fechaInicio').attr({
                    'max': aux,
                })
                break;
            case 0:
                $('#fechaLimite').attr({
                    'max' : false,
                });
                $('#fechaInicioRezagado').val("");
                $('#fechaInicioRezagado').attr({
                    'disabled': true,
                    'min': false,
                    'max': false,
                })
                
                break;
        }
    }

    function stateflr(val){
        switch (val) {
            case 1:
                let aux = $('#fechaInicioRezagado').val();
                $('#fechaLimiteRezagado').attr({
                    'disabled': false,
                    'min': aux,
                })
                $('#fechaLimite').attr({
                    'max': aux,
                })
                break;
            case 0:
                $('#fechaInicioRezagado').attr({
                    'max' : false,
                });
                $('#fechaLimiteRezagado').val("");
                $('#fechaLimiteRezagado').attr({
                    'disabled': true,
                    'min': false,
                    'max': false,
                })
                break;
        }
    }

    function statefie(val){
        switch (val) {
            case 1:
                let aux = $('#fechaLimiteRezagado').val();
                $('#fechaInicioExtemporaneo').attr({
                    'disabled': false,
                    'min': aux,
                })
                $('#fechaInicioRezagado').attr({
                    'max' : aux,
                })
                break;
        
            case 0:
                $('#fechaLimiteRezagado').attr({
                    'max' : false,
                });
                $('#fechaInicioExtemporaneo').val("");
                $('#fechaInicioExtemporaneo').attr({
                    'disabled': true,
                    'min': false,
                    'max': false
                })
                break;
        }
    }

    function statefle(val){
        switch (val) {
            case 1:
                let aux = $('#fechaInicioExtemporaneo').val();
                $('#fechaLimiteExtemporaneo').attr({
                    'disabled': false,
                    'min':aux
                })
                $('#fechaLimiteRezagado').attr({
                    'max': aux,
                })                
                break;
            case 0:
                $('#fechaInicioExtemporaneo').attr({
                    'max' : false,
                });
                $('#fechaLimiteExtemporaneo').val("");
                $('#fechaLimiteExtemporaneo').attr({
                    'disabled': true,
                    'min': false,
                })
                break;
        }
    }

    //FUNCIONES PARA EL modal DE PLAZO NOTAS
        
    function statefiNota(val){
        switch(val){
            case 1:
                $('#fechaInicioPn').attr({
                    'disabled': false,
                })
                break;
            case 0:
                $('#fechaInicioPn').attr({
                    'disabled' : true,
                    'max' : false
                });
                break;
        }
    }

    function stateflNota(val){
        switch(val){
            case 1:
                let aux = $('#fechaInicioPn').val();
                $('#fechaLimitePn').attr({
                    'disabled': false,
                    'min': aux,
                })
                break;
            case 0:
                $('#fechaInicioPn').attr({
                    'max' : false,
                });
                $('#fechaLimitePn').val("");
                $('#fechaLimitePn').attr({
                    'disabled': true,
                    'min': false,
                })
                break;
        }
    }
    


