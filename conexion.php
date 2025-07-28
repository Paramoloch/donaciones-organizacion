<?php

$host = "localhost"; 
$usuario = "root";   
$password = ""; // Aquí hay que agregar la contraseña de manera manual  
$baseDatos = "ORGANIZACION";

$conexion = new mysqli($host, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


?>
