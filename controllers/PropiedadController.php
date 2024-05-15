<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Img;

    class PropiedadController{
        public static function index(Router $router) {
            $propiedades = Propiedad::all();
            $vendedores = Vendedor::all();
            $resultado = $_GET['resultado'] ?? null;
            $router->render('propiedades/admin', [
                'propiedades'=> $propiedades,
                'resultado' => $resultado,
                'vendedores' => $vendedores
            ]);
        }

        public static function crear(Router $router) {
            $propiedad = new Propiedad;
            $vendedores = Vendedor::all();
            //Arreglo con errores
            $errores = Propiedad::getErrores();

            //Ejecutar el codigo después de enviar el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Crea una nueva instancia de la clase
                $propiedad = new Propiedad($_POST['propiedad']);

                //Generar un nombre único para la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                //Setea la imagen
                //Realiza un resize a la imagen con Intervetion
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Img::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
                }
            
                //Validar
                $errores = $propiedad->validar();

                //Revisar que el arreglo de errores este vacio
                if (empty($errores)) {
                    //Subida de Archivos//

                    //Crear carpeta
                    if (!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }

                    //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    $propiedad->guardar();
                }
            }
            $router->render('/propiedades/crear', [
               'propiedad' => $propiedad,
               'vendedores' => $vendedores,
               'errores' => $errores
            ]); 
        }

        public static function actualizar(Router $router) {
            $id = val_red('/admin');

            //Consultar a las propiedades
            $propiedad = Propiedad::find($id);

            //Consultar a los vendedores
            $vendedores = Vendedor::all();

            //Arreglo con errores
            $errores = Propiedad::getErrores();

            //Ejecutar el codigo después de enviar el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Asignar los atributos
                $args = $_POST['propiedad'];

                //Sincroniza todos los argumentos
                $propiedad->sincronizar($args);

                //Validacion
                $errores = $propiedad->validar();

                //Subida de archivos

                //Generar un nombre único para la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                //Realiza un resize a la imagen con Intervetion
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Img::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
                }

                //**Instertar en la DB**//

                //Revisar que el arreglo de errores este vacio
                if (empty($errores)){
                    
                    if (!empty($_FILES['propiedad']['tmp_name']['imagen'])) {
                        //Guarda la imagen en el servidor
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    
                    $propiedad->guardar();
                }
        }
            $router->render('/propiedades/actualizar',  [
                'propiedad' => $propiedad,
                'vendedores' => $vendedores,
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
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                }
            }
        }
    }