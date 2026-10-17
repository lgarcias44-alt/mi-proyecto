<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
            color: #3b0764;
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
            color: #f472b6;
        }

        .nav-link.active {
            color: #a855f7;
            font-weight: 600;
        }

        .nav-user {
            color: #3b0764;
            font-size: 14px;
            font-weight: 600;
        }

        .main-container {
            width: 90%;
            max-width: 1000px;
            margin: 10px auto 40px auto;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #3b0764;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #f3e8ff;
            color: #6b21a8;
            border: none;
            padding: 8px 20px;
            border-radius: 0;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .btn-custom:hover {
            background-color: #f472b6;
            color: #ffffff;
        }

        .btn-new-user {
            margin-bottom: 25px;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .users-table th {
            text-align: left;
            font-size: 16px;
            font-weight: 600;
            color: #3b0764;
            padding: 12px 10px;
            border-bottom: 2.5px solid #3b0764;
        }

        .users-table td {
            padding: 14px 10px;
            font-size: 15px;
            color: #4c1d95;
            border-bottom: 1px solid #e9d5ff;
        }

        .user-row-link {
            color: #4c1d95;
            text-decoration: none;
            font-weight: 500;
        }

        .user-row-link:hover {
            color: #f472b6;
            text-decoration: underline;
        }

        .pagination-container {
            display: flex;
            gap: 12px;
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
                <a href="<?= site_url('register') ?>" class="nav-link">Hola, Regístrate</a>
            <?php endif; ?>

            <a href="<?= site_url('perfil') ?>" class="nav-link">Perfil</a>
            <a href="<?= site_url('usuarios') ?>" class="nav-link active">Usuarios</a>
            <a href="<?= site_url('tareas') ?>" class="nav-link">Tareas</a>
            <a href="<?= site_url('logout') ?>" class="nav-link">Cerrar sesión</a>
        </div>
    </nav>

    <main class="main-container">
        <h1 class="page-title">Usuarios</h1>

        <a href="<?= site_url('register') ?>" class="btn-custom btn-new-user">Nuevo usuario</a>

        <table class="users-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Activo</th>
                    <th>Administrador</th>
                    <th>Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $user): ?>
                        <?php $u = (array) $user; ?>
                        <tr>
                            <td>
                                <a href="<?= site_url('usuarios/ver/' . ($u['id'] ?? '')) ?>" class="user-row-link">
                                    <?= esc(!empty($u['nombre']) ? $u['nombre'] : (!empty($u['name']) ? $u['name'] : 'Sin nombre')) ?>
                                </a>
                            </td>
                            <td><?= esc(!empty($u['email']) ? $u['email'] : (!empty($u['correo']) ? $u['correo'] : 'Sin correo')) ?></td>
                            <td><?= (isset($u['activo']) && $u['activo'] == 1) || (isset($u['active']) && $u['active'] == 1) ? 'Sí' : 'No' ?></td>
                            <td><?= (isset($u['es_admin']) && $u['es_admin'] == 1) || (isset($u['administrator']) && $u['administrator'] == 1) ? 'Sí' : 'No' ?></td>
                            <td><?= esc($u['created_at'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron usuarios.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination-container">
            <a href="<?= site_url('usuarios?order=newer') ?>" class="btn-custom">Más recientes</a>
            <a href="<?= site_url('usuarios?order=older') ?>" class="btn-custom">Más antiguos</a>
        </div>
    </main>

</body>
</html>
