<?php
include("conexion.php");

$resultado = $conexion->query("SELECT * FROM PROYECTO");

echo "<h2>Lista de Proyectos</h2>";
echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Presupuesto</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr><td>{$fila['id_proyecto']}</td><td>{$fila['nombre']}</td><td>{$fila['presupuesto']}</td></tr>";
}

echo "</table>";

$conexion->close();
?>
