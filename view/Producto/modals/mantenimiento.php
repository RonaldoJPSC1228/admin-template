<div id="modalmantenimiento" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" id="producto_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="mdltitulo">Mantenimiento de Producto</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="prod_id" id="prod_id">

                    <div class="form-group">
                        <label for="cat_id">Categoría del Producto:</label>
                        <select class="form-control" id="cat_id" name="cat_id" required>
                            <!-- Las opciones se cargarán dinámicamente desde el servidor -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prod_name">Nombre del Producto:</label>
                        <input type="text" class="form-control" id="prod_name" name="prod_name"
                            placeholder="Ingrese nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="prod_cant">Cant del Producto:</label>
                        <input type="number" class="form-control" id="prod_cant" name="prod_cant"
                            placeholder="Ingrese cantidad" required>
                    </div>

                    <div class="form-group">
                        <label for="prod_desc">Descripció del Producto:</label>
                        <textarea class="form-control" id="prod_desc" name="prod_desc" rows="3"
                            placeholder="Ingrese descripción" required></textarea>
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