# Bienes_Raices
Este código en PHP es una clase de un controlador, llamada LoginController, que maneja las operaciones de inicio de sesión y cierre de sesión para una aplicación web. Esta clase utiliza el patrón MVC (Modelo-Vista-Controlador) y emplea el uso de espacios de nombres (namespace) y rutas (Router). Vamos a desglosarlo por partes para entender mejor cada función.

### 1. Declaración de la clase y uso de namespace

php
namespace Controllers;
use MVC\Router;
use Model\Admin;


La clase LoginController se encuentra en el espacio de nombres Controllers. Esto organiza el código y evita conflictos de nombres con otras clases o funciones. Además, la clase Router de MVC y la clase Admin de Model son importadas para su uso en el controlador.

### 2. La clase LoginController

La clase LoginController tiene dos métodos principales:
- login(): Gestiona el proceso de inicio de sesión.
- logout(): Gestiona el proceso de cierre de sesión.

### Método login

Este método maneja el proceso de inicio de sesión y se espera que sea llamado cuando el usuario acceda a la página de login o envíe el formulario de inicio de sesión.

php
public static function login(Router $router) {


Este método recibe un objeto Router como parámetro, que se utiliza para cargar la vista de la página de inicio de sesión (/auth/login) al final de la función.

#### Pasos en el método login

1. *Obtener errores iniciales*:
   php
   $errores = Admin::getErrores();
   
   Se obtienen los errores del modelo Admin para ver si hay errores previos que deban mostrarse en la vista.

2. *Comprobar el método de solicitud*:
   php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
   
   Este condicional verifica si el formulario ha sido enviado con el método POST. Si es así, significa que el usuario está intentando iniciar sesión.

3. *Validar los datos del formulario*:
   php
   $auth = new Admin($_POST);
   $errores = $auth->validar();
   
   - Se crea una instancia de la clase Admin con los datos enviados en el formulario ($_POST).
   - Luego, se llama al método validar() de la clase Admin para verificar los datos ingresados. Si hay errores en la validación, estos se almacenarán en $errores.

4. *Verificar si no hay errores*:
   php
   if (empty($errores)) {
   
   Si no hay errores (es decir, $errores está vacío), entonces se procede con el proceso de autenticación.

5. *Verificar si el usuario existe*:
   php
   $resultado = $auth->existeUsuario();
   
   if (!$resultado) {
       $errores = Admin::getErrores();
   }
   
   - Se llama al método existeUsuario() en el objeto Admin (almacenado en $auth) para comprobar si el usuario existe en la base de datos.
   - Si el usuario no existe ($resultado es false), se obtiene nuevamente la lista de errores desde Admin, y se muestra un mensaje de error en la vista.

6. *Verificar la contraseña*:
   php
   $autenticado = $auth->comprobarPassword($resultado);
   
   if ($autenticado) {
       $auth->autenticar();
   } else {
       $errores = Admin::getErrores();
   }
   
   - Si el usuario existe, se llama al método comprobarPassword() en el objeto Admin, pasando como parámetro $resultado (que debería contener los datos del usuario en caso de existir).
   - Si la contraseña es correcta ($autenticado es true), se llama al método autenticar() en el objeto Admin para iniciar sesión.
   - Si la contraseña es incorrecta, se obtiene nuevamente la lista de errores para mostrar el mensaje correspondiente en la vista.

7. *Renderizar la vista de login*:
   php
   $router->render('/auth/login',  [
       'errores' => $errores
   ]);
   
   - Finalmente, se utiliza el objeto Router para cargar la vista /auth/login, pasando la lista de errores ($errores) para que se muestren en caso de que hayan ocurrido errores.

### Método logout

Este método se encarga de cerrar la sesión del usuario.

php
public static function logout() {
    session_start();
    $_SESSION = [];
    header('Location: /');
}


#### Pasos en el método logout

1. *Iniciar la sesión*:
   php
   session_start();
   
   Se inicia la sesión para poder manipular los datos de la misma.

2. *Vaciar la sesión*:
   php
   $_SESSION = [];
   
   Se vacía el array $_SESSION, eliminando todas las variables de sesión. Esto cierra efectivamente la sesión del usuario.

3. *Redirigir a la página principal*:
   php
   header('Location: /');
   
   Se utiliza header() para redirigir al usuario a la página principal (/) después de cerrar la sesión.

### Resumen

En resumen:
- El método login() gestiona el inicio de sesión, validando los datos del formulario, comprobando si el usuario existe, verificando la contraseña, y autenticando al usuario en caso de que todo sea correcto. Carga la vista de login y muestra errores si los hay.
- El método logout() cierra la sesión del usuario y lo redirige a la página principal. 

Este código está organizado de acuerdo con el patrón MVC, en el cual el controlador (LoginController) coordina el flujo de datos entre el modelo (Admin) y la vista (/auth/login).
