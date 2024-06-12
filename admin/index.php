<?php
$routes = [
    'login' => [],
    'dashboard' => [],
    'products' => [],
];

$view = isset($_GET['section']) ? $_GET['section'] : 'dashboard';

if (!isset($routes[$view])) {
    $view = '404';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Indumentaria de la mejor calidad a mejor precio. Descubre tus favoritas">
    <meta name="author" content="">
    <title>Panel de administrador</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo-cubo.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Css -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <img class="img-fluid logo-cubo" src="../img/logo-cubo.png" alt="Qubo indumentaria icono">
                <a class="navbar-brand " href="index.php?section=home">Qubo Indumentaria</a>
                <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=login">Iniciar sesion</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=dashboard">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=products">Productos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center align-items-center">
        <?php
        require "../admin/views/$view.php";
        ?>
    </main>
    <footer class="d-flex justify-content-center align-items-center">
        <div class="container">
            <p class="m-0 text-center text-white">QuboIndumentaria &copy; Todos los derechos reservados</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>