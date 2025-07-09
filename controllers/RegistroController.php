<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Paquete;
use Model\Usuario;


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
            $token = substr(uniqid(rand(),true),0,8);
            
            $datos = array(
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );
            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if($resultado){
             header('Location:'.BASE_URL.'boleto?id='. urlencode($registro->token));
            }
        }
    }

      public static function boleto (Router $router) {


            $id = $_GET['id'];
            if (!$id || strlen($id) !== 8) {
                session_start();
                 session_unset();
                 session_destroy();
                 header('Location:'.BASE_URL);
                  exit;
                
            }

            $registro = Registro::where('token',$id);
            if (!$registro) {
                session_start();
                 session_unset();
                 session_destroy();
                header('Location:'.BASE_URL);
                 exit;
            }

            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->paquete = Paquete::find($registro->paquete_id);

            
       
        $router->render('registro/boleto',[
            'titulo'=> 'Asistencia a Meetpilot',
            'registro' => $registro

        ]);
    }


}