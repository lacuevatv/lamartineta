<?php
require_once('../config.php');
require("class.phpmailer.php");
require("class.smtp.php");

$respuesta = array(
    'error' => false,
    'mensaje' => '',
    'status' => 'ok'
);

$token = $_POST['token'];
$action = $_POST['action'];
//var_dump($_POST);

//validar captcha
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verify the response
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = SMTP_HOST;  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = SMTP_USUARIO;  // Mi cuenta de correo
    $smtpClave = SMTP_CLAVE;  // Mi contraseña

    // Email donde se enviaran los datos cargados en el formulario de contacto
    $emailDestino = EMAIL_DESTINO_RESERVA;
    $asunto = ASUNTO_FORMULARIO_RESERVA;
    filter_var ( $smaller, FILTER_SANITIZE_STRING);
    //data formulario
    $email = isset( $_POST['email'] ) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $name = isset( $_POST['name'] ) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : '';
    $tel = isset( $_POST['tel'] ) ? filter_var($_POST['tel'], FILTER_SANITIZE_STRING) : '';
    $datein = isset( $_POST['datein'] ) ? filter_var($_POST['datein'], FILTER_SANITIZE_STRING) : '';
    $dateout = isset( $_POST['dateout'] ) ? filter_var($_POST['dateout'], FILTER_SANITIZE_STRING) : '';
    $pasajeros = isset( $_POST['pasajeros'] ) ? filter_var($_POST['pasajeros'], FILTER_SANITIZE_NUMBER_INT) : '';
    $msj = isset( $_POST['msj'] ) ? filter_var($_POST['msj'], FILTER_SANITIZE_STRING) : '';
    
    $mensaje = '<div>';
    $mensaje .= '<p>Nombre: '.$name.'</p>';
    $mensaje .= '<p>Email: '.$email.'</p>';
    $mensaje .= '<p>Tel: '.$tel.'</p>';
    $mensaje .= '<p>Fecha de entrada: '.$datein.'</p>';
    $mensaje .= '<p>Fecha de salida: '.$dateout.'</p>';
    $mensaje .= '<p>Cantidad de personas: '.$pasajeros.'</p>';
    $mensaje .= '<p>Mensaje: '.$msj.'</p>';
    $mensaje .= '</div>';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 465; 
    $mail->SMTPSecure = 'ssl';
    $mail->IsHTML(true); 
    $mail->CharSet = "utf-8";

    // VALORES A MODIFICAR //
    $mail->Host = $smtpHost; 
    $mail->Username = $smtpUsuario; 
    $mail->Password = $smtpClave;

    $mail->From = SMTP_USUARIO; // Email desde donde envío el correo.
    $mail->FromName = TITLE_PAGE;
    $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->AddReplyTo($email, $name);
    $mail->Subject = $asunto; // Este es el titulo del email.
    $mensajeHtml = nl2br($mensaje);
    $mail->Body = "{$mensajeHtml} <br /><br />"; // Texto del email en formato HTML
    $mail->AltBody = "{$mensaje} \n\n"; // Texto sin formato HTML
    // FIN - VALORES A MODIFICAR //

    $estadoEnvio = $mail->Send(); 
    if($estadoEnvio){
        $respuesta['mensaje'] = MENSAJE_EXITO;
    } else {
        $respuesta['error'] = true;
        $respuesta['status'] = 'error-email';
        $respuesta['mensaje'] = MENSAJE_ERROR;
    }
} else {
    $respuesta['error'] = true;
    $respuesta['status'] = 'error-recaptcha';
    $respuesta['mensaje'] = MENSAJE_ERROR;
}

echo json_encode( $respuesta );