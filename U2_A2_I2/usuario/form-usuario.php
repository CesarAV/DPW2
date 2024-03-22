<form method="post"> <!-- onsubmit="return validarUsuario();"-->
    <div class="col-md-12">
        <label onclick="mostrarAyuda('IDUsuario');">Identificador:</label>
        <input type="text" name="IDUsuario" id="idusuario" value="<?php echo $usuario->id ?>" class='form-control' maxlength="4" required>
    </div>

    <div class="col-md-12">
        <label onclick="mostrarAyuda('Nombre');">Nombre(s):</label>
        <input type="text" name="Nombre" id="nombre" value="<?php echo $usuario->nombre ?>" class='form-control' maxlength="128" required>
    </div>

    <div class="col-md-12">
        <label>Apellido paterno:</label>
        <input type="text" name="ApellidoPaterno" id="apellidopaterno" value="<?php echo $usuario->apellidoPaterno ?>" class='form-control' maxlength="128" required>
    </div>

    <div class="col-md-12">
        <label>Apellido materno:</label>
        <input type="text" name="ApellidoMaterno" id="apellidomaterno" value="<?php echo $usuario->apellidoMaterno ?>" class='form-control' maxlength="128">
    </div>

    <div class="col-md-12">
        <label>Edad:</label>
        <input type="number" name="Edad" id="edad" value="<?php echo $usuario->edad ?>" class='form-control' maxlength="64">
    </div>

    <div class="col-md-12">
        <label>Sexo:</label>
        <select name="Sexo" id="sexo" class="form-control">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Sin especificar">Sin especificar</option>
        </select>
    </div>

    <div class="col-md-12">
        <label>Correo electrónico:</label>
        <input type="text" name="Email" id="email" value="<?php echo $usuario->email ?>" class='form-control' maxlength="128">
    </div>

    <!-- TipoUsuario. Solo se puede registrar tipo padre de familia -->
    <div class="col-md-12">
        <label>Tipo de usuario:</label>
        <select name="TipoUsuario" id="tipousuario" class="form-control">
            <option value="PDC" disabled>Personal del depto. de cobranza</option>
            <option value="PF" selected>Padre de familia</option>
        </select>
    </div>

    <div class="col-md-12">
        <label onclick="mostrarAyuda('Password');">Contraseña:</label>
        <input type="password" name="Password" id="password" value="<?php echo $usuario->password ?>" class='form-control' maxlength="64" required>
    </div>

    <div class="col-md-12">
        <label>Confirmar contraseña:</label>
        <input type="password" name="ConfirmPassword" id="confirmpassword" value="<?php echo $usuario->password ?>" class='form-control' maxlength="64" required>
    </div>
    <div id="validarPwd" class="error"></div>

    <div class="col-md-12 pull-right">
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </div>
</form>

<?php
// Seleccionar el valor adecuado en las listas
if (isset($usuario)) {
    if (!empty($usuario->sexo)) {
?>
        <script>
            seleccionarSexo('<?php echo $usuario->sexo ?>');
        </script>
    <?php
    }
    if (!empty($usuario->tipoUsuario)) {
    ?>
        <script>
            seleccionarTipo('<?php echo $usuario->tipoUsuario ?>');
        </script>
<?php
    }
}
?>