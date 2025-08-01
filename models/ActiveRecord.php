<?php

namespace Model;

class ActiveRecord
{
    //base de datos

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = "";

    //Validacion
    protected static $errores = [];


    //definir conexióna la BD

    public static function setDB($db)
    {
        self::$db = $db;
    }


    public function create()
    {

        //Sanitizar datos 
        $atributos = $this->sanitizar();

        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(", ", array_keys($atributos));
        $query .= " )  values ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /admin?resultado=1");
        }
    }
    public function update()
    {
        $atributos = $this->sanitizar();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(", ", $valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /admin?resultado=2");
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === "id") continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizar()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Validacion
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static $errores = [];
        return static::$errores;
    }

    public function setImage($img)
    {

        //Elimina imagen previa
        if (isset($this->id)) {
            $this->deleteImg();
        }

        if ($img) {
            $this->imagen = $img;
        }
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $result = self::consultarSQL($query);
        return $result;
    }

    //Obtener determinada cantidad de registros
    public static function get($limit)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ". $limit;

        $result = self::consultarSQL($query);
        return $result;
    }

    protected static function consultarSQL($query)
    {
        //Consultar la BD
        $r = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while ($row = $r->fetch_assoc()) {
            $array[] = static::mapear($row);
        }
        //Liberar memoria
        $r->free();

        //Retornar resultados
        return $array;
    }

    protected static function mapear($array)
    {
        $objeto = new static;
        foreach ($array as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }



    //Buscar un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=$id";
        $r = self::consultarSQL($query);
        return array_shift($r);
    }


    //Sincronizar el objeto con los nuevos datos
    public function sync($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function delete()
    {
        $query = "DELETE FROM " . static::$tabla . " where id= " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado =  self::$db->query($query);
        if ($resultado) {
            $this->deleteImg();
            header("Location: /admin?resultado=3");
        }
    }

    public function deleteImg()
    {
        if (file_exists(carpetaImagenes . $this->imagen)) {
            unlink(carpetaImagenes . $this->imagen);
        }
    }
}
