function mostrarAyuda(campo){
    let texto;
    switch(campo){
        case 'IDUsuario':
            texto = 'Identificador unico de usuario';
            break;
        case 'Nombre':
            texto = 'Campo para el nombre del usuario';
            break;
        case 'Password':
            texto = 'Contraseña. 8 caracteres, incluir letras, numeros y un caracter especial';
            break;
        default:
            throw(`Incluir ayuda para el campo '${campo}'`);
    }
    if(texto){
        alert(texto);
    }
}

function validarUsuario() {
    // Nombre debe ser texto
    let ctrlNombre = document.getElementById('nombre');
    if(!validarTexto(ctrlNombre, true)) {
        return false;
    }
    // Password debe coincidir
    let pwd = document.getElementById('password');
    let confirmPwd = document.getElementById('confirmpassword');
    if(!pwd.value || pwd.value != confirmPwd.value) {
        mostrarMensaje("Los passwords no coinciden", 'validarPwd');
        return false;
    }

    if (!valildarPassword(pwd.value)){
        mostrarMensaje("El password debe contener minimo 8 letras, números, un carácter especial.", 'validarPwd');
        return false;
    }
}