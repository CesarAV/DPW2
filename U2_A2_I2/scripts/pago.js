//
// Rutinas JS para pago
// Cesar A. V. UnADM. ES1521204253
//
function eliminar(folio) {
    if (confirm(`¿Está seguro de eliminar el pago ${folio}?`)) {
        window.location = `eliminar.php?folio=${folio}`;
    }
}
