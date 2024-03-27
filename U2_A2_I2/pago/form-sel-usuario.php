<!-- 
    Formulario para seleccionar un usuario
    UnADM. Cesar A. V. ES1521204253
-->
<?php
?>

<form method="post" action="consultar.php">
    <label>Seleccione un usuario, por favor:</label>
    <select name="usuarioSeleccionado" title="Seleccionar usuario" class="form-control">
        <?php 
            $idSelUsr = $usuario->id;
            include('../usuario/option-usuario.php');
        ?>
    </select>
    <button type="submit" class="btn btn-success">
        Consultar
    </button>
</form>