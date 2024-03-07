<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario de Adopción</title>
</head>
<body>
    <body class="fondo"></body>
    <h2>Formulario de Adopción</h2>
    <form action="guardar_adopcion.php" method="POST">
        <label for="nombre">Nombre y Apellido:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" required><br>

        <label for="genero">Género:</label><br>
        <select id="genero" name="genero" required>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
        </select><br>

        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br>

        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="telefono">Número de Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br>

        <label for="mascota">Mascota de Interés:</label><br>
        <input type="text" id="mascota" name="mascota" required><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea><br>

        <label for="como_se_entero">¿Cómo se enteró de nosotros?</label><br>
        <input type="text" id="como_se_entero" name="como_se_entero"><br>

        <label for="cumple_requisitos">Acredito que cumplo a cabalidad con los requisitos de Adopción previstos en la página web Fundación "El Ángel de los Peludos".</label><br>
        <select id="cumple_requisitos" name="cumple_requisitos" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br>

        <label for="autorizacion_tratamiento_datos">Autorizo el tratamiento de datos personales según la Ley de Habeas Data- Ley 1581 de 2012 y autorizo ser contactado a los medios de comunicación suministrados en este formulario.</label><br>
        <select id="autorizacion_tratamiento_datos" name="autorizacion_tratamiento_datos" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

