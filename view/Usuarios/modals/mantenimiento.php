<div id="modalmantenimiento" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" id="usuario_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="mdltitulo">Mantenimiento de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="user_identification">Identificacion:</label>
                        <input type="number" class="form-control" id="user_identification" name="user_identification"
                            placeholder="Ingrese identificacion" required>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Nombre:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name"
                            placeholder="Ingrese nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="user_lastname">Apellido:</label>
                        <input type="text" class="form-control" id="user_lastname" name="user_lastname"
                            placeholder="Ingrese apellido" required>
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