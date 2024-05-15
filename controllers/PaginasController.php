<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;

class PaginasController {
    public static function index( Router $router) {
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render('pages/index', [
            'inicio' => $inicio,
            'propiedades' => $propiedades
        ]);
    }
    public static function nosotros( Router $router) {
        $router->render('/pages/nosotros', [
            
        ]);
    }
    public static function propiedades( Router $router) {
        $propiedades = Propiedad::all();
        $router->render('/pages/listado', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad( Router $router) {
        $id = val_red('/');
        //Consultar a las propiedades
        $propiedad = Propiedad::find($id);
        $router->render('/pages/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog( Router $router) {
        $router->render('/pages/blog', [
        ]);
    }
    public static function entrada( Router $router) {
        $router->render('/pages/entrada', [
        ]);
    }
    public static function contacto( Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
        $router->render('/pages/contacto', [
        ]);
    }

    public static function cerrar_sesion( Router $router) {
        $router->render('/pages/cerrar_sesion', [

        ]);
    }

}