<?php
include("conexion.php");

// Obtener proyectos
$proyectos = $conexion->query("SELECT id_proyecto, nombre FROM PROYECTO");

// Obtener donantes
$donantes = $conexion->query("SELECT id_donante, nombre FROM DONANTE");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Donación</title>
  <link rel="stlyesheet" href="style.css">
</head>
<body>
  <h2>Registrar Donación</h2>
  <form action="insertar_donacion.php" method="POST">
    <label>Donante:</label><br>
    <select name="id_donante" required>
      <option value="">Seleccione un donante</option>
      <?php while ($row = $donantes->fetch_assoc()) {
        echo "<option value='{$row['id_donante']}'>{$row['nombre']}</option>";
      } ?>
    </select><br><br>

    <label>Proyecto:</label><br>
    <select name="id_proyecto" required>
      <option value="">Seleccione un proyecto</option>
      <?php while ($row = $proyectos->fetch_assoc()) {
        echo "<option value='{$row['id_proyecto']}'>{$row['nombre']}</option>";
      } ?>
    </select><br><br>

    <label>Monto:</label><br>
    <input type="number" name="monto" required step="0.01"><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" required><br><br>

    <input type="submit" value="Guardar Donación">
  </form>
</body>
</html>
