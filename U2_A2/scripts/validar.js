// UnADM. funciones de validación de datos

function validarEntero(ctrl, requerido) {
    if (!ctrl) {
        console.error('ctrl inválido en validarEntero');
        return;
    }
    let valor = ctrl.value;

    if(requerido && !valor){
        alert('El dato es requerido');
        ctrl.focus();
        return false;
    }

    if(isNaN(valor)) {
        alert('El dato debe ser numérico');
        ctrl.focus();
        return false;
    }

    return true; // pasó las validaciones
}

function validarTexto(ctrl, requerido) {
    if (!ctrl) {
        console.error('ctrl inválido en validarTexto');
        return;
    }

    let valor = ctrl.value;

    if(requerido && !valor){
        alert|('El dato es requerido');
        ctrl.focus();
        return false;
    }

    if(!isNaN(valor)) {
        alert('El dato debe ser texto, debe contener carateres alfanuméricos');
        ctrl.focus();
        return false;
    }

    return true; // pasó las validaciones
}

function valildarPassword(pwd) {
    // https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
    let regEx = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/;

    if(!regEx.test(pwd)) {
        return false;
    }

    return true;
}
