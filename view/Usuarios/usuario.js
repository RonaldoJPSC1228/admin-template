var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    tabla = $('#usuarios_data').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ],
        "ajax": {
            url: '../../controller/UserController.php?op=list_user',
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

function editar(user_id) {

    $("#mdltitulo").html("Editar Usuario");

    $.ajax({
        url: "../../controller/UserController.php?op=get_by_id",
        type: "POST",
        data: { user_id: user_id },
        dataType: "json",
        success: function (datos) {
            console.log("Editar datos:", datos);

            $("#user_id").val(datos.user_id);
            $("#user_name").val(datos.user_name);
            $("#user_lastname").val(datos.user_lastname);
            $("#user_identification").val(datos.user_identification);

            $("#modalmantenimiento").modal("show");
        }
    });

}

function eliminar(id) {
    Swal.fire({
        title: '¿Eliminar usuario?',
        text: "No podrás revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/UserController.php?op=delete_user",
                { cat_id: id },
                function () {
                    Swal.fire('Eliminado', 'El Usuario fue eliminado correctamente', 'success');

                    tabla.ajax.reload();
                });
        }
    });
}

$(document).on("click", "#btnnuevo", function () {
    $("#mdltitulo").html("Nuevo Usuario");
    $("#usuario_form")[0].reset();
    $("#user_id").val("");
    $("#modalmantenimiento").modal("show");
});

function limpiar() {
    $("#usuario_form")[0].reset();

    $("#user_id").val("");
}

$(document).on("submit", "#usuario_form", function (e) {
    e.preventDefault();

    var user_id = $("#user_id").val();
    var user_identification = $("#user_identification").val();
    var user_name = $("#user_name").val();
    var user_lastname = $("#user_lastname").val();
    var url = "";

    if (user_id == "" || user_id == null) {
        url = "../../controller/UserController.php?op=create_user";
    } else {
        url = "../../controller/UserController.php?op=update_user";
    }

    $.ajax({
        url: url,
        type: "POST",
        data: {
            user_id: user_id,
            user_identification: user_identification,
            user_name: user_name,
            user_lastname: user_lastname
        },
        success: function () {
            $("#modalmantenimiento").modal("hide");

            tabla.ajax.reload(null, false);
            limpiar();

            Swal.fire('Éxito', 'Guardado correctamente', 'success');
        }
    });
});

init();