<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'hogar_cai_dorada');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$correo = $_POST['correo'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$mascota = $_POST['mascota'];
$observaciones = $_POST['observaciones'];
$como_se_entero = $_POST['como_se_entero'];
$cumple_requisitos = $_POST['cumple_requisitos'];
$autorizacion_tratamiento_datos = $_POST['autorizacion_tratamiento_datos'];

// Insertar los datos en la tabla de adopcion
$sql = "INSERT INTO adopcion (nombre, edad, genero, correo, ciudad, direccion, telefono, mascota, observaciones, como_se_entero, cumple_requisitos, autorizacion_tratamiento_datos)
        VALUES ('$nombre', '$edad', '$genero', '$correo', '$ciudad', '$direccion', '$telefono', '$mascota', '$observaciones', '$como_se_entero', '$cumple_requisitos', '$autorizacion_tratamiento_datos')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>

