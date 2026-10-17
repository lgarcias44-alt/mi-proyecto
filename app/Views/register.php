<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            background-color: #f8f0f6;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .btn-cancelar {
            display: inline-block;
            background-color: white;
            color: #8a2be2;
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-cancelar:hover {
            background-color: #f3e6f8;
            color: #4b0082;
        }

        .btn-cancelar-abajo {
            display: block;
            text-align: center;
            background-color: transparent;
            color: #8a2be2;
            border: none;
            padding: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-cancelar-abajo:hover {
            color: #4b0082;
            text-decoration: underline;
        }

        .contenedor {
            background-color: #ffffff;
            width: 380px;
            margin: 30px auto;
            padding: 25px;
            border-radius: 12px;
            border: 2px solid #e6d7ff;
            box-shadow: 2px 4px 10px #ddd;
        }

        h1 {
            color: #6a0dad;
            text-align: center;
            font-size: 22px;
            margin-top: 0;
        }

        p {
            color: #8b008b;
            text-align: center;
            font-size: 13px;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #4b0082;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input {
            width: 93%;
            padding: 10px;
            border: 1px solid #dda0dd;
            border-radius: 5px;
            background-color: #ffffff;
        }

        input:focus {
            outline: none;
            border-color: #ba55d3;
            background-color: #ffffff;
        }

        .boton-enviar {
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .boton-enviar:hover {
            background-color: #ff1493;
        }

        .mensaje-exito {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 13px;
        }

        .mensaje-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        .mensaje-error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

    <a href="<?= site_url('/') ?>" class="btn-cancelar">Inicio</a>

    <div class="contenedor">
        <h1>Crear Cuenta</h1>
        <p>Ingresa tus datos para registrarte</p>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="mensaje-exito">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="mensaje-error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('index.php/register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="campo">
                <label>Nombre Completo:</label>
                <input type="text" name="nombre" value="<?= old('nombre') ?>" required placeholder="Escribe tu nombre">
            </div>

            <div class="campo">
                <label>Correo Electrónico:</label>
                <input type="email" name="correo" value="<?= old('correo') ?>" required placeholder="ejemplo@correo.com">
            </div>

            <div class="campo">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <div class="campo">
                <label>Confirmar Contraseña:</label>
                <input type="password" name="confirm_password" required>
            </div>

            <button type="submit" class="boton-enviar">Registrarse</button>
            <a href="<?= site_url('/') ?>" class="btn-cancelar-abajo">Cancelar</a>
        </form>
    </div>

</body>
</html>
