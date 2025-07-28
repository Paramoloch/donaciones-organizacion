<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto = $_POST["monto"];
    $fecha = $_POST["fecha"];
    $id_proyecto = $_POST["id_proyecto"];
    $id_donante = $_POST["id_donante"];

    if ($monto > 0 && !empty($fecha) && !empty($id_proyecto) && !empty($id_donante)) {
        $stmt = $conexion->prepare("INSERT INTO DONACION (monto, fecha, id_proyecto, id_donante) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("dsii", $monto, $fecha, $id_proyecto, $id_donante);

        if ($stmt->execute()) {
            echo "Donación registrada correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }

    $conexion->close();
}
?>
