<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Nueva Tarea</h1>

    <form action="<?= site_url('tasks/store') ?>" method="post">
        <div class="form-group">
            <label>Título:</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Descripción:</label>
            <textarea name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Fecha Límite:</label>
            <input type="date" name="due_date">
        </div>

        <button type="submit">Guardar Tarea</button>
        <a href="<?= site_url('tasks') ?>">Cancelar</a>
    </form>

</body>
</html>
