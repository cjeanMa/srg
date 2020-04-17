$(document).ready(function(){
    cargar_dataTables();
})

function cargar_dataTables(){
    $("#table_unidadDidactica").DataTable({
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
                title: 'Relacion de Unidades Didacticas',
                exportOptions: {
                    columns: [0,1,2,3,4],
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar PDF',
                className: 'btn btn-danger',
                title: 'Relacion de Unidades Didacticas',
                exportOptions: {
                    columns: [0,1,2,3,4],
                }
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-warning',
                title: '<h2 class="text-center">Relacion de Unidades Didacticas</h2>',
                exportOptions: {
                    columns: [0,1,2,3,4],
                }
            }
        ],
    });
}