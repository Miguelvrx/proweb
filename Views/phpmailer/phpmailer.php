<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Views\vendor\phpmailer\phpmailer\src\Exception.php';
require 'Views\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'Views\vendor\phpmailer\phpmailer\src\SMTP.php';

require 'Views\vendor\autoload.php';

$output = ''; 

if (isset($_POST['submit'])) {
    sendEmail($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
}

function sendEmail($name, $email, $subject, $message) {
    global $output;

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'migueliletl333@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('utp0150891@alumno.utpuebla.edu.mx', 'Formulario de Contacto');

        // Enviar al correo electrónico proporcionado en el formulario
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Nueva Solicitud de Contacto';

        $mail->Body = "
        <html>
        <head>
            <style>
                .email-container {
                    font-family: Arial, sans-serif;
                    color: #333;
                    line-height: 1.6;
                }
                .email-header {
                    background-color: #f4f4f4;
                    padding: 10px;
                    border-bottom: 1px solid #ddd;
                }
                .email-body {
                    padding: 20px;
                }
                .email-footer {
                    background-color: #f4f4f4;
                    padding: 10px;
                    border-top: 1px solid #ddd;
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                }
                .email-row {
                    margin-bottom: 15px;
                }
                .email-label {
                    font-weight: bold;
                    margin-right: 5px;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h2>Nueva Solicitud de Contacto</h2>
                </div>
                <div class='email-body'>
                    <div class='email-row'>
                        <span class='email-label'>Nombre:</span> $name
                    </div>
                    <div class='email-row'>
                        <span class='email-label'>Correo Electrónico:</span> $email
                    </div>
                    <div class='email-row'>
                        <span class='email-label'>Asunto:</span> $subject
                    </div>
                    <div class='email-row'>
                        <span class='email-label'>Mensaje:</span>
                        <p>$message</p>
                    </div>
                </div>
                <div class='email-footer'>
                    <p>Este mensaje fue enviado desde el formulario de contacto de su sitio web.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->send();
        $output = '<div class="alert alert-success">
                    <h6>¡Gracias! Por contactarnos, nos comunicaremos con usted pronto.</h6>
                  </div>';
    } catch (Exception $e) {
        $output = '<div class="alert alert-danger">
                    <h5>' . $e->getMessage() . '</h5>
                  </div>';
    }
}

?>