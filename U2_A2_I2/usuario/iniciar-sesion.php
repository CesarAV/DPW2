<?php
include("../comun/session-handler.php");
$redirectHome = false;
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Iniciar sesión</title>
    <?php
    // elementos comunes del cuerpo 
    include('../head-interno.html');
    ?>
    <script src="/scripts/validar.js"></script>
    <script src="/scripts/usuario.js"></script>
</head>

<body>
    <?php
    // elementos comunes del cuerpo 
    include('../comun/menu-y-header.php');

    if (!isset($usuario)) {
        $usuario = new Usuario();
    }

    if (isset($_POST) && !empty($_POST)) {
        // Submit
        if (!$usuario->iniciarSesion($_POST)) {
            $message = $usuario->lastError;
            $class = "alert alert-danger";
        }
    }
    if ($usuario->getUsuarioFirmado() != null) {
    ?>
        <script>
            window.location.href = '/index.php';
        </script>
    <?php
    }
    ?>

    <header>
        Iniciar sesión
    </header>

    <?php include('../mensaje.php'); ?>

    <section>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <form method="post">
                            <div class="col-md-12">
                                <label onclick="mostrarAyuda('IDUsuario');">Identificador:</label>
                                <input type="text" name="IDUsuario" id="idusuario" value="<?php echo $usuario->id ?>" class='form-control' maxlength="4" required>
                            </div>

                            <div class="col-md-12">
                                <label onclick="mostrarAyuda('Password');">Contraseña:</label>
                                <input type="password" name="Password" id="password" value="<?php echo $usuario->password ?>" class='form-control' maxlength="64" required>
                            </div>

                            <div class="col-md-12 pull-right">
                                <button type="submit" class="btn btn-success">
                                    Acceder
                                </button>
                            </div>
                        </form>
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