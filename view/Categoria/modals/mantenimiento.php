<div id="modalmantenimiento" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" id="categoria_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="mdltitulo">Mantenimiento de Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="cat_id" id="cat_id">
                    <div class="form-group">
                        <label for="cat_name">Nombre del Categoría:</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name"
                            placeholder="Ingrese nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="cat_desc">Descripción de la Categoría:</label>
                        <textarea class="form-control" id="cat_desc" name="cat_desc" rows="3"
                            placeholder="Ingrese descripción" ></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>

                    <button type="submit" id="btnGuardar" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>