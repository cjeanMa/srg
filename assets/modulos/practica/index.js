$(document).ready(function(){
    cargar_dataTables();

    $('#pEstudio').change(function(){
        let pEstudio = $('#pEstudio').val();
        if(pEstudio != ""){
            $('#modulo').prop('disabled',false);
            idEp = $('#pEstudio').val();
            data = "idEscuelaProfesional="+idEp;
            $.ajax({
                type:'POST',
                url:'../modulo/modulosByEpAjax',
                data: data,
                success: function(e){
                    $('#modulo').html(e);
                }
            })
        }
        else{
            $('#modulo').prop('disabled',true);
            $('#modulo').val("");
        }
    })


    $('#buscar_practicas').click(function(){
        let dni, pEstudio, modulo,aPaterno,aMaterno,nombres;
        $('#dni').val()!==""?dni = $('#dni').val(): dni = "*";
        $('#pEstudio').val()!==""?pEstudio = $('#pEstudio').val(): pEstudio = "*";
        $('#modulo').val()!==""?modulo = $('#modulo').val(): modulo = "*";
        
        let data = "idPersona="+dni+"&idEscuelaProfesional="+pEstudio+"&idModulo="+modulo;
        $.ajax({
            type:'POST',
            url:'../ra/practica/filtrarPracticas',
            data: data,
            success: function(e){
                //$('#table_practica').DataTable().clear();
                $('#table_practica').html(e);
            }

        }) 
    });

})

function refreshDataTable(){
    
    
}


function cargar_dataTables(){
    $('#table_practica').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "0 registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "loadingRecords": "Loading...",
            "processing":     "Processing...",
            "search":         "Buscar en registros:",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
        lengthMenu: [10, 25, 50],
        responsive: true,
        dom: '<"top.row"<".col-md col-sm"l><".col-md col-sm text-center"B><".col-md col-sm"f>>rt<"bottom.row"<".col-md col-sm"i><".col-md col-sm"p>><"clear">',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar Excel',
                className: 'btn btn-success',
                title: 'Relacion Practicas',
                exportOptions: {
                    columns: [0,1,2,3],
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar PDF',
                className: 'btn btn-danger',
                title: 'Relacion Practicas',
                exportOptions: {
                    columns: [0,1,2,3],
                }
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-warning',
                title: '<h2 class="text-center">Relacion Practicas</h2>',
                exportOptions: {
                    columns: [0,1,2,3],
                }
            }
        ],
    });
}