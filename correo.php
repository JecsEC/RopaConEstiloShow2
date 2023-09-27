<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $mensaje .= "<p>$nombre</p>";
    $mensaje .= "<p>$email</p>";
    

    // Obtener el nombre del archivo de imagen
    $imagenNombre = $_FILES["imagen"]["name"];
    // Obtener la ubicación temporal del archivo de imagen
    $imagenTmp = $_FILES["imagen"]["tmp_name"];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar el servidor SMTP
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Habilitar salida de depuración detallada
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // debe estar desactivado para poder devolver una alerta en el formulario
        $mail->isSMTP(); //Enviar usando SMTP
        $mail->Host = 'smtp.gmail.com'; //Configura el servidor SMTP para enviar
        $mail->SMTPAuth = true; //Habilitar autenticación SMTP
        $mail->Username = 'tequeloco13@gmail.com'; //nombre de usuario SMTP
        $mail->Password = 'xpcejxbuswzjnctf'; //Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Habilitar cifrado TLS implícito
        $mail->Port = 465; // Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Configurar el correo
        $mail->setFrom('tequeloco13@gmail.com', 'Mailer'); // Emisor correo que esta mandando el mensaje
        $mail->addAddress('tequeloco13@gmail.com', 'Mensaje de Prueba'); // Receptor aqui va al correo que quieras mandar
        // $mail->addAddress('estradahuamanluis3@gmail.com', 'Luis Prueba'); // Segundo receptor - opcional
        $mail->addReplyTo('tequeloco13@gmail.com', 'Information'); // dirección de correo electrónico a la que deben enviarse las respuestas cuando un destinatario haga clic en "Responder" 
        // $mail->addCC('cc@example.com'); // destinatarios en copia carbono (CC) 
        // $mail->addBCC('bcc@example.com'); // destinatarios en copia oculta (BCC) shirleytamarazapata@gmail.com
        
        $mail->addAttachment($imagenTmp, $imagenNombre); // Agregar la imagen como archivo adjunto - opcional
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo que no sean HTML';

        // Enviar el correo
        $mail->send();

        // Redirigir con mensaje de éxito
        header("Location: index.php?envio=exitoso");
    } catch (Exception $e) {
        // Redirigir con mensaje de error
        header("Location: index.php?envio=error&mensaje={$mail->ErrorInfo}");
        exit; // Asegúrate de salir después de redirigir
    }
} else {
    // Redirigir si se intenta acceder directamente a correo.php sin enviar el formulario
    header("Location: index.php");
}
?>
