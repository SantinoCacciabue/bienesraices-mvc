<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = "vendedores";
    protected static $columnasDB = ["id", "nombre", "apellido", "telefono"];
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un apellido";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un telefono";
        }

        if(!preg_match("/[0-9]{8}/",$this->telefono)){
            self::$errores[] = "El telefono debe ser válido";
        }

        return self::$errores;
    }
}
