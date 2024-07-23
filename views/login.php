<section class="login-container bg-dark text-white rounded p-5 ">
    <form method="post" action="admin/actions/authenticate.php" class="d-flex flex-column w-100">
        <label for="email" class="label-login mb-2 label-login">Email</label>
        <input type="email" placeholder="email" id="email" name="email" class="input-login">
        <label for="password" class="label-login mb-2 mt-2 label-login">Contraseña</label>
        <input type="password" placeholder="Clave" id="password" name="password" class="input-login">
        <input type="submit" value="iniciar sesión" class="btn btn-primary border-0 mt-4 p-4">
    </form>
    <a href="index.php?section=register">¿No tenes una cuenta? Registrate</a>
</section>