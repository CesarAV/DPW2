<!-- mensaje de bienvenida -->
<?php
$message = ""; // "todo: mensaje";
// print_r(isset($usuarioFirmado));
if (isset($usuarioFirmado)) {
    $message = '!Bienvenido '.$usuarioFirmado->nombreCompleto().'!';
    $message2 = "¡Has ingresado como '" . $usuarioFirmado->descripcionTipo() . "'!";
    include('mensaje.php');
}
?>