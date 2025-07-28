<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    if (!empty($nombre) && !empty($email)) {
        $stmt = $conexion->prepare("INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $direccion, $telefono);

        if ($stmt->execute()) {
            echo "Donante guardado con éxito.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Nombre y email son obligatorios.";
    }

    $conexion->close();
}
?>
