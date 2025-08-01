<?php
namespace Model;

class Admin extends ActiveRecord{
    //Base de datos
    protected static $tabla = "users";
    protected static $columns = ["id","email","password"];
    
    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";

        
    }

    public function validar()
    {
        if(!$this->email){
            self::$errores[] = "El email es obligatorio"; 
        }
        if(!$this->password){
            self::$errores[] = "La contraseña es obligatoria"; 
        }
        return self::$errores;
    }

    public function existeUser(){
        //revisar si el usuario existe
        $query = "select * from " . self::$tabla . " where email = '" . $this->email . "' limit 1";

        $resultado = self::$db->query($query);

        if(!$resultado ->num_rows){
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function comprobarPass($resultado){
        $user = $resultado->fetch_object();
        
        $autenticado = password_verify($this->password,$user->password);

        if(!$autenticado){
            self::$errores[] = "Contraseña incorrecta";
        }
        return $autenticado;
    }
    public function autenticar(){
        session_start();
        //llenar arreglo de sesión
        $_SESSION["usuario"] = $this->email;
        $_SESSION["login"] = true;
        header("Location: /admin");
    }
}