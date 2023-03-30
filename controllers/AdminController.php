<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedades;
use Intervention\Image\ImageManagerStatic as Image;


class AdminController {


    public static function index (Router $router){

        $propiedades = Propiedades::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/index', [

            'propiedades' => $propiedades,
            'resultado' => $resultado

        ]);
    }

    public static function crear (Router $router){

        $errores = Propiedades::getErrores();
        $propiedad = new Propiedades;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $propiedad = new Propiedades($_POST['propiedad']);

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {

                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

                $propiedad->setImagen($nombreImagen);
            }

            // Validar
            $errores = $propiedad->validar();

            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {

                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $resultado = $propiedad->guardar();

                if($resultado) {

                    header('location: /admin?resultado=1');
                }
            }
        }

        $router->render('admin/crear', [

            'errores' => $errores,
            'propiedad' => $propiedad,
        ]);
    }

    public static function actualizar (Router $router){

        $id = validarORedireccionar('/admin');

        $propiedad = Propiedades::find($id);

        $id = Propiedades::validarId($id);

        $errores = Propiedades::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            // Validación
            $errores = $propiedad->validar();

            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }


            
            if(empty($errores)) {
                // Almacenar la imagen
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                // Guarda en la base de datos
                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('location: /admin?resultado=2');
                }
            }

        }

        $router->render('admin/actualizar', [

            'propiedad' => $propiedad,
            'errores' => $errores

        ]);

    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            // encontrar y eliminar la propiedad
            $propiedad = Propiedades::find($id);
            $resultado = $propiedad->eliminar();

            // Redireccionar
            if($resultado) {

                header('location: /admin?resultado=3');

            }

        }
        
    }

}