<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Hogar de Paso</title>
    <link rel="stylesheet" href="estilos.css">
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
$consulta = $conexion->prepare("SELECT * FROM hogar_paso");
$consulta->execute();

// Obtener los resultados
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {
    echo '<div class="tabla-adopcion">';
    echo '<h2>Tabla de hogar de paso</h2>';
    echo '<table class="tabla">';
    echo '<body class="fondo"></body>';
    echo '<tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Ocupación</th><th>Vivienda</th><th>Tipo de vivienda</th><th>Con quién vives</th><th>Dirección</th><th>Barrio</th><th>Ciudad</th></tr>';
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['nombre_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['telefono']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['ocupacion']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['vivienda']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['vivienda_propia']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['con_quien_vives']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['direccion']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['barrio']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['ciudad']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No se encontraron resultados.';
}

// Cerrar la conexión
$conexion->close();
?>

</body>
</html>

