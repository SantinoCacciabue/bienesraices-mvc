<?php

define("templates_url",__DIR__ . "/templates");
define("functions_url",__DIR__ . "functions.php");
define("carpetaImagenes",$_SERVER["DOCUMENT_ROOT"] . "/imagenes/");

function incluirTemplate(string $nombre, bool $inicio = false){
    include templates_url . "/$nombre.php";
}

function auth(){
    session_start();
    if(!$_SESSION["login"]){
        header("Location: /");
    }
}

function debugear($a){
    echo "<pre>";
    var_dump($a);
    echo "</pre>";
    exit;
}

function s($html) : string{
    $s = htmlspecialchars($html ?? '', ENT_QUOTES, 'UTF-8');
    return $s;
}

//Validar tipo de contenido

function validarTipoContenido($tipo){
    $tipos = ["vendedor","propiedad"];
    return in_array($tipo,$tipos);
}


//Mostrar alertas
function mostrarNoti($codigo){
    $m = "";
    switch($codigo){
        case 1:
            $m = "Creado Correctamente";
            break;
        case 2:
            $m = "Actualizado Correctamente";
            break;
        case 3:
            $m = "Eliminado Correctamente";
            break;
        default:
            $m = false;
            break;
    }
    return $m;
}

function validar(string $url){
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    if(!$id){
        header("Location: $url");
    }
    return $id;
}