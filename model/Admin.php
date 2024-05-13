<?php 
namespace Model;

class Admin extends ActiveRecord {
        // Base DE DATOS
        protected static $tabla = 'usuarios';
        protected static $columnasDB = ['id', 'email', 'password'];
        public $id;
        public $email;
        public $password;

        public function __construct($args = []) {
            $this->id = $args['id'] ?? null;
            $this->email = $args['email'] ?? '';
            $this->password = $args['password'] ?? '';

        }

        public function validar() {
            if(!$this->email) {
                self::$errores[] = "El E-mail es Obligatorio";
            }
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                self::$errores[] = "El E-mail no es válido";
            }
            if(!$this->password) {
                self::$errores[] = "El password es Obligatorio";
            }

    
            return self::$errores;
        }

        public function existeUsuario() {
            # Revisa si un usuario existe o no
            $query = "SELECT * FROM " . self::$tabla . " WHERE email= '" . $this->email . "' LIMIT 1";
            $resultado = self::$db->query($query);

            if (!$resultado -> num_rows) {
                self::$errores[] = 'El usuario no existe';
                return;
            }
            return $resultado;
        }

        public function comprobarPassword($resultado) {
            $usuario = $resultado->fetch_object();
            $autenticado = password_verify($this->password, $usuario->password);

            if (!$autenticado) {
                self::$errores[] = 'La contraseña es incorrecta.';

            }
            return $autenticado;
        }

        public function autenticar() {
            //El usuario es correcto
            session_start();

            //Llenar el arreglo de la sesion
            $_SESSION["usuario"] = $this->email;
            $_SESSION['login']  = true;

            //Redireccionar al usuario
            header('Location: /admin');
            
        }
    


}