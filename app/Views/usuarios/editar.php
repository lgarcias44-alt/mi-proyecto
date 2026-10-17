<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
            box-shadow: 0 1px 4px rgba(225, 190, 231, 0.3);
        }

        .nav-link {
            color: #6b21a8;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 500px;
            width: 90%;
            margin: 40px auto;
        }

        .back-link {
            color: #f472b6;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #fbcfe8;
            border-radius: 12px;
            padding: 24px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(244, 114, 182, 0.1);
        }

        h2 {
            color: #3b0764;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            color: #6b21a8;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #fbcfe8;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #f472b6;
        }

        .btn-submit {
            width: 100%;
            background-color: #f472b6;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #ec4899;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-left">
            <a href="<?= site_url('/') ?>" class="nav-link">Inicio</a>
        </div>
        <div class="nav-right">
            <a href="<?= site_url('perfil') ?>" class="nav-link">Perfil</a>
            <a href="<?= site_url('usuarios') ?>" class="nav-link">Usuarios</a>
            <a href="<?= site_url('logout') ?>" class="nav-link">Cerrar sesión</a>
        </div>
    </nav>

    <div class="container">
        <a href="<?= site_url('usuarios') ?>" class="back-link">&lt;&lt; back to index</a>

        <div class="card">
            <h2>Editar Usuario</h2>

            <form action="<?= site_url('usuarios/actualizar/' . ($user['id'] ?? '')) ?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?= esc($user['nombre'] ?? $user['name'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= esc($user['email'] ?? $user['correo'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Dejar en blanco para no cambiar">
                </div>

                <div class="form-group">
                    <label>Repeat password</label>
                    <input type="password" name="repeat_password" placeholder="Repite la nueva contraseña">
                </div>

                <button type="submit" class="btn-submit">Guardar Cambios</button>
            </form>
        </div>
    </div>

</body>
</html>
