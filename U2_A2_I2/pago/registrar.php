<?php
include("../comun/session-handler.php");
include_once("../usuario/usuario-firmado.php");
if(!isset($usuarioFirmado) || !$usuarioFirmado->puedeRegistrarPago()) {
    header('location: /index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <!-- Actualizar/modificar pago
    Cesar A. V. Rodriguez. UnADM. ES1521204253 -->

    <?php
    // elementos comunes del cuerpo 
    include('../comun/head-interno.html');

    require_once('pago.php');
    ?>
    <title>Registrar pago</title>
</head>

<body>
    <!-- Agregar imagen de fondo -->
    <div id="marca-de-agua-pago"></div>

    <?php
    // elementos comunes del cuerpo 
    include('../menu.php');

    // limpiar mensajes
    $message = $message2 = '';

    if (!$esUsuarioPDC) {
        $message = "Sólo pueden registrar pago los usuarios del depto. de cobranza.";
    }

    if ($esUsuarioPDC) {
        // Guardar registro
        $pago = new Pago();
        if (isset($_POST) && !empty($_POST)) {
            $pago->asignarValores($_POST);

            $res = $pago->crearPago();

            if ($res) {
                $message = "Datos insertados con éxito";
                $class = "alert alert-success";
            } else {
                $class = "alert alert-danger";
                $message = "No se pudieron insertar los datos.";
                if (!empty($pago->lastError)) {
                    $class2 = "alert alert-danger";
                    $message2 = $pago->lastError;
                }
            }
        }
    }
    ?>

    <header>
        Registrar pago
    </header>

    <?php
    include("../mensaje.php");

    if ($esUsuarioPDC) {
    ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                    if (!isset($pago) || empty($pago->folio)) {
                        $pago = new Pago();
                    }
                    // Forma común de edicion
                    include('form-pago.php');
                    ?>
                </div>
                <span class="centrado">
                    <?php
                    if (!empty($pago->folio)) {

                        $listado = $pago->leerPagos($pago->idUsuario);
                        if (count($listado) > 0) {
                    ?>

                            <div><b>Pagos realizados</b></div>
                            <div>
                                <?php
                                include_once('../usuario/usuario.php');
                                $soloVerPagos = true;
                                include("tabla-pagos.php");
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </span>
            </div>
        </section>

    <?php
    }
    ?>
    <?php
    // elementos comunes del cuerpo 
    $footerExtra = 'footer-pago.php';
    include('../footer.php');
    ?>
</body>

</html>