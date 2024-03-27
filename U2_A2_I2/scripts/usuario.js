// Funciones de usuario
// César A. V. UnADM ES1521204253

function mostrarAyuda(campo) {
    let texto;
    switch (campo) {
        case 'IDUsuario':
            texto = 'Identificador único de usuario';
            break;
        case 'nombre':
            texto = 'Campo para el nombre del usuario';
            break;
        case 'password':
            texto = 'Contraseña. 8 caracteres, incluir letras, numeros y un caracter especial';
            break;
        default:
            throw (`Incluir ayuda para el campo '${campo}'`);
    }
    if (texto) {
        alert(texto);
    }
}

function validarUsuario() {
    try {
        // Nombre debe ser texto
        let ctrlNombre = document.getElementById('nombre');
        if (!validarTexto(ctrlNombre, true)) {
            mostrarMensaje('capturar nombre')
            return false;
        }

        // Password debe coincidir
        let pwd = document.getElementById('password');
        let confirmPwd = document.getElementById('confirmpassword');
        if (!pwd.value || pwd.value != confirmPwd.value) {
            mostrarMensaje("Las contraseñas no coinciden", 'validarPwd');
            return false;
        }

        if (!validarPassword(pwd.value)) {
            mostrarMensaje("La contraseña debe contener minimo 8 letras, números, un carácter especial.", 'validarPwd');
            return false;
        }
    } catch (e) {
        console.error(e);
        return false;
    }

    return true;
}

function seleccionarSexo(sexo) {
    // Ids corresponden con los usados en "form-usuario.php"
    let sel = getCtrl('sexo');
    if (sel) {
        return selectOption(sel, sexo);
    }
}

function seleccionarTipo(tipoUsuario) {
    // Ids corresponden con los usados en "form-usuario.php"
    let sel = getCtrl('tipousuario');
    if (sel) {
        return selectOption(sel, tipoUsuario);
    }
}