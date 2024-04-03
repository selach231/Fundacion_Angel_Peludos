<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'hogar_cai_dorada');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
 $nombre = $_POST['nombre_apellido'];
 $telefono = $_POST['telefono'];
 $ocupacion = $_POST['ocupacion'];
 $vivienda = $_POST['vivienda'];
 $vivienda_propia = $_POST['vivienda_propia'];
 $con_quien_vives = $_POST['con_quien_vives'];
 $direccion = $_POST['direccion'];
 $barrio = $_POST['barrio'];
 $ciudad = $_POST['ciudad'];

// Insertar los datos en la tabla de hogar_paso
$sql = "INSERT INTO hogar_paso (nombre_apellido, telefono, ocupacion, vivienda, vivienda_propia, con_quien_vives, direccion, barrio, ciudad)
            VALUES ('$nombre', '$telefono', '$ocupacion', '$vivienda', '$vivienda_propia', '$con_quien_vives', '$direccion', '$barrio', '$ciudad')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
