<?php
include("../comun/session-handler.php");
include("../pago/pago.php");
if(!isset($usuarioFirmado) || !$usuarioFirmado->puedeEliminarPago()) {
    header('location: /index.php');
    exit;
}
?>
<?php
$idUsuario = '';
if (isset($_GET['folio'])) {
    $pago = new Pago();
    $folio = $_GET['folio'];

    $pago = $pago->leerPagoDeBD($folio);
    if($pago) {
        $idUsuario = $pago->idUsuario;
    
        $res = $pago->eliminarPago();
        if (!$res) {
            echo "<div class=\"alert alert-danger\"> Error al eliminar el registro</div>";
        }
    }
}
?>

<script>
    window.location.href="/pago/consultar.php?usuarioSeleccionado=<?=$idUsuario?>";
</script>