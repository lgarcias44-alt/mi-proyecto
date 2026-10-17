<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Tarea</title>
    <style>
        body {
            background-color: #fcf7fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .bar-nav {
            background-color: #d8b4fe;
            padding: 15px 25px;
            overflow: hidden;
        }

        .nav-left {
            float: left;
        }

        .nav-right {
            float: right;
        }

        .bar-nav a {
            color: #4c1d95;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
            font-size: 14px;
            line-height: 25px;
            cursor: pointer;
        }

        .contenedor {
            width: 520px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 35px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #4c1d95;
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 26px;
        }

        .volver {
            display: inline-block;
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .campo {
            margin-bottom: 12px;
        }

        .campo label {
            display: block;
            font-weight: bold;
            color: #4c1d95;
            font-size: 13px;
        }

        .campo p {
            margin: 2px 0 0 0;
            color: #333333;
            font-size: 14px;
        }

        .acciones {
            margin-top: 20px;
        }

        .acciones a {
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <div class="bar-nav">
        <div class="nav-left">
            <a href="<?= site_url('/') ?>" id="link-home">Inicio</a>
            <a onclick="cambiarIdioma('en')">English</a>
            <a onclick="cambiarIdioma('es')">Español</a>
        </div>
        <div class="nav-right">
            <span style="color: #4c1d95; font-weight: bold; font-size: 14px; margin-right: 15px;">Hola, <b><?= esc(session()->get('usuario') ?? session()->get('nombre') ?? 'Usuario') ?></b></span>
            <a href="<?= site_url('perfil') ?>" id="link-profile">Perfil</a>
            <a href="<?= site_url('usuarios') ?>" id="link-users">Usuarios</a>
            <a href="<?= site_url('tareas') ?>" id="link-tasks">Tareas</a>
            <a href="<?= site_url('logout') ?>" id="link-logout">Cerrar sesión</a>
        </div>
    </div>

    <div class="contenedor">
        <h1 id="titulo">Tarea</h1>
        <a href="<?= site_url('tareas') ?>" class="volver" id="link-volver">&lt;&lt; volver al índice</a>

        <div class="campo">
            <label>ID</label>
            <p><?= esc($tarea['id'] ?? '18') ?></p>
        </div>

        <div class="campo">
            <label id="lbl-desc">Descripción</label>
            <p><?= esc($tarea['descripcion'] ?? 'urgent task') ?></p>
        </div>

        <div class="campo">
            <label id="lbl-creada">Creada en</label>
            <p><?= esc($tarea['created_at'] ?? '2020-10-16 09:05:55') ?></p>
        </div>

        <div class="campo">
            <label id="lbl-actualizada">Actualizada en</label>
            <p><?= esc($tarea['updated_at'] ?? '2020-10-23 03:05:55') ?></p>
        </div>

        <div class="acciones">
            <a href="<?= site_url('tareas/editar/' . ($tarea['id'] ?? '18')) ?>" id="link-edit">Editar</a>
            <a href="<?= site_url('tareas/eliminar/' . ($tarea['id'] ?? '18')) ?>" id="link-delete">Eliminar</a>
        </div>
    </div>

    <script>
        function cambiarIdioma(lang) {
            if (lang === 'en') {
                document.getElementById('link-home').innerText = 'Home';
                document.getElementById('link-profile').innerText = 'Profile';
                document.getElementById('link-users').innerText = 'Users';
                document.getElementById('link-tasks').innerText = 'Tasks';
                document.getElementById('link-logout').innerText = 'Log out';
                document.getElementById('titulo').innerText = 'Task';
                document.getElementById('link-volver').innerText = '<< back to index';
                document.getElementById('lbl-desc').innerText = 'Description';
                document.getElementById('lbl-creada').innerText = 'Created at';
                document.getElementById('lbl-actualizada').innerText = 'Updated at';
                document.getElementById('link-edit').innerText = 'Edit';
                document.getElementById('link-delete').innerText = 'Delete';
            } else {
                document.getElementById('link-home').innerText = 'Inicio';
                document.getElementById('link-profile').innerText = 'Perfil';
                document.getElementById('link-users').innerText = 'Usuarios';
                document.getElementById('link-tasks').innerText = 'Tareas';
                document.getElementById('link-logout').innerText = 'Cerrar sesión';
                document.getElementById('titulo').innerText = 'Tarea';
                document.getElementById('link-volver').innerText = '<< volver al índice';
                document.getElementById('lbl-desc').innerText = 'Descripción';
                document.getElementById('lbl-creada').innerText = 'Creada en';
                document.getElementById('lbl-actualizada').innerText = 'Actualizada en';
                document.getElementById('link-edit').innerText = 'Editar';
                document.getElementById('link-delete').innerText = 'Eliminar';
            }
        }
    </script>

</body>
</html>
