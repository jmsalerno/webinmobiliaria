<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedades;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController {

    public static function index (Router $router){

        $propiedades = Propiedades::get(3);

        $router->render('pages/index', [

            'propiedades' => $propiedades
        ]);
    }

    public static function propiedades (Router $router){

        $propiedades = null;
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // $calle = $_POST['search'];

            $calle = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $propiedades = Propiedades::search($calle);

            // dd($propiedades);

            if($propiedades === array()) {

               $mensaje = "No se encontro ninguna propiedad con ese nombre";
            }


        }else {

            $propiedades = Propiedades::all();

        }

        $router->render('pages/propiedades', [

            'propiedades' => $propiedades,
            'mensaje' => $mensaje
        ]);
    }

    public static function propiedad (Router $router){

        $id = validarORedireccionar('/propiedades');

        $propiedades = Propiedades::find($id);

        $id = Propiedades::validarId($id);

        $router->render('pages/propiedad', [

            'propiedades' => $propiedades,

        ]);
    }

    public static function nosotros (Router $router){

        $router->render('pages/nosotros', []);
    }

    public static function contacto (Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '123d8a375adc1c';
            $mail->Password = 'daba5d7555f6e9';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;


            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= "<p><strong>Has Recibido un email:</strong></p>";
            $contenido .= "<p>Nombre: " . $respuestas['nombre'] . "</p>";
            $contenido .= "<p>Email: " . $respuestas['email'] . "</p>";
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . "</p>";


            $contenido .= '</html>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo';

            // send the message
            if(!$mail->send()){
                $mensaje = 'Hubo un Error... intente de nuevo';
            } else {
                $mensaje = 'Email enviado Correctamente';
            }

        }

        $router->render('pages/contacto', [

            'mensaje' => $mensaje,
        ]);
    }

}