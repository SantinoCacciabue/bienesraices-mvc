<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $r){
        $errores = [];

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                
                $resultado = $auth->existeUser();
                if(!$resultado){
                    //Verificar si el usuario existe
                    $errores = Admin::getErrores();
                }
                else{
                    //verificar contraseña
                    $autenticado = $auth->comprobarPass($resultado);
                    if(!$autenticado){
                        $errores = Admin::getErrores();
                    }else{
                        //autenticar usuario
                        $auth->autenticar();
                    }
                    
                }
            }
        }

        $r->render("auth/login",[
            "errores"=>$errores,

        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header("Location: /");
    }

}