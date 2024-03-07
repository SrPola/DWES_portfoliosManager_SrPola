<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="SrPola">
        <title>Register</title>
    </head>
    <body>
        <form action="/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <p>¿No tienes cuenta?</p>
        <a href="/register">Registrarse ahora</a>
    </body>
</html>