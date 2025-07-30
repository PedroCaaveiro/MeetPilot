<?php

function iniciarSesionSiNoIniciada() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function debuguear($variable): string {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}


function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function paginaActual($path): bool {
    return str_contains($_SERVER['REQUEST_URI'], $path);
}


function isAuth(): bool {
    iniciarSesionSiNoIniciada();
    return isset($_SESSION['nombre']) && !empty($_SESSION['nombre']);
}

function isAdmin(): bool {
    iniciarSesionSiNoIniciada();
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}


function aosAnimation() : void{
 $efectos = ['flip-left','flip-right','flip-up','zoom-in','zoom-in-right','zoom-in-left','zoom-in-down','fade-down-right','fade-up-left'];

 $efecto = array_rand($efectos,1);
 echo $efectos[$efecto];
}