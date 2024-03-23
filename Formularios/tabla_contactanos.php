<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'fundacion_angel_peludos');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Preparar la consulta para evitar inyecciones SQL
$consulta = $conexion->prepare("SELECT * FROM clientes");
$consulta->execute();

// Obtener los resultados
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {
    echo '<div class="tabla-adopcion">';
    echo '<h2>Tabla Contáctanos</h2>';
    echo '<table class="tabla">';
    echo '<body class="fondo"></body>';
    echo '<tr><th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Correo</th><th>Ciudad</th><th>Motivo</th><th>Comentarios</th><th>Fecha de registro</th></tr>';
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['nombre_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['direccion']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['telefono']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['correo']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['ciudad']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['motivo']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['comentarios']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['fecha_registro']) . '</td>';
        echo '<td>';
        echo '<a href="eliminar_con.php?id=' . $fila['id'] . '" class="btn" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este registro?\')">Eliminar </a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No se encontraron resultados.';
}

// Cerrar la conexión
$conexion->close();
?>
<a href="http://localhost/fundacion_angel_peludos/" class= "btn">Regresar al Inicio</a>
</body>
</html>
