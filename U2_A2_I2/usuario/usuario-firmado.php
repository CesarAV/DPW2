<!-- manejo de usuario firmado -->
<?php
$usuarioFirmado = Usuario::getUsuarioFirmado();
if ($usuarioFirmado) {
    $esUsuarioPDC = $usuarioFirmado->esPDC();
} else if (!isset($redirectHome) || $redirectHome) {
    $uri = 'http://' . $_SERVER['HTTP_HOST'];
    
    // Página válida solo para usuarios registrados
    //header("location: " . $uri);
?>
    <script>
        window.location.href="<?=$uri?>";
    </script>
<?php
}
?>