<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarme a la Db
$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);