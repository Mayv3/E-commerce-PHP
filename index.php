<?php
require_once 'bootstrap/autoload.php';
session_start();

$routes = [
    'home' => [],
    'products' => [],
    'detail' => [],
    'about' => [],
    'contact' => [],
    'register' => [],
    'login' => [],
    'profile-user' => ['auth_required' => true],
    'cart' => ['auth_required' => true],
    'checkout' => ['auth_required' => true],
    'detailPurchase' => ['auth_required' => true],
];

$view = isset($_GET['section']) ? $_GET['section'] : 'home';

if (!isset($routes[$view])) {
    $view = '404';
}

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message']);
unset($_SESSION['message_type']);


$auth = new Authentication();
$current_route = $routes[$view];

if (isset($current_route['auth_required']) && !$auth->is_loged()):
    header('Location: index.php?section=login');
endif;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Indumentaria de la mejor calidad a mejor precio. Descubre tus favoritas">
    <meta name="author" content="">
    <title>Qubo Indumentaria</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/logo-cubo.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Css -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <img class="img-fluid logo-cubo" src="img/logo-cubo.png" alt="Qubo indumentaria icono">
                <a class="navbar-brand " href="index.php?section=home">Qubo Indumentaria</a>
                <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=home">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=products">Productos</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=about">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="index.php?section=contact">Contacto</a></li>
                    </ul>
                    <div class="d-flex gap-2 justify-content-center flex-column flex-md-row">
                        <?php if ($auth->is_loged()): ?>
                            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                                <span class="text-white"><?php echo $auth->get_session_user()->get_user_email() ?></span>
                                <div class="d-flex flex-md-row justify-content-center">
                                    <a href="index.php?section=cart" class="cart-icon mx-3">
                                        <img class="cart-icon" src="./img/cart-icon.png" alt="carrito de compras">
                                    </a>
                                    <a class="profile d-flex justify-content-center align-items-center rounded mx-3"
                                        href="index.php?section=profile-user">
                                        <img class="logo-cubo m-0" src="img/profile-logo.png" alt="Profile Logo">
                                    </a>
                                    <form action="actions/logout.php" class="m-0 p-0" method="post">
                                        <button type="submit"
                                            class="profile m-0 bg-transparent d-flex justify-content-center align-items-center rounded border-0 mx-3">
                                            <img class="logo-cubo m-0" src="img/logout.png" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        else:
                            ?>
                        <a class="btn" href="index.php?section=login">Iniciar Sesión</a>
                    <?php endif; ?>

                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center align-items-center flex-column">

        <?php
        if ($message !== null): ?>
            <div class="alert mt-5 alert-<?= $messageType ?>"><?= $message ?></div>
        <?php endif;
        ?>

        <?php
        require "views/$view.php";
        ?>
    </main>
    <footer class="d-flex justify-content-center align-items-center">
        <p class="m-0 text-center text-white">Qubo Indumentaria &copy; Todos los derechos reservados</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>