<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <style>
        body {
            background-color: #fcf8fa;
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
        }

        .menu-top {
            border-bottom: 1px solid #e0d0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .menu-left {
            float: left;
        }

        .menu-right {
            float: right;
        }

        .clear {
            clear: both;
        }

        .menu-top a {
            color: #5c3a63;
            text-decoration: none;
            margin-right: 10px;
            font-size: 14px;
        }

        .contenedor-form {
            width: 400px;
            margin: 0 auto;
        }

        h1 {
            color: #4a2849;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #6a4c6e;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-blanco {
            width: 100% !important;
            padding: 10px !important;
            background-color: #ffffff !important;
            background: #ffffff !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            box-sizing: border-box !important;
            font-size: 14px !important;
            color: #333333 !important;
            -webkit-appearance: none !important;
        }

        .btn-lila {
            background-color: #c8a2c8 !important;
            background: #c8a2c8 !important;
            color: #ffffff !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 3px !important;
            cursor: pointer !important;
            font-size: 13px !important;
            font-weight: bold !important;
        }

        .btn-rosa {
            background-color: #f8c8dc !important;
            background: #f8c8dc !important;
            color: #5c3a63 !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 3px !important;
            text-decoration: none !important;
            font-size: 13px !important;
            font-weight: bold !important;
            display: inline-block !important;
            margin-left: 5px !important;
        }
    </style>
</head>
<body>

    <div class="menu-top">
        <div class="menu-left">
            <a href="<?= site_url('index.php/bienvenida') ?>">Inicio</a>
            <a href="#">Inglés</a>
            <a href="#">Español</a>
        </div>
        <div class="menu-right">
            <span>Hola, <b><?= session()->get('usuario') ?? session()->get('nombre') ?></b></span>
            <a href="<?= site_url('index.php/profile') ?>"><b>Perfil</b></a>
            <a href="#">Usuarios</a>
            <a href="#">Tareas</a>
            <a href="<?= site_url('index.php/login') ?>">Cerrar sesión</a>
        </div>
        <div class="clear"></div>
    </div>

    <div class="contenedor-form">
        <h1>Cambiar contraseña</h1>

        <form action="<?= site_url('index.php/cambiar-contra') ?>" method="post">
            <?= csrf_field() ?>

            <div class="campo">
                <label>Contraseña actual:</label>
                <input type="password" name="current_password" class="input-blanco" style="background-color: #ffffff !important; border: none !important; outline: none !important;" required>
            </div>

            <div class="campo">
                <label>Nueva contraseña:</label>
                <input type="password" name="new_password" class="input-blanco" style="background-color: #ffffff !important; border: none !important; outline: none !important;" required>
            </div>

            <div class="campo">
                <label>Confirmar nueva contraseña:</label>
                <input type="password" name="confirm_password" class="input-blanco" style="background-color: #ffffff !important; border: none !important; outline: none !important;" required>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn-lila" style="background-color: #c8a2c8 !important; color: #ffffff !important; border: none !important;">Guardar</button>
                <a href="<?= site_url('index.php/profile') ?>" class="btn-rosa" style="background-color: #f8c8dc !important; color: #5c3a63 !important; border: none !important;">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>
