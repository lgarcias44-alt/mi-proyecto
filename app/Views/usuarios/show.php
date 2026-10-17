<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
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
            border-bottom: 1px solid #f3e8ff;
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
            padding: 30px 40px;
        }

        h1 {
            color: #3b0764;
            font-size: 32px;
            margin-bottom: 5px;
        }

        .back-link {
            display: inline-block;
            color: #6b21a8;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .user-details {
            max-width: 500px;
        }

        .info-block {
            margin-bottom: 18px;
        }

        .info-label {
            color: #3b0764;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 3px;
        }

        .info-value {
            color: #555555;
            font-size: 14px;
            padding-left: 15px;
        }

        .acciones-user {
            margin-top: 25px;
            display: flex;
            gap: 15px;
        }

        .action-link {
            color: #6b21a8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-left">
            <a href="<?php echo site_url('index.php/bienvenida'); ?>" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Inglés</a>
            <a href="#" class="nav-link">Español</a>
        </div>
        <div class="nav-right">
            <?php 
                $nombre_usuario = session()->get('usuario');
                if (empty($nombre_usuario)) {
                    $nombre_usuario = session()->get('nombre');
                }
            ?>
            <?php if (!empty($nombre_usuario)) : ?>
                <span class="nav-user">Hola, <?php echo $nombre_usuario; ?></span>
            <?php else : ?>
                <a href="<?php echo site_url('index.php/register'); ?>" class="nav-link">Hola, Registrate</a>
            <?php endif; ?>

            <a href="<?php echo site_url('index.php/profile'); ?>" class="nav-link">Perfil</a>
            <a href="<?php echo site_url('index.php/usuarios'); ?>" class="nav-link"><b>Usuarios</b></a>
            <a href="<?php echo site_url('index.php/tareas'); ?>" class="nav-link">Tareas</a>
            <a href="<?php echo site_url('index.php/login'); ?>" class="nav-link">Cerrar sesión</a>
        </div>
    </nav>

    <main class="main-content">
        <h1>User</h1>
        <a href="<?php echo site_url('index.php/usuarios'); ?>" class="back-link">&lt;&lt; back to index</a>

        <div class="user-details">
            <div class="info-block">
                <div class="info-label">name</div>
                <div class="info-value"><?php echo $usuario['nombre'] ?? 'Mary'; ?></div>
            </div>

            <div class="info-block">
                <div class="info-label">email</div>
                <div class="info-value"><?php echo $usuario['email'] ?? 'mary@example.com'; ?></div>
            </div>

            <div class="info-block">
                <div class="info-label">active</div>
                <div class="info-value"><?php echo (isset($usuario['activo']) && $usuario['activo'] == 1) ? 'yes' : 'yes'; ?></div>
            </div>

            <div class="info-block">
                <div class="info-label">Administrator</div>
                <div class="info-value"><?php echo (isset($usuario['es_admin']) && $usuario['es_admin'] == 1) ? 'Yes' : 'No'; ?></div>
            </div>

            <div class="info-block">
                <div class="info-label">Created at</div>
                <div class="info-value"><?php echo $usuario['created_at'] ?? '2020-10-16 09:05:55'; ?></div>
            </div>

            <div class="info-block">
                <div class="info-label">Updated at</div>
                <div class="info-value"><?php echo $usuario['updated_at'] ?? '2020-10-23 03:05:55'; ?></div>
            </div>

            <div class="acciones-user">
                <a href="<?php echo site_url('index.php/usuarios/editar/' . ($usuario['id'] ?? 1)); ?>" class="action-link">Edit</a>
                <a href="<?php echo site_url('index.php/usuarios/eliminar/' . ($usuario['id'] ?? 1)); ?>" class="action-link" onclick="return confirm('¿Eliminar usuario?');">Delete</a>
            </div>
        </div>
    </main>

</body>
</html>
