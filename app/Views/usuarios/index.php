<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
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

        .nav-link:hover {
            color: #f472b6;
        }

        .nav-user {
            color: #3b0764;
            font-size: 14px;
            font-weight: 600;
        }

        .container {
            max-width: 1000px;
            width: 90%;
            margin: 40px auto;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            color: #3b0764;
            font-size: 28px;
        }

        .btn-new {
            background-color: #f472b6;
            color: #ffffff;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-new:hover {
            background-color: #ec4899;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #fbcfe8;
        }

        th {
            background-color: #6b21a8;
            color: #ffffff;
            text-align: left;
            padding: 12px 16px;
            font-size: 14px;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #fbcfe8;
            color: #333333;
            font-size: 14px;
        }

        tr:hover {
            background-color: #fdf2f8;
        }

        .link-action {
            color: #6b21a8;
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
        }

        .link-action:hover {
            color: #f472b6;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-pag {
            background-color: #f3e8ff;
            color: #6b21a8;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-pag:hover {
            background-color: #f472b6;
            color: #ffffff;
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

    <div class="container">
        <div class="header-actions">
            <h2>Lista de Usuarios</h2>
            <?php if (session()->get('es_admin') == 1) : ?>
                <a href="<?= site_url('usuarios/new') ?>" class="btn-new">+ New user</a>
            <?php endif; ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Administrator</th>
                    <th>Created at</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $user): ?>
                        <?php $u = (array) $user; ?>
                        <tr>
                            <td><?= esc($u['nombre'] ?? $u['name'] ?? '') ?></td>
                            <td><?= esc($u['email'] ?? $u['correo'] ?? '') ?></td>
                            <td><?= (isset($u['active']) && $u['active'] == 1) || (isset($u['activo']) && $u['activo'] == 1) ? 'Sí' : 'No' ?></td>
                            <td><?= (isset($u['administrator']) && $u['administrator'] == 1) || (isset($u['es_admin']) && $u['es_admin'] == 1) ? 'Sí' : 'No' ?></td>
                            <td><?= esc($u['created_at'] ?? '') ?></td>
                            <td>
                                <a href="<?= site_url('usuarios/ver/' . ($u['id'] ?? '')) ?>" class="link-action">Ver</a>
                                <a href="<?= site_url('usuarios/editar/' . ($u['id'] ?? '')) ?>" class="link-action">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <a href="<?= site_url('usuarios?order=newer') ?>" class="btn-pag">Newer</a>
            <a href="<?= site_url('usuarios?order=older') ?>" class="btn-pag">Older</a>
        </div>
    </div>

</body>
</html>
