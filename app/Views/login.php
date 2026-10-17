<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Iniciar Sesión</title>

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



        input[type="email"],

        input[type="password"] {

            width: 93%;

            padding: 10px;

            border: 1px solid #dda0dd;

            border-radius: 5px;

            background-color: #ffffff;

        }



        input[type="email"]:focus,

        input[type="password"]:focus {

            outline: none;

            border-color: #ba55d3;

            background-color: #ffffff;

        }



        .opcion-remember {

            display: flex;

            align-items: center;

            margin-bottom: 15px;

        }



        .opcion-remember input[type="checkbox"] {

            margin-right: 8px;

            cursor: pointer;

            accent-color: #ff69b4;

        }



        .opcion-remember label {

            display: inline;

            margin-bottom: 0;

            font-size: 13px;

            color: #4b0082;

            cursor: pointer;

        }



        .acciones-inferiores {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 10px;

        }



        .boton-enviar {

            width: 48%;

            padding: 10px;

            background-color: #ff69b4;

            color: white;

            border: none;

            border-radius: 6px;

            font-size: 15px;

            cursor: pointer;

        }



        .boton-enviar:hover {

            background-color: #ff1493;

        }



        .enlace-olvido {

            color: #8a2be2;

            font-size: 13px;

            text-decoration: none;

        }



        .enlace-olvido:hover {

            text-decoration: underline;

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



        .enlace-registro {

            display: block;

            text-align: center;

            color: #8a2be2;

            font-size: 13px;

            margin-top: 15px;

            text-decoration: none;

        }



        .enlace-registro:hover {

            text-decoration: underline;

        }

    </style>

</head>

<body>



    <a href="<?= site_url('/') ?>" class="btn-cancelar">Cancelar</a>



    <div class="contenedor">

        <h1>Iniciar Sesión</h1>

        <p>Ingresa tus datos para acceder al sistema</p>



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



        <form action="<?= site_url('index.php/login') ?>" method="post">

            <?= csrf_field() ?>



            <div class="campo">

                <label for="correo">Correo Electrónico:</label>

                <input type="email" id="correo" name="correo" value="<?= old('correo') ?>" required placeholder="ejemplo@correo.com">

            </div>



            <div class="campo">

                <label for="password">Contraseña:</label>

                <input type="password" id="password" name="password" required>

            </div>



            <div class="opcion-remember">

                <input type="checkbox" id="remember_me" name="remember_me" value="1">

                <label for="remember_me">Recordarme</label>

            </div>



            <div class="acciones-inferiores">

                <button type="submit" class="boton-enviar">Ingresar</button>

                <a href="#" class="enlace-olvido">¿Olvidaste tu contraseña?</a>

            </div>



            <a href="<?= site_url('/') ?>" class="btn-cancelar-abajo">Cancelar</a>

        </form>



        <a href="<?= site_url('index.php/register') ?>" class="enlace-registro">¿No tienes cuenta? Regístrate aquí</a>

    </div>



</body>

</html> 
