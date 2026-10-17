<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
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

        .container {
            max-width: 600px;
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

        .back-link:hover {
            color: #ec4899;
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

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #fdf2f8;
        }

        .info-label {
            color: #6b21a8;
            font-weight: 600;
        }

        .info-value {
            color: #333333;
        }

        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background-color: #6b21a8;
            color: #ffffff;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-edit:hover {
            background-color: #581c87;
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
            <h2>Información del Usuario</h2>

            <div class="info-row">
                <span class="info-label">name:</span>
                <span class="info-value"><?= esc($user['nombre'] ?? $user['name'] ?? '') ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">email:</span>
                <span class="info-value"><?= esc($user['email'] ?? $user['correo'] ?? '') ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">active:</span>
                <span class="info-value"><?= (isset($user['activo']) && $user['activo'] == 1) || (isset($user['active']) && $user['active'] == 1) ? 'Sí' : 'No' ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Administrator:</span>
                <span class="info-value"><?= (isset($user['es_admin']) && $user['es_admin'] == 1) || (isset($user['administrator']) && $user['administrator'] == 1) ? 'Sí' : 'No' ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Created at:</span>
                <span class="info-value"><?= esc($user['created_at'] ?? '') ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Updated at:</span>
                <span class="info-value"><?= esc($user['updated_at'] ?? 'Sin modificaciones') ?></span>
            </div>

            <div class="actions">
                <a href="<?= site_url('usuarios/editar/' . ($user['id'] ?? '')) ?>" class="btn-edit">Editar</a>
            </div>
        </div>
    </div>

</body>
</html>
