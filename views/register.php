<section
    class="login-container bg-dark text-white rounded p-5 d-flex justify-content-center flex-column align-items-center">
    <h1>Registrarse</h1>
    <form method="post" action="utilities/userRegister.php" class="d-flex flex-column w-100">
        <label for="email" class="label-login mb-2">Correo electrónico</label>
        <input type="email" placeholder="correo electrónico" id="email" name="email" class="input-login">
        <label for="password" class="label-login mb-2 mt-2">Contraseña</label>
        <input type="password" placeholder="Clave" id="password" name="password" class="input-login">
        <label for="confirm_password" class="label-login mb-2 mt-2">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar clave" id="confirm_password" name="confirm_password"
            class="input-login">
        <input type="submit" value="Registrarse" class="btn btn-primary border-0 mt-4 p-4"
            onclick="return validatePassword()">
    </form>
    <a href="index.php?section=login" class="text-white mt-4">¿Ya tenes sesión? Ingresa aquí</a>
</section>