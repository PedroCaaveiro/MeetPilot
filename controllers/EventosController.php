<?php

namespace Controllers;



use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Hora;
use Model\Evento;


class EventosController{

public static function index(Router $router){

   
$router->render('admin/eventos/index',[
    'titulo'=> 'Conferencias & Workshops'

]);
}


public static function crear(Router $router){

   $alertas =[];

$categorias = Categoria::all('ASC');
$dias = Dia::all('ASC');
$horas = Hora::all('ASC');

$evento = new Evento();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $evento->sincronizar($_POST);
    $alertas = $evento->validar();
    if (empty($alertas)) {
        $resultado = $evento->guardar();

        if ($resultado) {
            header('Location:'.BASE_URL. 'admin/eventos');
        }
    }
}


$router->render('admin/eventos/crear',[
    'titulo'=> 'Registrar Eventos',
    'alertas' => $alertas,
    'categorias' => $categorias,
    'dias' => $dias,
    'horas' => $horas,
    'evento' =>$evento

]);
}

}




?>