<?php
include("conexion.php");

$resultado = $conexion->query("
  SELECT d.id_donacion, d.monto, d.fecha, p.nombre AS proyecto, dn.nombre AS donante
  FROM DONACION d
  JOIN PROYECTO p ON d.id_proyecto = p.id_proyecto
  JOIN DONANTE dn ON d.id_donante = dn.id_donante
");

echo "<h2>Listado de Donaciones</h2>";
echo "<table border='1'>
<tr><th>ID</th><th>Donante</th><th>Proyecto</th><th>Monto</th><th>Fecha</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
      <td>{$fila['id_donacion']}</td>
      <td>{$fila['donante']}</td>
      <td>{$fila['proyecto']}</td>
      <td>\${$fila['monto']}</td>
      <td>{$fila['fecha']}</td>
    </tr>";
}

echo "</table>";

$conexion->close();
?>
