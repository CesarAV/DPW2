<?php
$colAlign = "col-lg-4 col-md-6 col-sm-12";
?>

<form method="post" onsubmit="return validarUsuario();">
    <div class="container">
        <div class="row">
            <div class="<?= $colAlign ?>">
                <label class="form-label">Identificador:</label>
                <input type="text" name="IDUsuario" id="idusuario" value="<?php echo $usuario->id ?>" class='form-control' maxlength="4" required
                data-bs-toggle="tooltip" data-bs-title="Identificador único de usuario">
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label" onclick="mostrarAyuda('Nombre');">Nombre(s):</label>
                <input type="text" name="Nombre" id="nombre" value="<?php echo $usuario->nombre ?>" class='form-control' maxlength="128" required
                data-bs-toggle="tooltip" data-bs-title="Nombre de pila del usuario">
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label">Apellido paterno:</label>
                <input type="text" name="ApellidoPaterno" id="apellidopaterno" value="<?php echo $usuario->apellidoPaterno ?>" class='form-control' maxlength="128" required>
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label">Apellido materno:</label>
                <input type="text" name="ApellidoMaterno" id="apellidomaterno" value="<?php echo $usuario->apellidoMaterno ?>" class='form-control' maxlength="128">
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label">Edad:</label>
                <input type="number" name="Edad" id="edad" value="<?php echo $usuario->edad ?>" class='form-control' 
                data-bs-toggle="tooltip" data-bs-title="edad opcional">
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label">Sexo:</label>
                <select name="Sexo" id="sexo" class="form-control" data-bs-toggle="tooltip" data-bs-title="sexo opcional">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Sin especificar">Sin especificar</option>
                </select>
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label">Correo electrónico:</label>
                <input type="text" name="Email" id="email" value="<?php echo $usuario->email ?>" class='form-control' maxlength="128"
                data-bs-toggle="tooltip" data-bs-title="correo electrónico de contacto">
            </div>

            <!-- TipoUsuario. Solo se puede registrar tipo padre de familia -->
            <div class="<?= $colAlign ?>">
                <label class="form-label">Tipo de usuario:</label>
                <select name="TipoUsuario" id="tipousuario" class="form-control"
                 data-bs-toggle="tooltip" data-bs-title="Sólo puede registrarse como padre de familia">
                    <option value="PDC" disabled>Personal del depto. de cobranza</option>
                    <option value="PF" selected>Padre de familia</option>
                </select>
            </div>

            <div class="<?= $colAlign ?>">
                <label class="form-label" onclick="mostrarAyuda('Password');">Contraseña:</label>
                <input type="password" name="Password" id="password" value="<?php echo $usuario->password ?>" class='form-control' maxlength="64" required
                data-bs-toggle="tooltip" data-bs-title="Longitud mínima de 8 posiciones; letras, números y por lo menos un carácter especial (#,$,-,_,&,%)">
                <label class="form-label">Confirmar contraseña:</label>
                <input type="password" name="ConfirmPassword" id="confirmpassword" value="<?php echo $usuario->password ?>" class='form-control' maxlength="64" required
                data-bs-toggle="tooltip" data-bs-title="Debe coincidir con la contraseña para guardar">
                <div id="validarPwd" class="error" hidden></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                    </svg>
                    Guardar
                </button>
            </div>
        </div>
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

<script>
    initBSTooltips();
</script>