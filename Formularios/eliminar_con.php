<?php
// eliminar.php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'hogar_cai_dorada');
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
    
    header("Location: http://localhost/hogar_cai_dorada/formularios/tabla_contactanos.php");
    exit();
} else {
    echo "No se proporcionó ID para eliminar.";
}
?>
