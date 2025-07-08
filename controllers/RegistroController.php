<?php

namespace Controllers;

use MVC\Router;

class RegistroController {

    public static function crear (Router $router) {

        $router->render('registro/crear',[
            'titulo' => 'Finalizar Registro'
        ]);

    }

       public static function gratis (Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            if (!isAuth()) {
                header('Location:'.BASE_URL.'login');
            }
            $token = uniqid(rand(),true);
            debuguear($token);
        }
    }


}