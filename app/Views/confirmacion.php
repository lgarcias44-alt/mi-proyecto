<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Registro</title>
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

        .bar-nav a {
            color: #4c1d95;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            line-height: 25px;
        }

        .bar-nav a:hover {
            color: #ffffff;
        }

        .contenedor-confirmacion {
            width: 520px;
            margin: 80px auto;
            background-color: #ffffff;
            padding: 35px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h1 {
            color: #4c1d95;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .icono-mensaje {
            font-size: 50px;
            color: #f472b6;
            margin-bottom: 15px;
        }

        p {
            color: #701a75;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 25px;
            text-align: justify;
        }

        .btn-volver {
            display: inline-block;
            background-color: #f472b6;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-volver:hover {
            background-color: #ec4899;
        }
    </style>
</head>
<body>

    <div class="bar-nav">
        <div class="nav-left">
            <a href="<?= site_url('/') ?>">Inicio</a>
        </div>
    </div>

    <div class="contenedor-confirmacion">
        <div class="icono-mensaje">✉️</div>
        <h1>¡Registro Casi Completo!</h1>
        <p>Para activar la cuenta, la plataforma enviará un correo de confirmación a la dirección de correo electrónico proporcionada durante el registro. Es indispensable acceder a dicho correo y seguir el enlace de activación para completar el proceso.</p>
        <a href="<?= site_url('/') ?>" class="btn-volver">Regresar al Inicio</a>
    </div>

</body>
</html>
