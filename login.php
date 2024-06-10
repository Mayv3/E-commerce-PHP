<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post" class="login-form">
            <label for="emailLogin">Email</label>
            <input type="email" name="email" id="emailLogin" class="form-control radius-none" required>
            <label for="passwordLogin">Contraseña</label>
            <input type="password" name="password" id="passwordLogin" class="form-control radius-none" required>
            <div class="form-check d-flex align-items-center gap-2">
                <input type="checkbox" id="checkboxLogin" class="form-check-input">
                <label for="checkboxLogin" class="form-check-label">Recordarme</label>
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn btn-primary border-0">
            <a href="#" class="align-self-end">¿Olvidaste tu contraseña?</a>
        </form>
        <p>¿Necesitas una cuenta? <a href="signUp.php">Crear cuenta</a></p>
    </div>
</body>

</html>