<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <?php require_once("../../public/layouts/head.php"); ?>
    <title> | Admin Dashboard Template</title>
</head>

<body>
    <div class="container-scroller">
        <?php require_once("../../public/layouts/navbar.php"); ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <?php require_once("../../public/layouts/sidebar.php"); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-header">
                            Mantenimiento de Ordenes
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Orders</h4>
                            <!-- <button id="btnnuevo" class="btn btn-primary btn-rounded btn-block mg-b-10">Nuevo</button> -->

                            <div class="table-wrapper">
                                <div class="card">
                                    <form method="post" id="order_form">
                                        <div class="card-header">
                                            <h5 class="card-title" id="mdltitulo">Editar Orden</h5>
                                        </div>

                                        <div class="card-body">
                                            <input type="hidden" name="order_id" id="order_id">
                                            <div class="form row">
                                                <div class="form-group col-md-6">
                                                    <label for="user_id">Usuario:</label>
                                                    <select class="form-control" id="user_id" name="user_id" required>
                                                        <!-- Las opciones se cargarán dinámicamente desde el servidor -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form row">
                                                <div class="form-group col-md-6">
                                                    <label for="prod_id">Producto:</label>
                                                    <select class="form-control" id="prod_id" name="prod_id" required>
                                                        <!-- Las opciones se cargarán dinámicamente desde el servidor -->
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_prod">Cant/Num:</label>
                                                    <input type="number" class="form-control" id="num_prod"
                                                        name="num_prod" placeholder="Ingrese cant" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <a class="btn btn-secondary" href="../Orders/">Cerrar</a>

                                            <button type="submit" id="btnActualizar" class="btn btn-primary">
                                                Actualizar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <?php require_once("../../public/layouts/footer.php"); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <?php require_once("../../public/layouts/app.php"); ?>

    <script type="text/javascript" src="order.js"></script>
</body>

</html>