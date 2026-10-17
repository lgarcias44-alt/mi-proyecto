<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Tarea</title>
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
            margin-bottom: 20px;
            font-size: 26px;
        }

        label {
            display: block;
            color: #4c1d95;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #a5b4fc;
            background-color: #e0e7ff;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .btn-enviar {
            background-color: #bbf7d0;
            color: #166534;
            border: 1px solid #86efac;
            padding: 6px 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-cancelar {
            background-color: #fbcfe8;
            color: #831843;
            border: 1px solid #f472b6;
            padding: 6px 14px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            margin-left: 5px;
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
        <h1 id="titulo">Nueva Tarea</h1>

        <form action="<?= site_url('tareas/guardar') ?>" method="post">
            <label id="lbl-desc">Descripción</label>
            <input type="text" name="descripcion" required>

            <button type="submit" class="btn-enviar" id="btn-send">Enviar</button>
            <a href="<?= site_url('tareas') ?>" class="btn-cancelar" id="btn-cancel">Cancelar</a>
        </form>
    </div>

    <script>
        function cambiarIdioma(lang) {
            if (lang === 'en') {
                document.getElementById('link-home').innerText = 'Home';
                document.getElementById('link-profile').innerText = 'Profile';
                document.getElementById('link-users').innerText = 'Users';
                document.getElementById('link-tasks').innerText = 'Tasks';
                document.getElementById('link-logout').innerText = 'Log out';
                document.getElementById('titulo').innerText = 'New Task';
                document.getElementById('lbl-desc').innerText = 'Description';
                document.getElementById('btn-send').innerText = 'Send';
                document.getElementById('btn-cancel').innerText = 'Cancel';
            } else {
                document.getElementById('link-home').innerText = 'Inicio';
                document.getElementById('link-profile').innerText = 'Perfil';
                document.getElementById('link-users').innerText = 'Usuarios';
                document.getElementById('link-tasks').innerText = 'Tareas';
                document.getElementById('link-logout').innerText = 'Cerrar sesión';
                document.getElementById('titulo').innerText = 'Nueva Tarea';
                document.getElementById('lbl-desc').innerText = 'Descripción';
                document.getElementById('btn-send').innerText = 'Enviar';
                document.getElementById('btn-cancel').innerText = 'Cancelar';
            }
        }
    </script>

</body>
</html>
