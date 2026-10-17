<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #ffffff;
        }

        .nav-left, .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-link {
            color: #6b21a8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #a855f7;
        }

        .nav-user {
            color: #3b0764;
            font-size: 14px;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-title {
            color: #3b0764;
            font-size: 48px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-left">
            <a href="<?= site_url('/') ?>" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Inglés</a>
            <a href="#" class="nav-link">Español</a>
        </div>
        <div class="nav-right">
            <?php if (session()->has('nombre')) : ?>
                <span class="nav-user">Hola, <?= esc(session()->get('nombre')) ?></span>
            <?php else : ?>
                <a href="<?= site_url('register') ?>" class="nav-link">Hola, Registrate</a>
            <?php endif; ?>

            <a href="<?= site_url('perfil') ?>" class="nav-link">Perfil</a>
            <a href="<?= site_url('usuarios') ?>" class="nav-link">Usuarios</a>
            <a href="<?= site_url('tareas') ?>" class="nav-link">Tareas</a>
            <a href="<?= site_url('logout') ?>" class="nav-link">Cerrar sesión</a>
        </div>
    </nav>

    <main class="main-content">
        <h1 class="hero-title">Bienvenido</h1>
    </main>

</body>
</html>
