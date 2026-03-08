
<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración SMTP de Mailtrap
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';       // Cambia si tu SMTP es distinto
    $mail->SMTPAuth = true;
    $mail->Username = '7399ea21a847ed';         // ⚠️ Sustituye esto
    $mail->Password = 'c8445ce5ac153c';      // ⚠️ Sustituye esto
    $mail->Port = 2525;

    // Remitente y destinatario (ficticios)
    $mail->setFrom('formulario@localhost.com', 'Mi Formulario');
    $mail->addAddress('prueba@localhost.com'); // El receptor solo se ve en Mailtrap

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje del formulario';
    $mail->Body = 'name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Mensaje:<br>' . nl2br($_POST['message']);

    $mail->send();
    echo "Mensaje enviado correctamente. Revisa Mailtrap.";
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}";
}
