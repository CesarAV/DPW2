<!-- 
    Lista <option> de usuario para utilizar dentro de <select>
    preparar '$idSelUsr' para usuario seleccionado 
-->
<?php
$usr = new Usuario();
$listaUsuarios = $usr->leerUsuarios();

foreach ($listaUsuarios as $row) {
    $usr->asignarValores($row);
    // '$usuario' se asigna en la forma que llama a esta
    $selected = ($idSelUsr == $usr->id) ? 'selected' : '';
?>
    <option value="<?= $usr->id ?>" <?= $selected ?>><?= "$usr->id - " . $usr->nombreCompleto() ?></option>
<?php
}
?>