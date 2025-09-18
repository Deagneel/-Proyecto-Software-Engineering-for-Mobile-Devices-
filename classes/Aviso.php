<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Aviso {
    protected $nombre;
    protected $proyecto;

    public function __construct($nombre, $proyecto)
    {
        $this->nombre = $nombre;
        $this->proyecto = $proyecto;
    }

    public function enviarAviso() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '55732a6e751c6f';
        $mail->Password = 'b2d9071048f9f0';

        $mail->setFrom('cuentas@proyecto.com');
        $mail->addAddress('cuentas@proyecto.com', 'SEFMD.com');
        $mail->Subject = 'AVISO IMPORTANTE SOBRE PROYECTO';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Tu proyecto <strong>" . $this->proyecto . "</strong> está a punto de terminar</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000'>" . "para terminar con los pendientes</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;


        // Enviar el email
        $mail->send();
    }
}