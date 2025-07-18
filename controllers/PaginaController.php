<?php

namespace Controllers;


use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Model\Ponente;
use Model\Dia;
use Model\Hora;


class PaginaController {

    public static function index(Router $router) {

         $eventos = Evento::ordenar('hora_id','ASC');
        $eventos_formateados =[];

        foreach($eventos as $evento){

             $evento->categoria = Categoria::find($evento->categoria_id);
             $evento->dia = Dia::find($evento->dia_id);
             $evento->hora = Hora::find($evento->hora_id);
             $evento->ponente = Ponente::find($evento->ponente_id);
                
            if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
                 $eventos_formateados['conferencias_v'][] = $evento;
            }

             if ($evento->dia_id === '2' && $evento->categoria_id === '1') {
                 $eventos_formateados['conferencias_s'][] = $evento;
            }
              if ($evento->dia_id === '1' && $evento->categoria_id === '2') {
                 $eventos_formateados['workshops_v'][] = $evento;
            }
            
              if ($evento->dia_id === '2' && $evento->categoria_id === '2') {
                 $eventos_formateados['workshops_s'][] = $evento;
            }
            
        }

            $ponentesTotal = Ponente::total();
            $conferenciasTotal = Evento::total('categoria_id',1);
            $workshopsTotal = Evento::total('categoria_id',2);

            $ponentes = Ponente::all();



            $router->render('paginas/index',[

                'titulo' => 'Inicio',
                'eventos' => $eventos_formateados,
                'ponentesTotal' => $ponentesTotal,
                'conferenciasTotal' => $conferenciasTotal,
                'workshopsTotal' => $workshopsTotal,
                'ponentes' => $ponentes
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

        $eventos = Evento::ordenar('hora_id','ASC');
        $eventos_formateados =[];

        foreach($eventos as $evento){

             $evento->categoria = Categoria::find($evento->categoria_id);
             $evento->dia = Dia::find($evento->dia_id);
             $evento->hora = Hora::find($evento->hora_id);
             $evento->ponente = Ponente::find($evento->ponente_id);
                
            if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
                 $eventos_formateados['conferencias_v'][] = $evento;
            }

             if ($evento->dia_id === '2' && $evento->categoria_id === '1') {
                 $eventos_formateados['conferencias_s'][] = $evento;
            }
              if ($evento->dia_id === '1' && $evento->categoria_id === '2') {
                 $eventos_formateados['workshops_v'][] = $evento;
            }
            
              if ($evento->dia_id === '2' && $evento->categoria_id === '2') {
                 $eventos_formateados['workshops_s'][] = $evento;
            }
            
        }

            $router->render('paginas/workshops-conferencias',[

                'titulo' => 'Conferencias & Workshops',
                'eventos'=> $eventos_formateados
            ]);


    }

    
      public static function error(Router $router) {

            $router->render('paginas/error',[

                'titulo' => 'Pagina no Encontrada'
            ]);


    }
}