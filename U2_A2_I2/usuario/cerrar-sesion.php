<?php
session_start();
if (session_id() != "") {
    //quitamos la variable global
    unset($_SESSION['UsuarioFirmado']);
    session_unset();
    session_destroy();
}

$uri = 'http://'.$_SERVER['HTTP_HOST'];

// Se redirecciona una vez borrado la variable global
header("location: " . $uri);
?>