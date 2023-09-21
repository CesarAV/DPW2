<form method="post" onsubmit="return validarUsuario();">
    <div class="col-md-12">
        <label onclick="mostrarAyuda('IDUsuario');">Identificador:</label>
        <input type="text" name="IDUsuario" id="idusuario"
            value="<?php echo $idUsuario ?>"
            class='form-control' maxlength="4" required>
    </div>

    <div class="col-md-12">
        <label onclick="mostrarAyuda('Nombre');">Nombre:</label>
        <input type="text" name="Nombre" id="nombre"
            value="<?php echo $nombre ?>"
            class='form-control' maxlength="128" required>
    </div>

    <div class="col-md-12">
        <label>Apellido paterno:</label>
        <input type="text" name="ApellidoPaterno" id="apellidopaterno"
            value="<?php echo $apellidoPaterno ?>"
            class='form-control' maxlength="128" required>
    </div>

    <div class="col-md-12">
        <label>Apellido materno:</label>
            <input type="text" name="ApellidoMaterno" id="apellidomaterno"
                value="<?php echo $apellidoMaterno ?>"
                class='form-control' maxlength="128">
    </div>

    <div class="col-md-12">
        <label>Departamento:</label>
            <input type="text" name="Departamento" id="departamento"
                value="<?php echo $departamento ?>"
                class='form-control' maxlength="64">
    </div>

    <!-- TipoUsuario -->
    <div class="col-md-12">
        <label>Tipo de usuario:</label>
        <select name="TipoUsuario">
            <option value="AD" disabled>Administrador</option>
            <option value="CO" selected>Cond&oacute;mino</option>
        </select>
    </div>

    <div class="col-md-12">
        <label onclick="mostrarAyuda('Password');">Contraseña:</label>
        <input type="password" name="Password" id="password"
        value="<?php echo $password ?>"
        class='form-control' maxlength="100" required>
    </div>
    
    <div class="col-md-12">
        <label>Confirmar contraseña:</label>
        <input type="password" name="ConfirmPassword" id="confirmpassword"
        value="<?php echo $password ?>"
        class='form-control' maxlength="100" required>
    </div>
    <div id="validarPwd" class="error"></div>

    <div class="col-md-12 pull-right">
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </div>
</form>