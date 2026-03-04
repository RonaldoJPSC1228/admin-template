<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <?php require_once("../../public/layouts/head.php"); ?>
    <title>Producto | Admin Dashboard Template</title>
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
                            Mantenimiento de Productos
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Products</h4>
                            <button id="btnnuevo" class="btn btn-outline-primary btn-block mg-b-10">Nuevo</button>

                            <div class="table-wrapper">
                                <table id="productos_data" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Referencia</th>
                                            <th>Cantidad</th>
                                            <th>Valor Unitario</th>
                                            <th>Descripción</th>
                                            <th>Categoría</th>
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

    <?php require_once("modals/mantenimiento.php"); ?>

    <?php require_once("../../public/layouts/app.php"); ?>

    <script type="text/javascript" src="producto.js"></script>
</body>

</html>