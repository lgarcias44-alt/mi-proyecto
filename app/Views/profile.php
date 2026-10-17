<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Practica - Perfil</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fcf7fa;
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

        .bar-nav a:hover {
            color: #ffffff;
        }

        .contenedor-perfil {
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

        .caja-foto {
            width: 140px;
            height: 110px;
            border: 1px solid #d8b4fe;
            background-color: #fafafa;
            text-align: center;
            line-height: 110px;
            margin-bottom: 10px;
        }

        .caja-foto img {
            max-width: 100%;
            max-height: 100%;
        }

        .btn-borrar {
            display: inline-block;
            background-color: #fbcfe8;
            color: #831843;
            padding: 6px 12px;
            font-size: 12px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-borrar:hover {
            background-color: #f472b6;
            color: #ffffff;
        }

        .campo {
            margin-bottom: 15px;
        }

        .campo label {
            display: block;
            font-weight: bold;
            color: #4c1d95;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .campo p {
            color: #333333;
            font-size: 15px;
            margin: 0;
        }

        .acciones {
            margin-top: 25px;
        }

        .btn-accion {
            display: inline-block;
            background-color: #d8b4fe;
            color: #4c1d95;
            padding: 8px 14px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .btn-accion:hover {
            background-color: #c084fc;
            color: #ffffff;
        }

        .texto-usuario {
            color: #4c1d95;
            font-size: 14px;
            font-weight: bold;
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
            <span class="texto-usuario">Hola, <b><?= esc(session()->get('usuario') ?? session()->get('nombre') ?? $user['name'] ?? $user['nombre'] ?? 'Usuario') ?></b></span>
            <a href="<?= site_url('perfil') ?>" id="link-profile">Perfil</a>
            <a href="<?= site_url('usuarios') ?>" id="link-users">Usuarios</a>
            <a href="<?= site_url('tareas') ?>" id="link-tasks">Tareas</a>
            <a href="<?= site_url('logout') ?>" id="link-logout">Cerrar sesión</a>
        </div>
    </div>

    <div class="contenedor-perfil">
        <h1 id="titulo-perfil">Perfil</h1>

        <div class="caja-foto">
            <?php if (session()->get('foto_perfil')): ?>
                <img src="<?= esc(session()->get('foto_perfil')) ?>" alt="Foto">
            <?php else: ?>
                <span style="color: #4c1d95; font-size: 12px;" id="texto-sinfoto">Sin Foto</span>
            <?php endif; ?>
        </div>

        <a href="<?= site_url('eliminarFoto') ?>" class="btn-borrar" id="btn-eliminar">Eliminar foto de perfil</a>

        <div class="campo">
            <label id="lbl-nombre">Nombre</label>
            <p><?= esc($user['name'] ?? $user['nombre'] ?? session()->get('usuario') ?? session()->get('nombre') ?? 'Sin nombre') ?></p>
        </div>

        <div class="campo">
            <label id="lbl-correo">Correo electrónico</label>
            <p><?= esc($user['email'] ?? $user['correo'] ?? session()->get('email') ?? 'Sin correo') ?></p>
        </div>

        <div class="acciones">
            <a href="<?= site_url('confirmPassword') ?>" class="btn-accion" id="btn-editar">Editar</a>
            <a href="<?= site_url('cambiarContra') ?>" class="btn-accion" id="btn-contra">Cambiar contraseña</a>
            <a href="<?= site_url('editarFoto') ?>" class="btn-accion" id="btn-foto">Cambiar foto de perfil</a>
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
                document.getElementById('titulo-perfil').innerText = 'Profile';
                if(document.getElementById('texto-sinfoto')) document.getElementById('texto-sinfoto').innerText = 'No Photo';
                document.getElementById('btn-eliminar').innerText = 'Delete profile picture';
                document.getElementById('lbl-nombre').innerText = 'Name';
                document.getElementById('lbl-correo').innerText = 'Email';
                document.getElementById('btn-editar').innerText = 'Edit';
                document.getElementById('btn-contra').innerText = 'Change password';
                document.getElementById('btn-foto').innerText = 'Change profile picture';
            } else {
                document.getElementById('link-home').innerText = 'Inicio';
                document.getElementById('link-profile').innerText = 'Perfil';
                document.getElementById('link-users').innerText = 'Usuarios';
                document.getElementById('link-tasks').innerText = 'Tareas';
                document.getElementById('link-logout').innerText = 'Cerrar sesión';
                document.getElementById('titulo-perfil').innerText = 'Perfil';
                if(document.getElementById('texto-sinfoto')) document.getElementById('texto-sinfoto').innerText = 'Sin Foto';
                document.getElementById('btn-eliminar').innerText = 'Eliminar foto de perfil';
                document.getElementById('lbl-nombre').innerText = 'Nombre';
                document.getElementById('lbl-correo').innerText = 'Correo electrónico';
                document.getElementById('btn-editar').innerText = 'Editar';
                document.getElementById('btn-contra').innerText = 'Cambiar contraseña';
                document.getElementById('btn-foto').innerText = 'Cambiar foto de perfil';
            }
        }
    </script>

</body>
</html>
