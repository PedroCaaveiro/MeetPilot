<?php

namespace Controllers;



use MVC\Router;
use Model\Usuario;
use Model\Registro;
use Model\Evento;

class DashboardController{

public static function index(Router $router){

    $registros = Registro::get(5);
    foreach($registros as $registro){
        $registro->usuario = Usuario::find($registro->usuario_id);
    }

$virtuales = Registro::total('paquete_id',2);
$presenciales = Registro::total('paquete_id',1);

$ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);


$menos_disponible = Evento::ordenarLimite('disponibles','ASC',5);
$mas_disponible = Evento::ordenarLimite('disponibles','DESC',5);



$router->render('admin/dashboard/index',[
    'titulo'=> 'Panel de Administrador',
    'registros' => $registros,
    'ingresos' => $ingresos,
    'menos_disponible' => $menos_disponible,
    'mas_disponible' => $mas_disponible

]);
}

}




?>