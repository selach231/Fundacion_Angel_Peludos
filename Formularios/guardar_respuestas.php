<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'hogar_cai_dorada');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre_apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$ciudad = $_POST['ciudad'];
$motivo = $_POST['motivo'];
$comentarios = $_POST['comentarios'];

// Insertar los datos en la tabla de clientes
$sql = "INSERT INTO clientes (nombre_apellido, direccion, telefono, correo, ciudad, motivo, comentarios)
        VALUES ('$nombre', '$direccion', '$telefono', '$correo', '$ciudad', '$motivo', '$comentarios')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>

