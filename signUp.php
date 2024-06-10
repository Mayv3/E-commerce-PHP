<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post" class="signUp-form">
            <label for="nickname">Nombre de usuario</label>
            <input type="text" name="nickname" id="nickname" class="form-control radius-none" required>
            <label for="emailsignUp">Email</label>
            <input type="email" name="email" id="emailsignUp" class="form-control radius-none" required>
            <label for="passwordsignUp">Contraseña</label>
            <input type="password" name="password" id="passwordsignUp" class="form-control radius-none" required>
            <input type="submit" value="Registrarse" class="btn btn-primary border-0">
        </form>
        <p>¿Ya tenes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
    </div>
</body>

</html>