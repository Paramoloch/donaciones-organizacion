<?php
include("conexion.php");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Utiliza consultas preparadas (aunque en este caso no hay entrada del usuario, es buena práctica)
$query = "SELECT id_proyecto, nombre, presupuesto FROM PROYECTO";
$resultado = $conexion->query($query);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proyectos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #333;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Lista de Proyectos</h2>

<?php if ($resultado && $resultado->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Presupuesto</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($fila['id_proyecto']) ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= number_format($fila['presupuesto'], 2, ',', '.') ?> €</td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p style="text-align:center;">No hay proyectos disponibles.</p>
<?php endif; ?>

<?php $conexion->close(); ?>

</body>
</html>
