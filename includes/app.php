<?php 

use Dotenv\Dotenv;
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();



$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$isLocalhost = ($host === 'localhost' || $host === '127.0.0.1' || strpos($host, 'localhost') === 0 || strpos($host, '127.0.0.1') === 0);

if ($isLocalhost) {
    $base = 'http://127.0.0.1:3000/index.php/';
    $assets = 'http://127.0.0.1:3000/';
} else {
    $base = 'https://midominio.com/public/index.php/';
    $assets = 'https://midominio.com/public/';
}

// Definir constantes para usarlas en toda la app
define('BASE_URL', $base);
define('ASSETS_URL', $assets);
/*



require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);