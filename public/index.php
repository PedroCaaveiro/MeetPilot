<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\PonentesController;
use Controllers\EventosController;
use Controllers\RegistradosController;
use Controllers\RegalosController;
use Controllers\ApiEventos;
use Controllers\ApiPonentes;
use Controllers\ApiRegalos;
use Controllers\PaginaController;
use Controllers\RegistroController;



$router = new Router();


// Login
$router->get('/', [AuthController::class, 'login']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// admin
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/ponentes', [PonentesController::class, 'index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);

$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);

$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);

$router->get('/admin/eventos', [EventosController::class, 'index']);
$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);

$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);


$router->get('/api/eventos-horario',[ApiEventos::class,'index']);
$router->get('/api/ponentes',[ApiPonentes::class,'index']);
$router->get('/api/ponente',[ApiPonentes::class,'ponente']);
$router->get('/api/regalos',[ApiRegalos::class,'index']);



$router->get('/admin/registrados', [RegistradosController::class, 'index']);

$router->get('/admin/regalos', [RegalosController::class, 'index']);

$router->get('/finalizar-registro',[RegistroController::class,'crear']);
$router->post('/finalizar-registro/gratis',[RegistroController::class,'gratis']);
$router->post('/finalizar-registro/pagar',[RegistroController::class,'pagar']);
$router->get('/finalizar-registro/conferencias',[RegistroController::class,'conferencias']);
$router->post('/finalizar-registro/conferencias',[RegistroController::class,'conferencias']);

$router->get('/boleto',[RegistroController::class,'boleto']);

$router->get('/',[PaginaController::class,'index']);
$router->get('/meetpilot',[PaginaController::class,'evento']);
$router->get('/paquetes',[PaginaController::class,'paquetes']);
$router->get('/workshops-conferencias',[PaginaController::class,'conferencias']);
$router->get('/404',[PaginaController::class,'error']);

$router->comprobarRutas();