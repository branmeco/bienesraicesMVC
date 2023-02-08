<?php

namespace Controllers;
use MVC\Router;

class PropiedadController
{
    public static function index(Router $router){
        $router->render('propiedades/admin',[
            'mensaje' => 'Desde la vista',
            'propiedades' => 'Casa'
        ]);
    }
    public static function crear(){
        echo 'crear Propiedad';
    }
    public static function actualizar(){
        echo 'Actualizar propiedad';
    }
}
