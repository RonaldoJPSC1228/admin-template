var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    $.post("../../controller/CategoryController.php?op=select_category", function (data) {
        // console.log("categorias recibidas: " + data);
        
        $("#cat_id").html(data);
    });

    tabla = $('#productos_data').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
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

function editar(prod_id) {

    $("#mdltitulo").html("Editar Producto");

    $.ajax({
        url: "../../controller/ProductController.php?op=get_by_id",
        type: "POST",
        data: { prod_id: prod_id },
        dataType: "json",
        success: function (datos) {
            console.log("Editar datos:", datos);

            $("#prod_id").val(datos.prod_id);
            $("#prod_name").val(datos.prod_name);
            $("#prod_reference").val(datos.prod_reference);
            $("#prod_cant").val(datos.prod_cant);
            $("#prod_unit_value").val(datos.prod_unit_value);
            $("#prod_desc").val(datos.prod_desc);
            $("#cat_id").val(datos.cat_id);

            $("#modalmantenimiento").modal("show");
        }
    });

}

function eliminar(id) {
    Swal.fire({
        title: '¿Eliminar producto?',
        text: "No podrás revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/ProductController.php?op=delete_product",
                { prod_id: id },
                function () {
                    Swal.fire('Eliminado', 'El producto fue eliminado correctamente', 'success');

                    tabla.ajax.reload();
                });
        }
    });
}

$(document).on("click", "#btnnuevo", function () {
    $("#mdltitulo").html("Nuevo Producto");
    $("#producto_form")[0].reset();
    $("#prod_id").val("");
    $("#modalmantenimiento").modal("show");
});


function limpiar() {
    $("#producto_form")[0].reset();

    $("#prod_id").val("");
}

$(document).on("submit", "#producto_form", function (e) {
    e.preventDefault();

    var prod_id = $("#prod_id").val();
    var prod_name = $("#prod_name").val();
    var prod_reference = $("#prod_reference").val();
    var prod_cant = $("#prod_cant").val();
    var prod_unit_value = $("#prod_unit_value").val();
    var prod_desc = $("#prod_desc").val();
    var cat_id = $("#cat_id").val();
    var url = "";

    if (prod_id == "" || prod_id == null) {
        url = "../../controller/ProductController.php?op=create_product";
    } else {
        url = "../../controller/ProductController.php?op=update_product";
    }

    $.ajax({
        url: url,
        type: "POST",
        data: {
            prod_id: prod_id,
            prod_name: prod_name,
            prod_reference: prod_reference,
            prod_cant: prod_cant,
            prod_unit_value: prod_unit_value,
            prod_desc: prod_desc,
            cat_id: cat_id
        },
        success: function (datos) {
            $("#modalmantenimiento").modal("hide");

            tabla.ajax.reload(null, false);
            limpiar();

            Swal.fire('Éxito', 'Guardado correctamente', 'success');
        }
    });
});

init();