<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <?php require_once("../../public/layouts/head.php"); ?>
    <title>Ordenes | Admin Dashboard Template</title>
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
                            <a class="btn btn-primary btn-rounded btn-block mg-b-10" href="/view/Orders/create-view.php">Crear Orden</a>

                            <div class="table-wrapper">
                                <table id="ordenes_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Codigo</th>
                                            <th>Usuario</th>
                                            <th>Producto</th>
                                            <th>Cant/Num</th>
                                            <th>Valor Unitario</th>
                                            <th>Valor Total</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="card-footer">
                            <button class="btn btn-primary">Aceptar</button>
                            <button class="btn btn-secondary">Cancelar</button>
                        </div> -->
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