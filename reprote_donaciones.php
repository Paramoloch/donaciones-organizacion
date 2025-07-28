<?php
include("conexion.php");

$query = "
SELECT 
    p.nombre AS proyecto,
    COUNT(d.id_donacion) AS cantidad_donaciones,
    SUM(d.monto) AS total_recaudado
FROM PROYECTO p
JOIN DONACION d ON p.id_proyecto = d.id_proyecto
GROUP BY p.id_proyecto
HAVING COUNT(d.id_donacion) > 2
ORDER BY total_recaudado DESC
";

$resultado = $conexion->query($query);

echo "<h2>Proyectos con más de 2 donaciones</h2>";
echo "<table border='1'>
<tr><th>Proyecto</th><th>Cantidad de Donaciones</th><th>Total Recaudado</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
      <td>{$fila['proyecto']}</td>
      <td>{$fila['cantidad_donaciones']}</td>
      <td>\${$fila['total_recaudado']}</td>
    </tr>";
}

echo "</table>";

$conexion->close();
?>
