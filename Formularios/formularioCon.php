<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario Contactanos</title>
</head>
<body>
    <body class="fondo"></body>
    <h2>Formulario de Contacto</h2>
    <form method="post" action="guardar_respuestas.php">
        <label for="nombre_apellido">Nombre y Apellido:</label>
        <input type="text" name="nombre_apellido" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required><br>

        <label for="telefono">Número de Teléfono:</label>
        <input type="tel" name="telefono" required><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" required><br>

        <label for="motivo">Motivo:</label>
        <select name="motivo" required>
            <option value="donacion">Donación</option>
            <option value="voluntario">Ser Voluntario</option>
            <option value="aliado">Ser Aliado</option>
            <option value="informacion">Información Específica</option>
        </select><br>

        <label for="comentarios">Comentarios:</label><br>
        <textarea name="comentarios" rows="4" cols="50"></textarea><br>

        <label for="autorizacion_tratamiento_datos">Autorizo el tratamiento de datos personales según la Ley de Habeas Data- Ley 1581 de 2012 y autorizo ser contactado a los medios de comunicación suministrados en este formulario.</label><br>
        <select id="autorizacion_tratamiento_datos" name="autorizacion_tratamiento_datos" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>