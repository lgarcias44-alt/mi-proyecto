<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Practica - Inicio</title>
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

        .contenedor-bienvenida {
            width: 520px;
            margin: 80px auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 0;
            border: none;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #4c1d95;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 26px;
        }

        p {
            color: #701a75;
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
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
            <a href="<?= site_url('register') ?>" id="link-register">Registrarse</a>
            <a href="<?= site_url('login') ?>" id="link-login">Iniciar sesión</a>
        </div>
    </div>

    <div class="contenedor-bienvenida">
        <h1 id="titulo">Bienvenido</h1>
        <p id="mensaje">Bienvenido al sistema. Esta es la pantalla en la cual puede iniciar sesión o registrarse si es un nuevo usuario.</p>
    </div>

    <script>
        function cambiarIdioma(lang) {
            if (lang === 'en') {
                document.getElementById('link-home').innerText = 'Home';
                document.getElementById('link-register').innerText = 'Sign up';
                document.getElementById('link-login').innerText = 'Log in';
                document.getElementById('titulo').innerText = 'Welcome';
                document.getElementById('mensaje').innerText = 'Welcome to the system. This is the screen where you can log in or register if you are a new user.';
            } else {
                document.getElementById('link-home').innerText = 'Inicio';
                document.getElementById('link-register').innerText = 'Registrarse';
                document.getElementById('link-login').innerText = 'Iniciar sesión';
                document.getElementById('titulo').innerText = 'Bienvenido';
                document.getElementById('mensaje').innerText = 'Bienvenido al sistema. Esta es la pantalla en la cual puede iniciar sesión o registrarse si es un nuevo usuario.';
            }
        }
    </script>

</body>
</html>
