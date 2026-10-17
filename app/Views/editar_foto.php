<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Foto</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Menu de arriba */
        .header {
            background-color: #e0b0ff;
            padding: 15px;
            text-align: right;
        }

        .header a {
            color: #4a0072;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        .header a:hover {
            color: #black;
        }

        /* Caja principal */
        .caja-principal {
            width: 380px;
            background: white;
            border: 1px solid #ccc;
            margin: 50px auto;
            padding: 20px;
        }

        h2 {
            color: #4a0072;
            margin-top: 0;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input[type="file"] {
            margin-top: 8px;
        }

        /* Boton enviar */
        .btn-subir {
            background-color: #e0b0ff;
            color: #4a0072;
            border: 1px solid #a855f7;
            padding: 8px 15px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .btn-subir:hover {
            background-color: #d896ff;
        }

        .volver {
            display: inline-block;
            margin-bottom: 15px;
            color: #4a0072;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="<?= site_url('/') ?>">Inicio</a>
        <a href="<?= site_url('perfil') ?>">Perfil</a>
    </div>

    <div class="caja-principal">
        <a href="<?= site_url('perfil') ?>" class="volver"><- Volver atras</a>
        
        <h2>Subir nueva foto</h2>

        <form action="<?= site_url('editarFoto') ?>" method="post" enctype="multipart/form-data">
            
            <div class="campo">
                <label>Elige tu foto de perfil:</label>
                <br><br>
                <input type="file" name="foto_perfil" required>
            </div>

            <br>

            <button type="submit" class="btn-subir">Guardar Imagen</button>

        </form>
    </div>

</body>
</html>
