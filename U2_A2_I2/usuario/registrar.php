<?php
include("../comun/session-handler.php");
$redirectHome = false;
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Registrar usuario</title>
    <?php
    // elementos comunes del cuerpo 
    include('../comun/head-interno.html');
    ?>
    <script src="/scripts/validar.js"></script>
    <script src="/scripts/usuario.js"></script>
</head>

<body>
    <?php
    // elementos comunes del cuerpo 
    include('../comun/menu-y-header.php');

    $usuario = new Usuario();
    if (isset($_POST) && !empty($_POST)) {
        $usuario->asignarValores($_POST);

        // Validar que las contraseñas coincidan
        if (!$usuario->confirmPwd($_POST["ConfirmPassword"])) {
            $class = "alert alert-danger";
            $message = $usuario->lastError;
        } else {
            $res = $usuario->crearUsuario();

            if ($res) {
                $message = "Datos insertados con éxito";
                $class = "alert alert-success";
            } else {
                $class = "alert alert-danger";
                $message = "No se pudieron insertar los datos.";
                if (!empty($usuario->lastError)) {
                    $class2 = "alert alert-danger";
                    $message2 = $usuario->lastError;
                }
            }
        }
    }
    ?>

    <header>
        Registrar usuario
    </header>

    <?php include("../mensaje.php"); ?>

    <section>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <?php
                        if (!isset($usuario) || empty($usuario)) {
                            $usuario = new Usuario();
                            $usuario->id = "0001";
                        }

                        // Forma común de edicion
                        include('form-usuario.php');
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <?php
    // elementos comunes del cuerpo 
    include('../footer.php');
    ?>
</body>

</html>