<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Paquete;
use Model\Usuario;
use Model\Hora;
use Model\Dia;
use Model\Ponente;
use Model\Evento;
use Model\Categoria;



class RegistroController {

    public static function crear (Router $router) {

        if (!isAuth()) {
            header('Location:'.BASE_URL);
        }
        $registro = Registro::where('usuario_id',$_SESSION['id']);

       /* if (isset($registro) && $registro->paquete_id ==="3") {
            header('Location:'. BASE_URL. 'boleto?id='. urlencode($registro->token));
        }*/
        $router->render('registro/crear',[
            'titulo' => 'Finalizar Registro',
            'registro' => $registro
        ]);

    }

       public static function gratis (Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

           
            if (!isAuth()) {
                header('Location:'.BASE_URL.'login');
            }
        $registro = Registro::where('usuario_id',$_SESSION['id']);

        if (isset($registro) && $registro->paquete_id ==="3") {
            header('Location:'. BASE_URL. 'boleto?id='. urlencode($registro->token));
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
 public static function pagar (Router $router) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!isAuth()) {
            header('Location:'.BASE_URL.'login');
            exit;
        }

        if (empty($_POST)) {
            header('Content-Type: application/json');
            echo json_encode([]);
            exit;
        }

        $datos = $_POST;

        $datos['token'] = substr(uniqid(rand(),true),0,8);
        $datos['usuario_id'] = $_SESSION['id'];

        try {
            $registro = new Registro($datos);
            $resultado = $registro->guardar();
            header('Content-Type: application/json');
           echo json_encode(['resultado' => $resultado ? 'ok' : 'error']);

            exit;
        } catch (\Throwable $th) {
            header('Content-Type: application/json');
            echo json_encode([
                'resultado' => 'error',
                'mensaje' => $th->getMessage()
            ]);
            exit;
        }
    }
}

public static function conferencias (Router $router) {

if(!isAuth()){
    header('Location:'.BASE_URL.'login');
}

$usuario_id = $_SESSION['id'];
$registro = Registro::where('usuario_id',$usuario_id);

if (!$registro || !in_array($registro->paquete_id, ['1', '2', '3'])) {
    header('Location:' . BASE_URL);
    exit;
}

       
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

        $router->render('registro/conferencias',[
            'titulo'=> 'Elige Workhops & Conferencias',
            'eventos' => $eventos_formateados
            

        ]);
    }

}