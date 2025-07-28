<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $presupuesto = $_POST["presupuesto"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];

    if (!empty($nombre) && !empty($presupuesto)) {
        $stmt = $conexion->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $nombre, $descripcion, $presupuesto, $fecha_inicio, $fecha_fin);

        if ($stmt->execute()) {
            echo "Proyecto guardado con éxito.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Nombre y presupuesto son obligatorios.";
    }

    $conexion->close();
}
?>
