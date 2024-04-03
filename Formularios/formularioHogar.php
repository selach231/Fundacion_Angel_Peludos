<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario Hogar</title>
</head>
<body>
    <body class="fondo"></body>
    <h2>Formulario Hogar</h2>
    <form method="post" action="guardar_respuestas_hogar.php">
        <label for="nombre_apellido">Nombre y Apellido:</label><br>
        <input type="text" id="nombre_apellido" name="nombre_apellido" required><br>

        <label for="telefono">Número de teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br>

        <label for="ocupacion">Ocupación actual:</label><br>
        <input type="text" id="ocupacion" name="ocupacion"><br>

        <label for="vivienda">¿Qué vivienda tienes?</label><br>
        <select id="vivienda" name="vivienda">
            <option value="Apartamento">Apartamento</option>
            <option value="Casa">Casa</option>
            <option value="Finca">Finca</option>
            <option value="Otra">Otra</option>
        </select><br>

        <label for="vivienda_propia">La vivienda donde vives es:</label><br>
        <select id="vivienda_propia" name="vivienda_propia">
            <option value="Propia">Propia</option>
            <option value="Arriendo">Arriendo</option>
            <option value="Familiar">Familiar</option>
            <option value="Otra">Otra</option>
        </select><br>

        <label for="con_quien_vives">¿Con quién vives?</label><br>
        <input type="text" id="con_quien_vives" name="con_quien_vives"><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="barrio">Barrio:</label><br>
        <input type="text" id="barrio" name="barrio" required><br>

        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <label for="autorizacion_tratamiento_datos">Autorizo el tratamiento de datos personales según la Ley de Habeas Data- Ley 1581 de 2012 y autorizo ser contactado a los medios de comunicación suministrados en este formulario.</label><br>
        <select id="autorizacion_tratamiento_datos" name="autorizacion_tratamiento_datos" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br>

        <input type="submit" value="Enviar">
    </form>
    <a href="http://localhost/hogar_cai_dorada/" class="btn">Regresar al Inicio</a>
</body>
</html>
