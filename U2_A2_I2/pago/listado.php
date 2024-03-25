<?php
include("../comun/session-handler.php");
include_once("../usuario/usuario-firmado.php");
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>lista de pagos</title>
    <?php
    // elementos comunes del cuerpo 
    include('../head-interno.html');
    include('pago.php');

    $pago = new Pago();
    $listado = $pago->leerPagos($usuarioFirmado->id);
    ?>
    <script src="/scripts/pago.js"></script>
</head>

<body>
    <!-- Agregar imagen de fondo -->
    <div id="marca-de-agua-pago"></div>
    <?php
    // elementos comunes del cuerpo 
    include('../menu.php');
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Listado de <b>pagos</b></h2>
                </div>
                <?php
                if ($esUsuarioPDC) {
                ?>
                    <div class="col-md-12">
                        <a href="/pago/registrar.php" class="btn btn-info add-new"><i class="fas fa-user-plus"></i>
                            Agregar pago
                        </a>
                    </div>
                <?php
                }
                ?>
                <div class="col-md-12">
                    <?php include('tabla-pagos.php') ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    // elementos comunes del cuerpo 
    $footerExtra = 'footer-pago.php';
    include('../footer.php');
    ?>
</body>

</html>