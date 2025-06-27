<?php

namespace Controllers;


use MVC\Router;

class PaginaController {

    public static function index(Router $router) {

            $router->render('paginas/index',[

                'titulo' => 'Inicio'
            ]);


    }
     public static function evento(Router $router) {

            $router->render('paginas/meetpilot',[

                'titulo' => 'Sobre MeetPilot'
            ]);


    }

      public static function paquetes(Router $router) {

            $router->render('paginas/paquetes',[

                'titulo' => 'Paquetes MeetPilot'
            ]);


    }
      public static function conferencias(Router $router) {

            $router->render('paginas/workshops-conferencias',[

                'titulo' => 'Conferencias & Workshops'
            ]);


    }
}