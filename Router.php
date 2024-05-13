<?php
namespace MVC;

class Router {
    //Referencia a los controladores dependiendo de su existe una URL o no
    public $rutasGET = [];
    public $rutasPOST = [];
    //Busca la URL antes escrita, y llama la funcion asociada
    public function get($url, $fun) {
        $this->rutasGET[$url] = $fun;
    }

    public function post($url, $fun) {
        $this->rutasPOST[$url] = $fun;
    }
    public function comprobarRutas() {
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',  
        '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];


        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
           $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;  
        }

        //Proteger las rutas
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }
        if ($fn) {
            //La URL existe y hay una función asociada
            call_user_func($fn, $this);
        } else {
            echo "ERROR 404";
        }
    }

    //Muestra una vista
    public function render($view, $datos = []) {
        foreach ($datos as $key => $value) {
            $$key = $value; #Crear variables globales con datos pasados por array
            }
        ob_start(); //Almacena en memoria durante un momento
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //Limpia el buffer
        include __DIR__ . "/views/layout.php";
    }
}
