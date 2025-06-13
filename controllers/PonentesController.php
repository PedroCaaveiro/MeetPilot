<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {

    public static function index(Router $router) {
$alertas = [];
$ponentes = Ponente::all();


 if (isset($_GET['creado']) && $_GET['creado'] == '1') {
        $alertas['exito'][] = 'Ponente creado correctamente.';
    }
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencias',
            'alertas' => $alertas,
            'ponentes'=>$ponentes
        ]);
    }

    public static function crear(Router $router) {
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['imagen']['tmp_name'])) {
    $carpeta_imagenes = 'public/img/speakers';

    if (!is_dir($carpeta_imagenes)) {
        mkdir($carpeta_imagenes, 0755, true);
    }

    $nombre_imagen = md5(uniqid(rand(), true));

    try {
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800);

        $imagen_png = clone $image;
        $imagen_webp = clone $image;
        $imagen_avif = clone $image;

        $imagen_png->encode('png', 80);
        $imagen_webp->encode('webp', 80);
        $imagen_avif->encode('avif', 80);

        $_POST['imagen'] = $nombre_imagen;
    } catch (\Exception $e) {
        $alertas[] = 'Error al procesar la imagen.';
    }
}

if (isset($_POST['redes']) && is_array($_POST['redes'])) {
        $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
    }


            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                if (isset($imagen_png, $imagen_webp, $imagen_avif)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                    $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . ".avif");
                }

              $resultado = $ponente->guardar();

              if ($resultado) {
               header('Location: ' . BASE_URL . 'admin/ponentes?creado=1');
                exit;

              }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponentes',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }
}
