<?php

namespace Model;

class ActiveRecord {


    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = []; 
    protected static $errores = [];

    public static function setDB($database) {

        self::$db = $database;
    }

    public static function getErrores() {

        return static::$errores;
    }

    public function validar() {

        static::$errores = [];
        
        return static::$errores;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function get($limite) {
        
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function find($id) {
        
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift( $resultado );
    }

    public static function search($calle) {

        $query = "SELECT * FROM " . static::$tabla . " WHERE calle LIKE '%$calle%'";

        $resultado = self::consultarSQL($query);

        return $resultado;

    }

    

    public function crear() {
        
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar() {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function eliminar() {
        // Eliminar el registro

        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado) {
            
            $this->borrarImagen();
        }

        return $resultado;
    }

    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    public function setImagen($imagen) {

        // Elimina la imagen previa
        if( !is_null($this->id) ) {

            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen() {

        // Comprobar si existe el archivo

        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if($existeArchivo) {

            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }


    public static function validarId($id) {

        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        // debuguear($resultado);

        if(!$resultado){

            header("Location: /propiedades " );
        }

        // return $resultado;

    }

    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function atributos() {

        $atributos = [];

        foreach(static::$columnasDB as $columna) {

            if($columna === 'id') continue;

            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos() {

        $atributos = $this->atributos();

        $sanitizado = [];

        foreach($atributos as $key => $value ) {

            $sanitizado[$key] = self::$db->escape_string($value);
        }
        
        return $sanitizado;
    }

    public function sincronizar($args=[]) { 

        foreach($args as $key => $value) {

          if(property_exists($this, $key) && !is_null($value)) {

            $this->$key = $value;
          }
        }
    }





}