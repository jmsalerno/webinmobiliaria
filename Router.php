<?php


namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn) {

        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {

        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin', '/admin/crear', '/admin/actualizar', '/admin/eliminar'];

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?') ?? '/';

        // $currentUrl = $_SERVER['PATH_INFO'] ?? '/';

        $method = $_SERVER['REQUEST_METHOD'];

        if(in_array($currentUrl, $rutas_protegidas) && !$auth) {

            header('Location: /');

        }

        if ($method === 'GET') {

            $fn = $this->getRoutes[$currentUrl] ?? null;

        } else {

            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {

            call_user_func($fn, $this);

        } else {
            
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []) {
        
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }
}







