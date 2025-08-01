<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = "propiedades";
    protected static $columnasDB = ["id","titulo","precio","imagen","descripcion","habitaciones","wc","garaje","creado","vendedores_id"];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $garaje;
    public $creado;
    public $vendedores_id;

    public function __construct($args=[])
    {
        $this->id = $args["id"]??"";
        $this->titulo = $args["titulo"]??"";
        $this->precio = $args["precio"]??"";
        $this->imagen = $args["imagen"]?? "";
        $this->descripcion = $args["descripcion"]??"";
        $this->habitaciones = $args["habitaciones"]??"";
        $this->wc = $args["wc"]??"";
        $this->garaje = $args["garaje"]??"";
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $args["vendedores_id"]?? "";

    }
    public function validar(){
            if(!$this->titulo){
                self::$errores[]= "Debes añadir un título";
            }
            if(!$this->precio){
                self::$errores[]= "Debes añadir un precio";
            }
            if(strlen($this->descripcion)<50){
                self::$errores[]= "Debes añadir una descripcion con más de 50 caracteres";
            }
            if(!$this->habitaciones){
                self::$errores[]= "Debes indicar la cantidad de habitaciones";
            }
            if(!$this->wc){
                self::$errores[]= "Debes indicar la cantidad de baños";
            }
            if(!$this->garaje){
                self::$errores[]= "Debes indicar la cantidad de estacionamientos";
            }
            if(!$this->vendedores_id){
                self::$errores[]= "Debes elegir un vendedor";
            }
            if(!$this->imagen){
                 self::$errores[] = "Debes añadir una imagen";
            }
            return self::$errores;
        }
}
