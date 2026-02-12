<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load PHPMailer manually since we don't have Composer
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';

function sendContactEmail($data)
{
    $configFile = __DIR__ . '/../config/email_settings.json';

    if (!file_exists($configFile)) {
        throw new Exception("Archivo de configuración de correo no encontrado.");
    }

    $config = json_decode(file_get_contents($configFile), true);

    if (empty($config['smtp_host'])) {
        throw new Exception("El servidor de correo no ha sido configurado.");
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = $config['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp_user'];
        $mail->Password = $config['smtp_pass'];
        $mail->SMTPSecure = $config['smtp_secure']; // tls or ssl
        $mail->Port = $config['smtp_port'];

        // Fix for cPanel/Shared Hosting certificate issues
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom($config['from_email'], $config['from_name']);

        // Send to the admin (using the same 'from' email or a specific admin email)
        // For now, we assume the site owner wants to receive these emails at the 'from_email' address
        // or we could add an 'admin_email' field to the config. 
        // Let's settle on sending to the 'from_email' as the main contact for now.
        $mail->addAddress($config['from_email'], 'Administrador');

        // Add Reply-To header so admin can reply to the user
        $mail->addReplyTo($data['email'], $data['nombre']);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo Mensaje de Contacto: ' . $data['subject'];

        // Email Body Construction
        $body = "<h2>Nuevo mensaje desde el sitio web</h2>";
        $body .= "<p><strong>Nombre:</strong> " . htmlspecialchars($data['nombre']) . "</p>";
        $body .= "<p><strong>Email:</strong> " . htmlspecialchars($data['email']) . "</p>";
        $body .= "<p><strong>Teléfono:</strong> " . htmlspecialchars($data['telefono']) . "</p>";
        $body .= "<p><strong>Servicio de interés:</strong> " . htmlspecialchars($data['servicio']) . "</p>";
        $body .= "<p><strong>Mensaje:</strong><br>" . nl2br(htmlspecialchars($data['mensaje'])) . "</p>";
        $body .= "<br><hr><p><small>Enviado desde el formulario de contacto de InfoTech.</small></p>";

        $mail->Body = $body;
        $mail->AltBody = strip_tags(str_replace('<br>', "\n", $body));

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        // Log error if needed: error_log($mail->ErrorInfo);
        throw new Exception("Error al enviar el correo: {$mail->ErrorInfo}");
    }
}