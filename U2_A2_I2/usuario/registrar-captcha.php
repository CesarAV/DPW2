<?php
include("../comun/session-handler.php");
$redirectHome = false;
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Registrar usuario reCAPTCHA v3</title>
    <?php
    // elementos comunes del cuerpo 
    include('../comun/head-interno.html');
    ?>
    <!-- 
// codigo copiado y adaptado de https://codigonaranja.com/como-agregar-recaptcha-v3-formularios-de-php
 Clave del sitio: 6LfltqYpAAAAAP7Zp9a3Lnj5F-FUl23QLa_O2bfe
 Clave secreta: 6LfltqYpAAAAAG9YFCalpOguA8L7zQ6FYGrh6M68
-->
    <script src="/scripts/validar.js"></script>
    <script src="/scripts/usuario.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LfltqYpAAAAAP7Zp9a3Lnj5F-FUl23QLa_O2bfe"></script>
</head>

<body>
<?php
    // elementos comunes del cuerpo 
    include('../comun/menu-y-header.php');
?>
    <header>
        Registrar usuario
    </header>

    <?php
    // Si viene de post por falla...
    if(isset($_SESSION['FallaRegistrarUsuario'])) {
        $usuario = $_SESSION['FallaRegistrarUsuario'];
        $message = 'Falla al registrar';
        $message2 = $usuario->lastError;
        include('../mensaje.php');
    }
    if (!isset($usuario) || empty($usuario)) {
        $usuario = new Usuario();
        $usuario->id = "0001";
    }

    $action = 'action="registrar-captcha-post.php"';
    // Forma común de edicion
    include('form-usuario.php');
    ?>

    <script>
        $('#frm-usuario').submit(function(event) {
            event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfltqYpAAAAAP7Zp9a3Lnj5F-FUl23QLa_O2bfe', {
                    action: 'registro'
                }).then(function(token) {
                    $('#frm-usuario').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#frm-usuario').prepend('<input type="hidden" name="action" value="registro">');
                    $('#frm-usuario').unbind('submit').submit();
                });
            });
        });
    </script>
</body>

</html>