<?php
include("../comun/session-handler.php");
// ejemplo de como redireccionar si id es obligatorio en 'get'
//if (isset($_GET['id'])) {
//    $id = $_GET['id'];
//} else {
//    header("location:/index.php");
//    exit; // impotant!: https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
//}
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Actualizar usuario</title>
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (isset($_POST) && !empty($_POST)) {
        // Guardar datos de post
        $usuario->asignarValores($_POST);

        // Validar que las contraseñas coincidan
        if (!$usuario->confirmPwd($_POST["ConfirmPassword"])) {
            $class = "alert alert-danger";
            $message = $usuario->lastError;
        } else {
            $res = $usuario->actualizarUsuario();

            if ($res) {
                $class = "alert alert-success";
                $message = "Datos guardados con éxito";
            } else {
                $class = "alert alert-danger";
                $message = "No se guardaron los datos.";
                if (!empty($usuario->lastError)) {
                    $message .= " " . $usuario->lastError;
                }
            }
        }
        $message2 = ""; // Sin mensaje 2
        include("../mensaje.php");
    }
    $usuario->usuarioRegistrado($id);
    ?>
    <section>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Actualizar <b>Usuario</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="usuario.php" class="btn btn-info add-new"><i class="fas fa-arrow-left"></i> Regresar</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
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