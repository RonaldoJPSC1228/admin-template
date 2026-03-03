var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    $.post("../../controller/ProductController.php?op=select_product", function (data) {
        // console.log("categorias recibidas: " + data);
        $("#prod_id").html(data);
    });

    $.post("../../controller/UserController.php?op=select_user", function (data) {
        // console.log("usuarios recibidos: " + data);
        $("#user_id").html(data);
    });

    tabla = $('#ordenes_data').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ],
        "ajax": {
            url: '../../controller/OrderController.php?op=list_order',
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

function editar(order_id) {

    $("#mdltitulo").html("Editar Orden");

    $.ajax({
        url: "../../controller/OrderController.php?op=get_by_id",
        type: "POST",
        data: { order_id: order_id },
        dataType: "json",
        success: function (datos) {
            console.log("Datos editar:", datos);
            $("#order_id").val(datos.order_id);
            $("#user_id").val(datos.user_id);
            $("#prod_id").val(datos.prod_id);
            $("#num_prod").val(datos.num_prod);
            // Recarga selects si es necesario
            $("#user_id").trigger('change');
            $("#prod_id").trigger('change');
        }
    });

}

// Eliminar orden
function eliminar(id) {
    Swal.fire({
        title: '¿Eliminar orden?',
        text: "No podrás revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/OrderController.php?op=delete_order", { order_id: id }, function (data) {
                if (data.status == 'success') {
                    Swal.fire('Eliminado', 'Orden eliminada correctamente', 'success');
                    tabla.ajax.reload();
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            }, 'json');
        }
    });
}

// $(document).on("click", "#btnnuevo", function () {
//     $("#mdltitulo").html("Nuevo Producto");
//     $("#producto_form")[0].reset();
//     $("#prod_id").val("");
//     $("#modalmantenimiento").modal("show");
// });


// function limpiar() {
//     $("#producto_form")[0].reset();

//     $("#prod_id").val("");
// }

$(document).on("submit", "#order_form", function (e) {
    e.preventDefault();  // Evita recarga de página

    var order_id = $("#order_id").val();
    var user_id = $("#user_id").val();
    var prod_id = $("#prod_id").val();
    var num_prod = $("#num_prod").val();
    var url = "";

    // Si es nuevo o editar
    if (order_id == "" || order_id == null) {
        url = "../../controller/OrderController.php?op=create_order";
    } else {
        url = "../../controller/OrderController.php?op=update_order";
    }

    $.ajax({
        url: url,
        type: "POST",
        data: {
            order_id: order_id,
            user_id: user_id,
            prod_id: prod_id,
            num_prod: num_prod
        },
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                Swal.fire('Éxito', data.message || 'Orden guardada correctamente', 'success');
                tabla.ajax.reload(null, false);  // Recarga la tabla si existe
                $("#order_form")[0].reset();  // Limpia formulario
                $("#mdltitulo").html("Nueva Orden");  // Reset título
            } else {
                Swal.fire('Error', data.message || 'Error al guardar', 'error');
            }
        },
        error: function (xhr, status, error) {
            console.log("Error AJAX: " + error);
            Swal.fire('Error', 'Error de conexión. Revisa console.', 'error');
        }
    });
});

init();