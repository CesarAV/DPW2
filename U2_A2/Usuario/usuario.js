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
