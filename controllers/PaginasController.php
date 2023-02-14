<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => true
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'a45f0b4e0b0155';
            $mail->Password = '56c06e3daa0244';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configuarar el contenido del mail
            $mail -> setFrom('admin@bienesraices.com');
            $mail -> addAddress('branmeco17@gmail.com', 'BienesRaices.com');
            $mail -> Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html><p>Tienes un nuevo mensaje</p></html>';

            $mail -> Body = $contenido;
            $mail -> AltBody = 'Esta es texto alternativo sin HTML';

            //Enviar el email
            if($mail->send()){
                echo "Mensaje enviado Correctamente";
            }else{
                echo "El mensaje no se pudo enviar...";
            }
        }
        $router->render('paginas/contacto', []);
    }
}
