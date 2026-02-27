var tabla;

//Función que se ejecuta al inicio
function init() {

}

$(document).ready(function () {
    tabla = $('#categorias_data').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ],
        "ajax": {
            url: '../../controller/CategoryController.php?op=list_category',
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

function editar(cat_id) {

    $("#mdltitulo").html("Editar Categoría");

    $.ajax({
        url: "../../controller/CategoryController.php?op=get_by_id",
        type: "POST",
        data: { cat_id: cat_id },
        dataType: "json",
        success: function (datos) {
            console.log("Editar datos:", datos);

            $("#cat_id").val(datos.cat_id);
            $("#cat_name").val(datos.cat_name);
            $("#cat_desc").val(datos.cat_desc);

            $("#modalmantenimiento").modal("show");
        }
    });

}

function eliminar(id) {
    Swal.fire({
        title: '¿Eliminar categoría?',
        text: "No podrás revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/CategoryController.php?op=delete_category",
                { cat_id: id },
                function () {
                    Swal.fire('Eliminado', 'La Categoría fue eliminada correctamente', 'success');

                    tabla.ajax.reload();
                });
        }
    });
}

$(document).on("click", "#btnnuevo", function () {
    $("#mdltitulo").html("Nuevo Categoría");
    $("#categoria_form")[0].reset();
    $("#cat_id").val("");
    $("#modalmantenimiento").modal("show");
});

function limpiar() {
    $("#categoria_form")[0].reset();

    $("#cat_id").val("");
}

$(document).on("submit", "#categoria_form", function (e) {
    e.preventDefault();

    var cat_id = $("#cat_id").val();
    var cat_name = $("#cat_name").val();
    var cat_desc = $("#cat_desc").val();
    var url = "";

    if (cat_id == "" || cat_id == null) {
        url = "../../controller/CategoryController.php?op=create_category";
    } else {
        url = "../../controller/CategoryController.php?op=update_category";
    }

    $.ajax({
        url: url,
        type: "POST",
        data: {
            cat_id: cat_id,
            cat_name: cat_name,
            cat_desc: cat_desc
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