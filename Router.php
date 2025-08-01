<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION["login"] ?? null;

        //array de rutas protegidas
        $rutas_protegidas = ["/admin","/propiedades/create","/propiedades/update", "/propiedades/delete","/vendedores/create","/vendedores/update","/vendedores/delete"];
        $urlActual = $_SERVER["PATH_INFO"] ?? "/";
        $metodo = $_SERVER["REQUEST_METHOD"];

        if ($metodo === "GET") {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger rutas
        if(in_array($urlActual,$rutas_protegidas) && !$auth){
            header("Location: /");
        }

        if ($fn) {
            //la url existe
            call_user_func($fn, $this);
        } else {
            //la url no existe
            echo "Página inexistente";
        }
    }

    //Mostrar una vista

    public function render($view, $datos=[])
    {
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();//almacena en memoria
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //limpia lo que esta en memoria
        include __DIR__ . "/views/layout.php";
    }
}
