<?php
// eliminar.php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'fundacion_angel_peludos');
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("DELETE FROM hogar_paso WHERE id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
    
    header("Location: http://localhost/fundacion_angel_peludos/formularios/tabla_hogar_paso.php");
    exit();
} else {
    echo "No se proporcionó ID para eliminar.";
}
?>
