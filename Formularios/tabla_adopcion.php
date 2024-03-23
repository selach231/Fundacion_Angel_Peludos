<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Adopciones</title>
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

$resultados = $conexion->query("SELECT * FROM adopcion");

if ($resultados->num_rows > 0) {
    echo '<div class="tabla-adopcion">';
    echo '<h2>Tabla de Adopciones</h2>';
    echo '<table class="tabla">';
    echo '<body class="fondo"></body>';
    echo '<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Género</th><th>Correo</th><th>Ciudad</th><th>Dirección</th><th>Teléfono</th><th>Mascota</th><th>Observaciones</th><th>Cómo se enteró</th><th>Cumple requisitos</th><th>Autorización tratamiento datos</th></tr>';
    while($fila = $resultados->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['edad']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['genero']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['correo']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['ciudad']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['direccion']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['telefono']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['mascota']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['observaciones']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['como_se_entero']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['cumple_requisitos']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['autorizacion_tratamiento_datos']) . '</td>';
        echo '<td>';
        echo '<a href="eliminar_adop.php?id=' . $fila['id'] . '" class="btn" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este registro?\')">Eliminar </a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    } else {
        echo 'No se encontraron resultados en adopciones.';
    }

// Cerrar la conexión
$conexion->close();
?>
<a href="http://localhost/fundacion_angel_peludos/" class="btn">Regresar al Inicio</a>
</body>
</html>



