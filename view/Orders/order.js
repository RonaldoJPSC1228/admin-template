var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    // SIEMPRE carga selects si existen (create/edit)
    if ($("#prod_id").length) {
        $.post("../../controller/ProductController.php?op=select_product", function (data) {
            $("#prod_id").html(data);
        });
    }
    if ($("#user_id").length) {
        $.post("../../controller/UserController.php?op=select_user", function (data) {
            $("#user_id").html(data);
        });
    }

    // DataTable SOLO en index (#ordenes_data)
    if ($("#ordenes_data").length) {
        tabla = $('#ordenes_data').DataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5'],
            "ajax": { url: '../../controller/OrderController.php?op=list_order', type: "get", dataType: "json", error: e => console.log(e.responseText) },
            "bDestroy": true, "iDisplayLength": 5, "order": [[0, "desc"]]
        });
    }

    // Auto-editar en edit-view (puro JS)
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    if (id && editar) {
        editar(id);
    }
});

function editar(order_id) {

    

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
            console.log('Respuesta:', data);
            if (data && data.status === 'success') {
                Swal.fire({
                    title: 'Éxito',
                    text: data.message || 'Orden guardada',
                    icon: 'success',
                    timer: 1500,  // Auto-cierra en 1.5s
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../Orders/';  // o '../Orders/index.php'
                });
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