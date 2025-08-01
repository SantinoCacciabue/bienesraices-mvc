<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function create(Router $r)
    {
        $v = new Vendedor();
        $errores = Vendedor::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //Crear una nueva instancia de vendedor
            $v = new Vendedor($_POST["vendedor"]);


            //Validar que no haya campos vacíos
            $errores = $v->validar();

            if (empty($errores)) {
                $v->create();
            }
        }
        $r->render("vendedores/create", [
            "errores" => $errores,
            "v" => $v,
        ]);
    }

    public static function update(Router $r)
    {

        $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
        $errores = Vendedor::getErrores();
        $id = validar("/admin");

        $v = Vendedor::find($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $args = $_POST["vendedor"];
            $v->sync($args);

            $errores = $v->validar();

            if (empty($errores)) {
                $v->update();
            }
        }
        $r->render("vendedores/update", [
            "v" => $v,
            "errores" => $errores

        ]);
    }

    public static function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST["type"];
                if (validarTipoContenido($tipo)) {
                    $v = Vendedor::find($id);
                    $v->delete();
                }
            }
        }
    }
}
