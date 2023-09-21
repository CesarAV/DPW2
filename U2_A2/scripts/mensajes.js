// Utilerias para mostrar mensajes de error

function mostrarMensaje(msj, idArea = 'mensajeDeUsuario') {
  // 'mensajeDeUsuario' declarado en menu.html
  let area = document.getElementById(idArea);
  area.innerText = msj;
}