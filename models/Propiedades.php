<?php

namespace Model;


class Propiedades extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'calle', 'precio', 'imagen', 'descripcion'];


    public $id;
    public $calle;
    public $precio;
    public $imagen;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->calle = $args['calle'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';

    }

    public function validar() {

        if(!$this->calle) {

            self::$errores[] = "Debes añadir una calle";
        }

        if(!$this->precio) {

            self::$errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {

            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        

        if(!$this->id )  {

            $this->validarImagen();
        }

        return self::$errores;
    }

    public function validarImagen() {

        if(!$this->imagen ) {
            
            self::$errores[] = 'La Imagen es Obligatoria';
        }
    }



}