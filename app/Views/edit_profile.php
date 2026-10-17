<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        body {
            background-color: #f8f0f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .nav-left a, .nav-right a, .nav-right span {
            color: #4b0082;
            text-decoration: none;
            margin-right: 15px;
            font-size: 14px;
        }

        .nav-left a:hover, .nav-right a:hover {
            text-decoration: underline;
        }

        .user-greeting {
            font-weight: bold;
        }

        .form-container {
            max-width: 600px;
            margin: 30px 0 0 40px;
        }

        h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 25px;
        }

        .field-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        label {
            width: 80px;
            font-size: 14px;
            color: #333;
        }

        input[type="text"], input[type="email"] {
            width: 380px;
            padding: 8px 12px;
            background-color: #b3e5fc;
            border: 1px solid #000;
            border-radius: 12px;
            outline: none;
        }

        .btn-group {
            margin-left: 80px;
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-save {
            background-color: #c8e6c9;
            border: 1px solid #000;
            padding: 6px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-cancel {
            background-color: #ffcdd2;
            color: #000;
            border: 1px solid #000;
            padding: 6px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="<?= site_url('index.php/bienvenida') ?>">Home</a>
            <a href="#">English</a>
            <a href="#">Español</a>
        </div>

        <div class="nav-right">
            <span class="user-greeting">Hola, <?= session()->get('usuario') ?? session()->get('nombre') ?? '' ?></span>
            <a href="<?= site_url('index.php/profile') ?>" style="font-weight: bold; text-decoration: underline;">Profile</a>
            <a href="#">Users</a>
            <a href="#">Tasks</a>
            <a href="<?= site_url('index.php/login') ?>">Log out</a>
        </div>
    </div>

    <div class="form-container">
        <h2>Edit profile</h2>

        <form action="<?= site_url('index.php/profile') ?>" method="post">
            <div class="field-group">
                <label>name</label>
                <input type="text" name="name" value="<?= session()->get('usuario') ?? session()->get('nombre') ?? '' ?>" placeholder="Nombre registrados...">
            </div>

            <div class="field-group">
                <label>email</label>
                <input type="email" name="email" value="<?= session()->get('email') ?? '' ?>" placeholder="Correo registrado...">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-save">Save</button>
                <a href="<?= site_url('index.php/profile') ?>" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
