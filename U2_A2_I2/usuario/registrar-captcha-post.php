<?php
include("../comun/session-handler.php");
$uri = 'http://' . $_SERVER['HTTP_HOST'];
$uriInicio = $uri . '/index.php';
$message = '';
if (!isset($_POST) || empty($_POST) || !isset($_POST['token'])) {
    // llamada invalida
    header('location: ' . $uriInicio);
    exit;
}

// codigo copiado y adaptado de https://codigonaranja.com/como-agregar-recaptcha-v3-formularios-de-php
// Ingresa tu clave secreta.....
define("RECAPTCHA_V3_SECRET_KEY", '6LfltqYpAAAAAG9YFCalpOguA8L7zQ6FYGrh6M68');
$token = $_POST['token'];
$action = $_POST['action'];
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verificar la respuesta
$validCaptcha = $arrResponse["success"] == '1' &&
    $arrResponse["action"] == $action &&
    $arrResponse["score"] >= 0.5;

if($validCaptcha) {
    // Si entra aqui, es un humano, puedes procesar el formulario
	// echo "ok!, eres un humano";
    if (!isset($usuario) || empty($usuario)) {
        $usuario = new Usuario();
    }
    $usuario->asignarValores($_POST);

    // Validar que las contraseñas coincidan
    if (!$usuario->confirmPwd($_POST["ConfirmPassword"])) {
        $message = $usuario->lastError;
    } else {    
        if ($usuario->crearUsuario()) {
            // Usuario creado, firmar y continuar
            if($usuario->iniciarSesion($_POST)) {
                header("location: $uriInicio?mensaje=registro exitoso&class=alert alert-success");
                exit;
            }
        }
        else {
            // Regresar a 'registrar'
            $_SESSION["FallaRegistrarUsuario"] = $usuario;
            header("location: $uri/usuario/registrar-captcha.php");
            exit;
        }
    }    
} else {
    // Si entra aqui, es un robot....
	$message = "Lo lamentamos, no contamos con elementos suficientes para identificar que es un humano y registrarlo.";
}

if(!empty($message)) {
    // Agregar mensaje para el usuario
    $uriInicio .= "?mensaje=$message&class=alert alert-danger";
}
header("location: $uriInicio");
exit;
?>