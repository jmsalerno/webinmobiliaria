<?php

namespace Controllers;
use MVC\Router;
use Model\User;


class LoginController {

    public static function login (Router $router){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new User($_POST);
            $errores = $auth->validar();
        
            if(empty($errores)) {

                $resultado = $auth->existeUsuario();
                     
                if( !$resultado ) {

                    $errores = User::getErrores();

                } else {

                    $auth->comprobarPassword($resultado);

                    if($auth->autenticado) {

                       $auth->autenticar();

                    } else {

                        $errores =User::getErrores();
                    }
                }
            }
        }


        $router->render('auth/login', [

            'errores' => $errores
        ]);
    }

    public static function logout() {

        // session_start();

        $_SESSION = [];
        
        header('Location: /');
    }

}
