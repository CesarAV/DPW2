<?php
include("../comun/session-handler.php");
include_once("../usuario/usuario-firmado.php");
include('pago.php');
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <!-- Consultar pagos
    Cesar A. V. Rodriguez. UnADM. ES1521204253 -->

    <script src="/scripts/pago.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet" />

    <?php
    // elementos comunes del cuerpo 
    include('../comun/head-interno.html');

    if(isset($_POST) && isset($_POST["usuarioSeleccionado"])) {
        // asignar el usuario seleccionado y realizar el proceso regular.
        $id = $_POST["usuarioSeleccionado"];
        $usr = new Usuario();
        $usuario = $usr->usuarioRegistrado($id);
    }

    if (isset($_GET['usuarioSeleccionado'])) {
        // asignar el usuario seleccionado y realizar el proceso regular.
        $id = $_GET["usuarioSeleccionado"];
        $usr = new Usuario();
        $usuario = $usr->usuarioRegistrado($id);
    }
        
    if (!isset($usuario)) {
        // por defecto, leer los pagos del usuario firmado
        $usuario = $usuarioFirmado;
    }

    $pago = new Pago();
    $listado = $pago->leerPagos($usuario->id);
    ?>
    <title>Consultar pagos</title>
</head>

<body>
    <!-- Agregar imagen de fondo -->
    <div id="marca-de-agua-pago"></div>

    <?php
    // elementos comunes del cuerpo 
    include('../menu.php');
    ?>
    <div id="contenido" class="container">
            <div class="row centrado">
                <div>
                    <h2>Consultar pagos</h2>
                </div>

                <div>
                    <?php
                    if ($esUsuarioPDC) {
                        // Seleccionar usuario
                        include('form-sel-usuario.php');
                        ?>
                        <hr>
                        <?php
                    }
                    ?>
                </div>

                <div><?php echo $usuario->descripcionTipo() . ": $usuario->id Nombre: " . $usuario->nombreCompleto() ?></div>
                <br>
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

                if (count($listado) > 0) {
                    ?>
                    <div><b>Pagos realizados</b></div>
                    <div class="table-responsive-md">
                        <?php include("tabla-pagos.php") ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div>No existen pagos registrados para mostrar</div>
                    <?php
                }
                ?>
    </div>
    </div>
    <?php
    // elementos comunes del cuerpo 
    $footerExtra = 'footer-pago.php';
    include('../footer.php');
    ?>
</body>

</html>