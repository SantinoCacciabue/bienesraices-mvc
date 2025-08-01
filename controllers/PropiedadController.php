<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
    public static function index(Router $r)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET["resultado"] ?? null;

        $r->render("propiedades/admin", [
            "propiedades" => $propiedades,
            "resultado" => $resultado,
            "vendedores" => $vendedores
        ]);
    }

    public static function create(Router $r)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {



            $p = new Propiedad($_POST["propiedad"]);


            //Generar nombre único
            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES["propiedad"]["tmp_name"]["imagen"])->cover(800, 600);
                $p->setImage($nombreImg);
            }

            $errores = $p->validar();


            if (empty($errores)) {

                if (!is_dir(carpetaImagenes)) {
                    mkdir(carpetaImagenes);
                }


                //Subir imagen
                $imagen->save(carpetaImagenes . $nombreImg);


                $resultado = $p->create();
                if ($resultado) {
                    //Redireccionar al usuario
                    header("Location: /admin?resultado=1");
                }
            }
        }

        $r->render("propiedades/create", [
            "p" => $propiedad,
            "vendedores" => $vendedores,
            "errores" => $errores
        ]);
    }

    public static function update(Router $r)
    {
        $id = validar("/admin");
        $p = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {


            $args = $_POST["propiedad"];
            $p->sync($args);

            $imagen = null;

            $errores = $p->validar();
            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES["propiedad"]["tmp_name"]["imagen"])->cover(800, 600);
                $p->setImage($nombreImg);
            }

            //Insertar en la BD
            if (empty($errores)) {

                if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
                    $imagen->save(carpetaImagenes . $nombreImg);
                }

                $p->update();
            }
        }
        $r->render("propiedades/update", [
            "p" => $p,
            "errores" => $errores,
            "vendedores" => $vendedores
        ]);
    }
    public static function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);


            if ($id) {

                $tipo = $_POST["type"];

                if (validarTipoContenido($tipo)) {
                    $p = Propiedad::find($id);
                    $p->delete();
                }
            }
        }
    }
}
