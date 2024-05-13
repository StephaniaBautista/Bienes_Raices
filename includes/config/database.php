<?php
 
 function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '4422SwSIDaR1105!', 'bienesraices_crud');
    if (!$db) {
        echo "error 404";
        exit;
    }
    return $db;
 }