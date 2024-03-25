<?php
include("../comun/session-handler.php");
include_once("../usuario/usuario-firmado.php");
if(!isset($usuarioFirmado) || !$usuarioFirmado->puedeEditarPago()) {
    header('location: /index.php');
    exit;
}?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <!-- Actualizar/modificar pago
    Cesar A. V. Rodriguez. UnADM. ES1521204253 -->
    
    <title>Actualizar pago</title>
    <?php
    // elementos comunes del cuerpo 
    include('../head-interno.html');
    ?>
</head>

<body>
    <!-- Agregar imagen de fondo -->
    <div id="marca-de-agua-pago"></div>

    <?php
    // elementos comunes del cuerpo 
    include('../menu.php');
    
    include('pago.php');
    
    $pago = new Pago();
    if (isset($_GET['folio'])) {
        $folio = $_GET['folio'];
    }
    if (isset($_POST) && !empty($_POST)) {

        // Guardar datos de post
        $pago->asignarValores($_POST);

        $res = $pago->actualizarPago();

        if ($res) {
            $class = "alert alert-success";
            $message = "Datos guardados con éxito";
        } else {
            $class = "alert alert-danger";
            $message = "No se guardaron los datos.";
            if (!empty($pago->lastError)) {
                $message .= " " . $pago->lastError;
            }
        }
        $message2 = ""; // Sin mensaje 2
    }

    $pago = $pago->leerPagoDeBD($folio);
    ?>

    <header>
        Actualizar pago
    </header>

    <?php include("../mensaje.php"); ?>

    <section>
        <div class="row">
            <?php
            // Forma común de edicion
            include('form-pago.php');
            ?>
        </div>
    </section>
    <?php
    // elementos comunes del cuerpo 
    $footerExtra = 'footer-pago.php';
    include('../footer.php');
    ?>
</body>

</html>