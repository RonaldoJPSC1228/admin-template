var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    tabla = $('#productos_data').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../../controller/ProductController.php?op=list_product',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[0, "desc"]]//Ordenar (columna,orden)
    }).DataTable();
});

init();