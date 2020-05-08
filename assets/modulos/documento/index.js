$(document).ready(function(){    

    //Funcion para cargar los tipos de documento en base a la list typeDocument
    $('#typeDocument').change(function(){
        let aux = $('#typeDocument').val();
        if(aux!=""){
            stateSingleDocument(1);
            stateModulo(0);
            stateSend(0);
            let data = "typeDocument="+aux;
            $.ajax({
                type:"POST",
                url:"../../ra/documentos/listDocumentAjax",
                data: data,
                success: function(e){
                    $('#singleDocument').html(e);
                }
            })
        }
        else{
            stateSingleDocument(0);
            stateModulo(0);
            stateSend(0);
        }

    });

    $('#singleDocument').change(function(){
        let aux = $('#typeDocument').val();
        let aux2 = $('#singleDocument').val();
        if(aux2!=""){
            if((aux==0 && aux2 == 1)||(aux==1 && aux2 == 0)){
                stateSend(0);
                stateModulo(1);
                let idEs = $('#idEstudiante').val();
                let data = "idEstudiante="+ idEs;
                $.ajax({
                    type: "POST",
                    url: "../../ra/modulo/cargarModulosEstudiante",
                    data: data,
                    success: function(e){
                        $('#modulo').html(e);
                    }
                });
            }
            else{
            stateModulo(0);
            stateSend(1);
            }
        }
        else{
                stateModulo(0);
                stateSend(0);
            }
    })

    $('#modulo').change(function(){
        let aux = $('#modulo').val();
        if(aux!=""){
            stateSend(1);
        }
        else{
            stateSend(0);
        }
    })

     //Funcion para cargar los tipos de consolidao o reporte con listReport
     $('#typeReport').change(function(){
        let aux = $('#typeReport').val();
        if (aux!=""){
            stateReport(1);
            stateClassReport(0);
            stateGroupInputs(0);
            stateProgram(0);
            stateAcademico(0);
            stateSemestre(0);
            stateBtnReport(0);
            let data = "typeReport="+aux;
            $.ajax({
                type:"POST",
                url:"../../ra/documentos/listReportAjax",
                data:data,
                success: function(e){
                    $("#report").html(e);
                }
            })
        }
        else{
            stateReport(0);
            stateClassReport(0);
            stateGroupInputs(0);
            stateProgram(0);
            stateAcademico(0);
            stateSemestre(0);
            stateBtnReport(0);
        }
    })

})

function openTypeDocument(){
    let ep = $('#idEstudiante').val();
    if(ep!=""){
        stateTypeDocument(1);
        stateSingleDocument(0);
        stateModulo(0);
        stateSend(0);
    }
    else{
        stateTypeDocument(0);
        stateSingleDocument(0);
        stateModulo(0);
        stateSend(0);
    }
}

function stateTypeDocument(val){
    switch(val){
        case 0:
            $('#typeDocument').val("");
            $('#typeDocument').prop('disabled',true);
            break;
        case 1:
            $('#typeDocument').val("");
            $('#typeDocument').prop('disabled',false);
            break;
    }
    
}

function stateSingleDocument(val){
    switch (val) {
        case 0:
            $('#singleDocument').val("");
            $('#singleDocument').prop('disabled',true);
            break;
    
        case 1:
            $('#singleDocument').val("");
            $('#singleDocument').prop('disabled',false);
            break;
    }
}

function stateModulo(val){

    switch (val) {
        case 0:
            $('#select_modulo').prop('hidden',true);
            $('#modulo').val("");
            $('#modulo').prop('disabled',true);
            break;
    
        case 1:
            $('#select_modulo').prop('hidden',false);
            $('#modulo').prop('disabled',false);
            break;
    }

}

function stateSend(val){
    switch (val) {
        case 0:
            $('#mandar_datosDocumento').prop('disabled',true);
            $('#mandar_datosDocumento').removeClass('btn-success');
            $('#mandar_datosDocumento').addClass('btn-secondary');
            break;

        case 1:
            $('#mandar_datosDocumento').prop('disabled',false);
            $('#mandar_datosDocumento').removeClass('btn-secondary');
            $('#mandar_datosDocumento').addClass('btn-success');
            break;
    }
}

function stateTypeReport(val){
    switch (val) {
        case 0:
            
            break;
        case 1:

            break;
    }
}

function stateReport(val){
    switch (val) {
        case 0:
            $("#report").prop('disabled', true);
            $("#report").val("");
            break;
        case 1:
            $("#report").prop('disabled', false);
            break;
    }
}

function stateClassReport(val){
    switch (val) {
        case 0:
            $("#inputReport").prop('hidden',true);
            $("#classReport").prop('disabled',true);
            $("#classReport").val('');
            break;
        case 1:
            $("#inputReport").prop('hidden',false);
            $("#classReport").prop('disabled',false);
            break;
    }
}
function stateGroupInputs(val){
switch (val) {
    case 0:
        $('#groupInputs1').prop('hidden', true);
        $('#groupInputs2').prop('hidden', true);
        $('#groupInputs3').prop('hidden', true);

        break;
    case 1:
        $('#groupInputs1').prop('hidden', false);
        $('#groupInputs2').prop('hidden', false);
        $('#groupInputs3').prop('hidden', false);
        break;
    case 2:
        $('#groupInputs1').prop('hidden',false);
        break;
}
}

function stateProgram(val){
    switch (val) {
        case 0:
            $("#pEstudio").prop('disabled', true);
            $("#pEstudio").val("");

            break;
        case 1:
            $("#pEstudio").prop('disabled', false);
            break;
    }
}

function stateAcademico(val){
    switch (val) {
        case 0:
            $("#pAcademico").prop('disabled', true);
            $("#pAcademico").val("");
            break;
        case 1:
            $("#pAcademico").prop('disabled', false);
            break;
    }
} 

function stateSemestre(val){
    switch (val) {
        case 0:
            $("#sAcademico").prop('disabled', true);
            $("#sAcademico").val("");
            break;
        case 1:
            $("#sAcademico").prop('disabled', false);
            break;
    }
}

function stateBtnReport(val){
    switch (val) {
        case 0:
            $('#btn_goReport').prop('disabled',true);
            $('#btn_goReport').removeClass('btn-success');
            $('#btn_goReport').addClass('btn-secondary');
            break;
        case 1:
            $('#btn_goReport').prop('disabled',false);
            $('#btn_goReport').removeClass('btn-secondary');
            $('#btn_goReport').addClass('btn-success');
            break;
    }
}

function cargarAfterReport(){
    let val1 = $("#typeReport").val(),
        val2 = $("#report").val();
    if(val1 == 0){
        if(val2 != ""){
            stateGroupInputs(1);
            stateAcademico(1);
            stateProgram(0);
            stateSemestre(0);
            stateBtnReport(0);
        }
        else{
            stateGroupInputs(0);
            stateAcademico(0);
            stateProgram(0);
            stateSemestre(0);
            stateBtnReport(0);
        }
    }
    else if(val1 == 1){
        if(val2!=""){
            stateClassReport(1);
        }
        else{
            stateClassReport(0);
            stateBtnReport(0);
        }
    }
}

function cargarAfterClassReport(){
    let val = $("#classReport").val();
    if (val != ""){
        stateGroupInputs(2);
        stateAcademico(1);
    }
    else{
        stateGroupInputs(0);
        stateAcademico(1);
        stateBtnReport(0);
    }
}

function cargarAfterPeriodo(){
    let val = $('#pAcademico').val(),
        val2 = $('#classReport').val();
    if(val != ""){
        stateProgram(1);
        stateSemestre(0);
        stateBtnReport(0);
        if(val2!=""){
            stateBtnReport(1);
        }
    }
    else{
        stateProgram(0);
        stateSemestre(0);
        stateBtnReport(0);
    }
}

function cargarAfterProgram(){
    let val = $("#pEstudio").val();
    if (val != "") {
        stateSemestre(1);
        stateBtnReport(0);
    }
    else
        stateSemestre(0);
        stateBtnReport(0);
}

function cargarAfterSemestre(){
    let val = $("#sAcademico").val();
    if (val != "")
        stateBtnReport(1);
    else
        stateBtnReport(0);
}

function printPDF(){
    let idEst = $('#idEstudiante').val(),
        typeDoc = $('#typeDocument').val(),
        singleDoc = $('#singleDocument').val(),
        modulo = $('#modulo').val();

    window.open("../../ra/documentos/printPDF/"+idEst+"/"+typeDoc+"/"+singleDoc+"/"+modulo);
}

function printReport(){
    let idTypeRep = $('#typeReport').val(),
        report = $("#report").val(),
        classReport = $("#classReport").val(),
        pAcademico = $("#pAcademico").val(),
        pEstudio = $("#pEstudio").val(),
        sAcademico = $("#sAcademico").val();

        idTypeRep == "" ? idTypeRep = 0: "";
        report == "" ? report = 0: "";
        classReport == "" ? classReport = 0: "";
        pAcademico == "" ? pAcademico = 0: "";
        pEstudio == "" ? pEstudio = 0: "";
        sAcademico == "" ? sAcademico = 0: "";


        //alert("printReporte/"+idTypeRep+"/"+report+"/"+classReport+"/"+pAcademico+"/"+pEstudio+"/"+sAcademico);
        //function printReporte($idTypeRep=0, $report=0, $classReport=0, $pAcademico=0, $pEstudio=0,$sAcademico=0){
        window.open("../../ra/documentos/printReporte/"+idTypeRep+"/"+report+"/"+classReport+"/"+pAcademico+"/"+pEstudio+"/"+sAcademico);
}