<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
        /*
        MAIL_USERNAME=0d3f9dc3e0791c
        MAIL_PASSWORD=66dd89976ee729
        */
    }

    public function enviarConfirmacion(){
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '0d3f9dc3e0791c';
        $mail->Password = '66dd89976ee729';
        $mail->SMTPSecure = "tls";
        $mail->Port = 2525;
        
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has creado tu cuenta en App Salon, confirma tu cuenta presionando el siuguiente enlace</p>';
        $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/confirmar-cuenta?token='
        . $this->token . '">Confirmar Cuenta</a></p>';
        $contenido .= '<p><Si tu no solicitaste esta cuenta, puedes ingorar el mensaje/p>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        // Enviar el email
        if($mail->send()){
            echo 'Mensaje Enviado Correctamente';
        } else {
            echo $mail->ErrorInfo;
        }
    }

    public function enviarInstrucciones(){
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '0d3f9dc3e0791c';
        $mail->Password = '66dd89976ee729';
        $mail->SMTPSecure = "tls";
        $mail->Port = 2525;
        
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>';
        $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/recuperar?token='
        . $this->token . '">Reestablecer Password</a></p>';
        $contenido .= '<p><Si tu no solicitaste esta cuenta, puedes ingorar el mensaje/p>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
}