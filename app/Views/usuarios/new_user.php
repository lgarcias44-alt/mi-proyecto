<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
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
            margin-bottom: 20px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-container {
            max-width: 500px;
        }

        .campo {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        label {
            width: 140px;
            color: #3b0764;
            font-size: 14px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid #d8b4fe;
            border-radius: 4px;
            background-color: #faf5ff;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #a855f7;
        }

        .acciones {
            margin-top: 20px;
            padding-left: 140px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-save {
            background-color: #f3e8ff;
            color: #3b0764;
            border: 1px solid #d8b4fe;
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background-color: #e9d5ff;
        }

        .btn-cancel {
            color: #6b21a8;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-cancel:hover {
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
        <h1>New User</h1>
        <a href="<?php echo site_url('index.php/usuarios'); ?>" class="back-link">&lt;&lt; back to index</a>

        <div class="form-container">
            <form action="<?php echo site_url('index.php/usuarios/guardar'); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="campo">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="campo">
                    <label>email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="campo">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="campo">
                    <label>Repeat password</label>
                    <input type="password" name="repeat_password" required>
                </div>

                <div class="acciones">
                    <button type="submit" class="btn-save">Save</button>
                    <a href="<?php echo site_url('index.php/usuarios'); ?>" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
