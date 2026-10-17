<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mis Tareas</title>
<style>
body {
    background: #fcf7fa;
    font-family: sans-serif;
    margin: 0;
}
.menu {
    background: #d8b4fe;
    padding: 10px;
}
.menu a {
    color: #4c1d95;
    text-decoration: none;
    font-weight: bold;
    margin-right: 10px;
}
.box {
    width: 450px;
    background: white;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #ddd;
}
h1 {
    color: #4c1d95;
    font-size: 22px;
}
.btn {
    background: #d8b4fe;
    color: #4c1d95;
    padding: 5px 10px;
    text-decoration: none;
    font-size: 13px;
    border: 1px solid #c084fc;
}
.lista {
    margin-top: 15px;
}
.lista li {
    margin-bottom: 8px;
}
.lista a {
    color: blue;
}
</style>
</head>
<body>

<div class="menu">
    <a href="<?= site_url('/') ?>" id="l1">Inicio</a>
    <a href="#" onclick="cambiar('en')">English</a>
    <a href="#" onclick="cambiar('es')">Español</a>
    <span style="float: right;">
        Hola, <b><?= esc(session()->get('usuario') ?? 'Usuario') ?></b>
        <a href="<?= site_url('perfil') ?>" id="l2">Perfil</a>
        <a href="<?= site_url('usuarios') ?>" id="l3">Usuarios</a>
        <a href="<?= site_url('tareas') ?>" id="l4">Tareas</a>
        <a href="<?= site_url('logout') ?>" id="l5">Salir</a>
    </span>
</div>

<div class="box">
    <h1 id="t1">Tareas</h1>

    <p><a href="<?= site_url('tareas/nueva') ?>" class="btn" id="b1">Nueva Tarea</a></p>

    <div>
        <b id="txt1">Buscar:</b> 
        <input type="text" id="busqueda">
    </div>

    <ul class="lista">
        <li><a href="<?= site_url('tareas/ver/1') ?>">Otra tarea</a></li>
        <li><a href="<?= site_url('tareas/ver/2') ?>">Una tarea importante</a></li>
        <li><a href="<?= site_url('tareas/ver/3') ?>">Una tarea interesante</a></li>
        <li><a href="<?= site_url('tareas/ver/18') ?>">Para hacer hoy urgentemente</a></li>
    </ul>

    <br>
    <a href="#" class="btn" id="p1">Mas nuevas</a>
    <a href="#" class="btn" id="p2">Mas antiguas</a>
</div>

<script>
function cambiar(i) {
    if(i == 'en') {
        document.getElementById('l1').innerText = 'Home';
        document.getElementById('l2').innerText = 'Profile';
        document.getElementById('l3').innerText = 'Users';
        document.getElementById('l4').innerText = 'Tasks';
        document.getElementById('l5').innerText = 'Log out';
        document.getElementById('t1').innerText = 'Tasks';
        document.getElementById('b1').innerText = 'New Task';
        document.getElementById('txt1').innerText = 'Search:';
        document.getElementById('p1').innerText = 'Newer';
        document.getElementById('p2').innerText = 'Older';
    } else {
        document.getElementById('l1').innerText = 'Inicio';
        document.getElementById('l2').innerText = 'Perfil';
        document.getElementById('l3').innerText = 'Usuarios';
        document.getElementById('l4').innerText = 'Tareas';
        document.getElementById('l5').innerText = 'Salir';
        document.getElementById('t1').innerText = 'Tareas';
        document.getElementById('b1').innerText = 'Nueva Tarea';
        document.getElementById('txt1').innerText = 'Buscar:';
        document.getElementById('p1').innerText = 'Mas nuevas';
        document.getElementById('p2').innerText = 'Mas antiguas';
    }
}
</script>

</body>
</html>
