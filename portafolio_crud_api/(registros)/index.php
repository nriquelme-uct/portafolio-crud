<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form id="registroForm" action="procesar.php" method="POST" onsubmit="return validarFormulario()">
        <input type="text" name="nombre" placeholder="Nombre completo" required><br>
        <input type="email" name="correo" placeholder="Correo electrónico" required><br>
        <input type="password" name="clave" placeholder="Contraseña (mínimo 6 caracteres)" required><br>
        <input type="password" name="clave2" placeholder="Repetir contraseña" required><br>
        <button type="submit">Registrarse</button>
    </form>
    <script src="script.js"></script>

</body>
</html>
