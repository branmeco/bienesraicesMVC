<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $auth = new Admin($_POST);
                $errores = $auth->validar();

                if (empty($errores)) {
                    //Verifica si el usuario existe
                    $resultado = $auth->existeUsuario();

                    if (!$resultado) {
                        //Verifica si el usuario o no (mensaje de error)
                        $errores = Admin::getErrores();
                    } else {

                        $autenticado = $auth->comprobarPassword($resultado);

                        if ($autenticado) {
                            $auth->autenticar();
                        } else {
                            $errores = Admin::getErrores();
                        }
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout()
    {
        echo "Desde logout";
    }
}
