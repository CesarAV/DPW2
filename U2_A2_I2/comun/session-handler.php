<?php
// Auxiliar para manejo de sesion. Incluir al inicio de cada archivo principal que
// requiera sesion para que funcione en 000webhost

// See: Adam Winter Answer to
// https://stackoverflow.com/questions/2010427/php-php-incomplete-class-object-with-my-session-data
require_once($_SERVER['DOCUMENT_ROOT'] . '/usuario/usuario.php');

if (session_id() == "") {
    session_start();
}
?>