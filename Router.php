<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutaspost = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas()
    {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        
        if($fn){
            //La URL existe y hay una function asociada
            // debuguear($this);
            call_user_func($fn, $this);
        }else{
            echo 'Página No Encontrada';
        }
    }
}
