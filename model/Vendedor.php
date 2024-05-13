<?php

namespace Model;

class Vendedor extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validar() {
        if(strlen( $this->nombre ) < 3 ) {
            self::$errores[] = "El Nombre es Obligatorio y debe ser válido";
        }

        if(strlen( $this->apellido ) < 3) {
            self::$errores[] = "El Apellido es Obligatorio";
        }

        if(!$this->telefono) {
            self::$errores[] = "El Teléfono es Obligatorio";
        }
        if(!$this->email) {
            self::$errores[] = "El E-mail es Obligatorio";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = "El E-mail no es válido";
        }

        return self::$errores;
    }

}