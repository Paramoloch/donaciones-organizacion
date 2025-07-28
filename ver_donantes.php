<?php
include("conexion.php");

$resultado = $conexion->query("SELECT * FROM DONANTE");

echo "<h2>Lista de Donantes</h2>";
echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr><td>{$fila['id_donante']}</td><td>{$fila['nombre']}</td><td>{$fila['email']}</td></tr>";
}

echo "</table>";

$conexion->close();
?>
