<section class="register-container bg-dark text-white rounded p-5 ">
    <form method="post" action="utilities/userRegister.php" class="d-flex flex-column w-100">
        <label for="email" class="label-register mb-2">Correo electrónico</label>
        <input type="email" placeholder="correo electrónico" id="email" name="email" class="input-register">
        <label for="password" class="label-register mb-2 mt-2">Contraseña</label>
        <input type="password" placeholder="Clave" id="password" name="password" class="input-register">
        <label for="confirm_password" class="label-register mb-2 mt-2">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar clave" id="confirm_password" name="confirm_password"
            class="input-register">
        <input type="submit" value="Registrarse" class="btn btn-primary border-0 mt-4 p-4"
            onclick="return validatePassword()">
    </form>
    <a href="index.php?section=login">¿Ya tenes sesión? Ingresa aquí</a>
</section>