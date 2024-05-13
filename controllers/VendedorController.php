<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear(Router $router) {
        $vendedor = new Vendedor;
        //Arreglo con errores
        $errores = Vendedor::getErrores();

        //Ejecutar el codigo después de enviar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crea una nueva instancia de la clase
            $vendedor = new Vendedor($_POST['vendedor']);

            //Validar
            $errores = $vendedor->validar();

            //Revisar que el arreglo de errores este vacio
            if (empty($errores)) {
                //Guarda el vendedor
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = val_red('/admin');
        //Consultar a las propiedades
        $vendedor = Vendedor::find($id);

        //Arreglo con errores
        $errores = Vendedor::getErrores();

        //Ejecutar el codigo después de enviar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos
            $args = $_POST['vendedor'];

            //Sincroniza todos los argumentos
            $vendedor->sincronizar($args);

            //Validacion
            $errores = $vendedor->validar();

            //**Instertar en la DB**//

            //Revisar que el arreglo de errores este vacio
            if (empty($errores)){
                $vendedor->guardar();
            }
        }
        $router->render('/vendedores/actualizar',  [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        //Eliminar una propiedad
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipo($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
